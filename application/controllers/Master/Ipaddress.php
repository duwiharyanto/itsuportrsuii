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

class Ipaddress extends CI_Controller {
// class Registrasi extends Core {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->load->helper('generatetombol');
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->duwi->cekadmin();
	}
	//VARIABEL
	private $master_tabel="ip"; //Mendefinisikan Nama Tabel
	private $id="ip_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Master/Ipaddress/"; //Mendefinisikan url controller
	private $default_view="Master/Ip/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/berkas/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Master/Ip/index.php";
			$menu_submenu='ipaddress';
		}
		$data=array(
			'menu'=>'master',//Seting menu yang aktif
			'menu_submenu'=>$menu_submenu,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>$overwriteview,
			'detail'=>false,
			'print'=>false,
			'edit'=>true,
			'delete'=>true,
			'download'=>false,
			'tambah'=>false,
			'import'=>false,
			'qrcode'=>false,

		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		if($file->berkas_file) unlink($this->path.$file->berkas_file);
	}	
	public function index()
	{
		$global_set=array(
			'headline'=>'daftar Ip address',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);

		//CEK SUBMIT DATA
		if($this->input->post('ip_address')){
			//PROSES SIMPAN
			$data=array(
				'ip_address'=>$this->input->post('ip_address'),
				'ip_catatan'=>$this->input->post('ip_catatan'),
			);
			########################################################
			// $file='berkas_file';
			// if($_FILES[$file]['name']){
			// 	if($this->duwi->fileupload($this->path,$file)){
			// 		$fileupload=$this->upload->data('file_name');
			// 		$data[$file]=$fileupload;
			// 		$data['berkas_kapasitas']=$this->upload->data('file_size');
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
		// $query=array(
		// 	'select'=>'a.*,b.kategori_kategori',
		// 	'tabel'=>'berkas a',
		// 	'join'=>[['tabel'=>'kategori b','ON'=>'b.kategori_id=a.berkas_kategoriid','jenis'=>'INNER']],
		// 	'order'=>array('kolom'=>'a.berkas_id','orderby'=>'DESC'),
		// );
		$query=[
			'tabel'=>$this->master_tabel,
		];
		$q_kategori=[
			'tabel'=>'kategori',
		];		
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
			'kategori'=>$this->Crud->read($q_kategori)->result(),
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
		if($this->input->post('ip_address')){
			//PROSES SIMPAN
			$data=array(
				'ip_address'=>$this->input->post('ip_address'),
				'ip_catatan'=>$this->input->post('ip_catatan'),
			);
			####################################################
			// $file='berkas_file';
			// if($_FILES[$file]['name']){
			// 	if($this->gambarupload($this->path,$file)){
			// 		if($id){
			// 			$this->hapus_file($id);
			// 		}
			// 		$fileupload=$this->upload->data('file_name');
			// 		$data[$file]=$fileupload;
			// 		$data['berkas_kapasitas']=$this->upload->data('file_size');
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
			$q_kategori=[
				'tabel'=>'kategori',
			];				
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'kategori'=>$this->Crud->read($q_kategori)->result(),
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
		$q_kategori=[
			'tabel'=>'kategori',
		];
		$data=array(
			'kategori'=>$this->Crud->read($q_kategori)->result(),
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
}
