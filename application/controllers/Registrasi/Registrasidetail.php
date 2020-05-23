<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * Programer haryanto.duwi
	 * Email haryanto.duwi@gmail.com
	 * Github duwiharyanto.guthub.io
	 */

//include controller master 
require './plugins/phpexcel/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;	
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as writer;

class Registrasidetail extends CI_Controller {
// class Registrasi extends Core {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->duwi->cekadmin();
	}
	//VARIABEL
	private $master_tabel="reg_registrasi"; //Mendefinisikan Nama Tabel
	private $id="reg_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Registrasi/Registrasidetail/"; //Mendefinisikan url controller
	private $default_view="Registrasi/Registrasidetail/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/registrasi/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];		
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Registrasi/Registrasidetail/index.php";
			$menu_submenu=false;
		}
		$data=array(
			'menu'=>'registrasidetail',//Seting menu yang aktif
			'menu_submenu'=>$menu_submenu,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>$overwriteview,
			'detail'=>true,
			'cetak'=>false,
			'edit'=>true,
			'delete'=>true,
			'download'=>false,
			'add'=>true,
			'import'=>false,
		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		unlink($this->path.$file->reg_foto);
	}
	public function index($id=null)
	{
		$global_set=array(
			'headline'=>'detail registrasi',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		if($id) $this->session->set_userdata('paramtabel',$id);
		//CEK SUBMIT DATA
		if($this->input->post('reg_nama')){
			//PROSES SIMPAN
			$data=array(
				'reg_kegiatanid'=>$this->input->post('reg_kegiatanid'),
				'reg_nama'=>$this->input->post('reg_nama'),
				'reg_notlp'=>$this->input->post('reg_notlp'),
				'reg_email'=>$this->input->post('reg_email'),
				'reg_alamat'=>$this->input->post('reg_alamat'),
			);
			########################################################
			// $file='reg_foto';
			// if($_FILES[$file]['name']){
			// 	if($this->duwi->gambarupload($this->path,$file)){					
			// 		$fileupload=$this->upload->data('file_name');
			// 		$data[$file]=$fileupload;
			// 	}else{
			// 		$dt['error']=$this->upload->display_errors();
			// 		return $this->output->set_output(json_encode($dt));
			// 		//exit();
			// 	}
			// }
			$query=array(
				'data'=>$this->security->xss_clean($data),
				'tabel'=>$this->master_tabel,
			);
			$insert=$this->Crud->insert($query);
			if($insert){
				// $this->session->set_flashdata('success','simpan berhasil');	
				$dt['success']='input data berhasil';
			}else{
				// $this->session->set_flashdata('error','simpan gagal');	
				$dt['error']='input data error';
			}
			return $this->output->set_output(json_encode($dt));
		}else{
			$breadcrum=[
				'<li><a href="'.site_url('Registrasi/Registrasi').'">Registrasi</a></li>',
			];
			$data=array(
				'global'=>$global,
				'breadcrumb'=>$breadcrum,
				'menu'=>$this->duwi->menu_backend($this->session->userdata('user_level')),
			);
			$this->load->view($this->view,$data);
		}
	}
	public function tabel($id=null){
		$global_set=array(
			'headline'=>'Data',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);		
		//PROSES TAMPIL DATA
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);
		if($id) $query['where']=array(array('md5(reg_kegiatanid)
			'=>$id));
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
		);
		$this->load->view($this->default_view.'tabel',$data);		
	}
	public function edit(){
		$global_set=array(
			'headline'=>'edit data',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		if($this->input->post('reg_nama')){
			//PROSES SIMPAN
			$data=array(
				'reg_nama'=>$this->input->post('reg_nama'),
				'reg_notlp'=>$this->input->post('reg_notlp'),
				'reg_email'=>$this->input->post('reg_email'),
				'reg_alamat'=>$this->input->post('reg_alamat'),
			);
			####################################################
			// $file='user_foto';
			// if($_FILES[$file]['name']){
			// 	if($this->gambarupload($this->path,$file)){
			// 		if($id){
			// 			$this->hapus_file($id);
			// 		}					
			// 		$fileupload=$this->upload->data('file_name');
			// 		$data[$file]=$fileupload;
			// 	}else{
			// 		$dt['error']=$this->upload->display_errors();
			// 		return $this->output->set_output(json_encode($dt));
			// 		//exit();
			// 	}
			// }			
			$query=array(
				'data'=>$this->security->xss_clean($data),
				'tabel'=>$this->master_tabel,
				'where'=>array($this->id=>$id),
			);
			$update=$this->Crud->update($query);
			if($update){
				//$this->session->set_flashdata('success','update data berhasil');	
				$dt['success']='Update data berhasil';
			}else{
				//$this->session->set_flashdata('error','update data gagal');	
				$dt['error']='Update data gagal';
			}
			return $this->output->set_output(json_encode($dt));			
		}else{
			$query=array(
				'tabel'=>$this->master_tabel,
				'where'=>array(array($this->id=>$id))
			);
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'global'=>$global,
			);
			//$this->viewdata($data);			
			$this->load->view($this->default_view.'edit',$data);
		}			
	}

	public function add(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'tambah data',
			'url'=>$this->default_url, //AKAN DIREDIRECT KE INDEX
		);	
		$global=$this->global_set($global_set);
		$q_kegiatan=[
			'tabel'=>'reg_kegiatan',
			'where'=>[['md5(kegiatan_id)'=>$this->session->userdata('paramtabel')]]
		];
		$data=array(
			'kegiatan'=>$this->Crud->read($q_kegiatan)->row(),
			'global'=>$global,
			);
		$this->load->view($this->default_view.'add',$data);		
	}	
	public function hapus(){
		$id=$this->input->post('id');
		#############################
		//$this->hapus_file($id);
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array($this->id=>$id),
		);
		$delete=$this->Crud->delete($query);
		if($delete){
			$dt['status']='success';
			$dt['msg']='hapus data berhasil';
		}else{
			$dt['status']='success';
			// $dt['msg']='input data error';
			$dt['msg']=$delete;
		}
		return $this->output->set_output(json_encode($dt));	
	}
	public function downloadtemplate($file){
		$this->downloadfile($this->pathformatimport,$file);
	}
	public function cetak($id=null){
		$global_set=array(
			'headline'=>'Daftar Peserta',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);	
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);	
		if($id) $query['where']=array(array('md5(reg_kegiatanid)
			'=>$id));				
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'), 
			'atributsistem'=>$this->duwi->atributsistem(),
		);
		$view=$this->load->view($this->default_view.'cetak',$data,true);
		$cetak=[
			'judul'=>$global_set['headline'],
			'view'=>$view,
			'kertas'=>'A4-l',
		];
		$this->duwi->prosescetak($cetak);
	}
	public function cetakabsen($id=null){
		$global_set=array(
			'headline'=>'Daftar Hadir',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);	
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);	
		if($id) $query['where']=array(array('md5(reg_kegiatanid)
			'=>$id));				
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'), 
			'atributsistem'=>$this->duwi->atributsistem(),
		);
		$view=$this->load->view($this->default_view.'cetakabsen',$data,true);
		$cetak=[
			'judul'=>$global_set['headline'],
			'view'=>$view,
			'kertas'=>'A4',
		];
		$this->duwi->prosescetak($cetak);
	}		
}
