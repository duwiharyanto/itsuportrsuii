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

class Upload extends CI_Controller {
// class Registrasi extends Core {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->load->helper('generatetombol');
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->iduser=$this->session->userdata('user_id');
		$this->leveluser=$this->session->userdata('user_level');
		$this->duwi->cekadmin();
	}
	//VARIABEL
	private $master_tabel="upload"; //Mendefinisikan Nama Tabel
	private $id="upload_id";	//Menedefinisaikan Nama Id Tabel
	private $aksesadmin=['1','7','8']; //List ADMIN
	private $filename='troubleshoot Sistem';
	private $default_url="Upload/Upload/"; //Mendefinisikan url controller
	private $default_view="Upload/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/uploadberkas/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		$status=true;
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Upload/index.php";
			$menu_submenu=false;
		}
		if($this->leveluser!=1){
			//$status=false;
		}
		$data=array(
			'menu'=>'upload',//Seting menu yang aktif
			'menu_submenu'=>$menu_submenu,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>$overwriteview,
			'detail'=>false,
			'print'=>false,
			'edit'=>$status,
			'delete'=>$status,
			'download'=>true,
			'tambah'=>false,
			'import'=>false,
			'export'=>false,
			'qrcode'=>false,
			'hapussemua'=>true,
			'stats'=>$status,

		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		if($file->upload_berkas) unlink($this->path.$file->upload_berkas);
	}	
	public function index()
	{

		$global_set=array(
			'headline'=>'Berkas Upload',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);

		//CEK SUBMIT DATA
		if($this->input->post('upload_namaberkas')){
			//PROSES SIMPAN
			$data=array(
				'upload_namaberkas'=>$this->input->post('upload_namaberkas'),
				'upload_deskripsi'=>$this->input->post('upload_deskripsi'),
				'upload_userid'=>$this->iduser,
			);
			########################################################
			$file='upload_berkas';
			if($_FILES[$file]['name']){
				if($this->duwi->fileupload($this->path,$file)){
					$fileupload=$this->upload->data('file_name');
					$data[$file]=$fileupload;
					//$data['berkas_kapasitas']=$this->upload->data('file_size');
				}else{
					$dt['error']=$this->upload->display_errors();
					return $this->output->set_output(json_encode($dt));
					//exit();
				}
			}
			$query=array(
				'data'=>$this->security->xss_clean($data),
				'tabel'=>$this->master_tabel,
			);
			$insert=$this->Crud->insert($query);
			if($insert){
				//$this->session->set_flashdata('success','simpan berhasil');
				$dt['success']='input data berhasil';
			}else{
				// $this->session->set_flashdata('error','simpan gagal');
				$dt['error']='input data error';
			}
			return $this->output->set_output(json_encode($dt));
		}else{
			$data=array(
				'global'=>$global,
				'menu'=>$this->duwi->menu_backend($this->session->userdata('user_level')),
			);
			$this->load->view($this->view,$data);
		}
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'Data',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		if(in_array($this->leveluser, $this->aksesadmin)){
			$query='select a.*,b.user_nama from upload a 
				JOIN user b ON b.user_id=a.upload_userid
				ORDER BY a.upload_id DESC';				
		}else{
			$query='select a.*,b.user_nama from upload a 
				JOIN user b ON b.user_id=a.upload_userid
				WHERE a.upload_userid='.$this->iduser.'
				ORDER BY a.upload_id DESC';			
		}
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->hardcode($query)->result(),
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
		if($this->input->post('upload_namaberkas')){
			//PROSES SIMPAN
			$data=array(
				'upload_namaberkas'=>$this->input->post('upload_namaberkas'),
				'upload_deskripsi'=>$this->input->post('upload_deskripsi'),
				'upload_userid'=>$this->iduser,
			);	
			####################################################
			$file='upload_berkas';
			if($_FILES[$file]['name']){
				if($this->duwi->fileupload($this->path,$file)){
					$this->hapus_file($id);
					$fileupload=$this->upload->data('file_name');
					$data[$file]=$fileupload;
					// $data['upload_berkas']=$this->upload->data('file_size');
				}else{
					$dt['error']=$this->upload->display_errors();
					return $this->output->set_output(json_encode($dt));
					//exit();
				}
			}
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
			$unit=[
				'tabel'=>'unit',
			];				
			$q_kategori=[
				'tabel'=>'status',
			];				
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'status'=>$this->Crud->read($q_kategori)->result(),
				'unit'=>$this->Crud->read($unit)->result(),
				'global'=>$global,
			);
			//$this->viewdata($data);
			if(in_array($this->leveluser, $this->aksesadmin)){
				$this->load->view($this->default_view.'edit',$data);	
			}else{
				$this->load->view($this->default_view.'edit',$data);
			}
			
		}
	}
	public function add(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'tambah data',
			'url'=>$this->default_url, //AKAN DIREDIRECT KE INDEX
		);
		$global=$this->global_set($global_set);		
		$data=array(
			'global'=>$global,
			);
		$this->load->view($this->default_view.'add',$data);
	}
	public function hapus(){
		$id=$this->input->post('id');
		#############################
		$this->hapus_file($id);
		$query=array(
			'tabel'=>$this->master_tabel,
			//'where'=>array($this->id=>$id);,
		);
		if($id) $query['where']=array($this->id=>$id);
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
	public function downloadfile($file){
		$this->duwi->downloadfile($this->pathformatimport,$file);
	}
	public function previewfile($file=null){
		if(!$file)$file='file tidak ada';
		$global_set=array(
			'submenu'=>false,
			'headline'=>'preview',
			'url'=>$this->default_url, //AKAN DIREDIRECT KE INDEX
		);	
		$global=$this->global_set($global_set);
		$data=array(
			'global'=>$global,
			'file'=>base_url($this->path.$file),
			'cekfile'=>$this->path.$file,
		);
		// echo $data['file'];
		// exit();
		$this->load->view($this->default_view.'previewfile',$data);		
	}	
	public function cetak($nama=null,$norumah=null){
		$global_set=array(
			'headline'=>'Daftar Nomor Surat',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		if($this->leveluser==1){
			$query='select a.*,b.user_nama,c.status_status from trobelsistem a 
				JOIN user b ON b.user_id=a.trobelsistem_iduser 
				JOIN status c ON c.status_id=a.trobelsistem_idstatus
				ORDER BY LEFT(a.trobelsistem_ticket,4) DESC';				
		}else{
			$query='select a.*,b.user_nama,c.status_status from trobelsistem a 
				JOIN user b ON b.user_id=a.trobelsistem_iduser 
				JOIN status c ON c.status_id=a.trobelsistem_idstatus
				WHERE a.trobelsistem_iduser='.$this->iduser.'
				ORDER BY LEFT(a.trobelsistem_ticket,4) DESC';			
		}
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->hardcode($query)->result(),
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

}
		
