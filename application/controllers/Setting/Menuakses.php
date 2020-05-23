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

class Menuakses extends CI_Controller {
// class Registrasi extends Core {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->duwi->cekadmin();
	}
	//VARIABEL
	private $master_tabel="menu"; //Mendefinisikan Nama Tabel
	private $id="menu_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Setting/Menuakses/"; //Mendefinisikan url controller
	private $default_view="Setting/Menuakses/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/sistem/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];		
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Setting/Menuakses/index.php"; //EDIT 
			$menu_submenu='menu_akses';
		}
		$data=array(
			'menu'=>'setting',//Seting menu yang aktif
			'menu_submenu'=>$menu_submenu,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>$overwriteview,
			'detail'=>false,
			'cetak'=>false,
			'edit'=>true,
			'delete'=>true,
			'download'=>false,
		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
	}
public function index()
	{
		$global_set=array(
			'headline'=>'menu akses',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		if($this->input->post('level_nama')){
			//PROSES SIMPAN
			$data=array(
				'level_nama'=>$this->input->post('level_nama'),
				'level_status'=>$this->input->post('level_status'),
			);
			########################################################
			// $file='fileupload';
			// if($_FILES[$file]['name']){
			// 	if($this->fileupload($this->path,$file)){
			// 		$file=$this->upload->data('file_name');
			// 		$data['user_file']=$file;
			// 	}else{
			// 		$dt['error']=$this->upload->display_errors();
			// 		return $this->output->set_output(json_encode($dt));
			// 		exit();
			// 	}
			// }	
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
			$this->load->view($this->view,$data);
		}
	}
	public function tabel(){
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
		if($this->input->post('menu_ikon')){
			//PROSES SIMPAN
			$data=array(
				'menu_ikon'=>$this->input->post('menu_ikon'),
				'menu_baru'=>$this->input->post('menu_baru'),
				'menu_akses_level'=>$this->input->post('menu_akses_level'),
				'menu_status'=>$this->input->post('menu_status'),
			);

			####################################################
			// $file='fileupload';
			// if($_FILES[$file]['name']){
			// 	if($this->fileupload($this->path,$file)){
			// 		$this->hapus_file($id);
			// 		$file=$this->upload->data('file_name');
			// 		$data['user_file']=$file;
			// 	}else{
			// 		$dt['error']=$this->upload->display_errors();
			// 		return $this->output->set_output(json_encode($dt));
			// 		exit();	
			// 	}
			// }			
			$query=array(
				'data'=>$this->security->xss_clean($data),
				'tabel'=>$this->master_tabel,
				'where'=>array($this->id=>$id),
			);
			$update=$this->Crud->update($query);
			if($update){
				$dt['success']='update data berhasil';
			}else{
				$dt['error']='input data error';
			}
			return $this->output->set_output(json_encode($dt));			
		}else{
			$query=array(
				'tabel'=>$this->master_tabel,
				'where'=>array(array($this->id=>$id))
			);
			$q_level=array(
				'tabel'=>'level',
			);			
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'level'=>$this->Crud->read($q_level)->result(),
				'global'=>$global,
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
		$data=array(
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
}
