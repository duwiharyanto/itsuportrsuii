<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * Programer haryanto.duwi
	 * Email haryanto.duwi@gmail.com
	 * Github duwiharyanto.guthub.io
	 */

//include controller master 
// include APPPATH.'controllers/Core.php';
require './plugins/phpexcel/vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;	
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as writer;

class Log extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->duwi->cekadmin();
		$this->duwi->listakses($this->session->userdata('user_level'));
	}
	//VARIABEL
	private $master_tabel="log"; //Mendefinisikan Nama Tabel
	private $id="log_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Log/Log/"; //Mendefinisikan url controller
	private $default_view="Log/Log/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/profil/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];		
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Log/Log/index.php";
			$menu_submenu='false';
		}
		$data=array(
			'menu'=>'log',//Seting menu yang aktif
			'menu_submenu'=>$menu_submenu,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>$overwriteview,
			'add'=>false,
			'detail'=>false,
			'cetak'=>false,
			'edit'=>false,
			'delete'=>true,
			'download'=>false,
			'print'=>true,
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
		unlink($this->path.$file->user_foto);
	}
	public function index()
	{
		$global_set=array(
			'headline'=>'log user',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		if($this->input->post('user_username')){
			//PROSES SIMPAN
			$data=array(
				'user_nama'=>$this->input->post('user_nama'),
				'user_email'=>$this->input->post('user_email'),
				'user_username'=>$this->input->post('user_username'),
				'user_password'=>md5($this->input->post('user_password')),
				'user_level'=>$this->input->post('user_level'),
			);
			########################################################
			// $file='user_foto';
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
			//print_r($data);		

			$query=array(
				'data'=>$this->security->xss_clean($data),
				'tabel'=>$this->master_tabel,
			);
			$insert=$this->Crud->insert($query);
			if($insert){
				$this->session->set_flashdata('success','simpan berhasil');	
				$dt['success']='input data berhasil';
			}else{
				$this->session->set_flashdata('error','simpan gagal');	
				$dt['error']='input data error';
			}
			return $this->output->set_output(json_encode($dt));
		}else{
			$data=array(
				'global'=>$global,
				'menu'=>$this->duwi->menu_backend($this->session->userdata('user_level')),
			);
			//$this->viewdata($data);

			$this->load->view($this->view,$data);
			//print_r($data['menu']);
		}
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'Data',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);		
		$query=array(
			'select'=>'a.*, b.user_username',
			'tabel'=>'log a',
			'join'=>array(array('tabel'=>'user b','ON'=>'a.log_iduser=b.user_id','jenis'=>'INNER')),
			'order'=>array('kolom'=>'a.log_id','orderby'=>'DESC'),
		);
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->join($query)->result(),
			
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
		if($this->input->post('user_nama')){
			//PROSES SIMPAN
			$data=array(
				'user_nama'=>$this->input->post('user_nama'),
				'user_email'=>$this->input->post('user_email'),
				'user_username'=>$this->input->post('user_username'),
				'user_level'=>$this->input->post('user_level'),
				'user_status'=>$this->input->post('user_status'),
			);
			if($this->input->post('user_password')){
				$data['user_password']=md5($this->input->post('user_password'));			
			}
			####################################################
			$file='user_foto';
			if($_FILES[$file]['name']){
				if($this->gambarupload($this->path,$file)){
					if($id){
						$this->hapus_file($id);
					}					
					$fileupload=$this->upload->data('file_name');
					$data[$file]=$fileupload;
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
				$this->session->set_flashdata('success','update data berhasil');	
				$dt['success']='update data berhasil';
			}else{
				$this->session->set_flashdata('error','update data gagal');	
				$dt['error']='input data error';
			}
			return $this->output->set_output(json_encode($dt));			
		}else{
			$query=array(
				'tabel'=>$this->master_tabel,
				'where'=>array(array($this->id=>$id))
			);
			$q_level=[
				'tabel'=>'level',
			];
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'level'=>$this->Crud->read($q_level)->result(),
				'global'=>$global,
				'menu'=>$this->menu(0),
			);
			//$this->viewdata($data);			
			$this->load->view($this->default_view.'edit',$data);
		}			
	}

	public function add(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'add data',
			'url'=>$this->default_url, //AKAN DIREDIRECT KE INDEX
		);	
		$global=$this->global_set($global_set);
		$q_level=[
			'tabel'=>'level',
		];
		$data=array(
			'level'=>$this->Crud->read($q_level)->result(),
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
	public function cetak(){
		$global_set=array(
			'headline'=>'Log user',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);	
		$query=array(
			'select'=>'a.*, b.user_username',
			'tabel'=>'log a',
			'join'=>array(array('tabel'=>'user b','ON'=>'a.log_iduser=b.user_id','jenis'=>'INNER')),
			'order'=>array('kolom'=>'a.log_id','orderby'=>'DESC'),
		);			
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->join($query)->result(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'), 
		);
		$view=$this->load->view($this->default_view.'cetak',$data,true);
		$cetak=[
			'judul'=>'Log user',
			'view'=>$view,
			'kertas'=>'A4',
		];
		$this->duwi->prosescetak($cetak);
	}	
}
