
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Programer haryanto.duwi
	 * Email haryanto.duwi@gmail.com
	 * Github duwiharyanto.guthub.io
	 */

//include controller master
include APPPATH.'controllers/Core.php';
require './plugins/phpexcel/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as writer;

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->duwi->cekadmin();
		$this->duwi->listakses($this->session->userdata('user_level'));
	}
	//VARIABEL
	private $master_tabel="user"; //Mendefinisikan Nama Tabel
	private $id="user_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Dashboard/Dashboard/"; //Mendefinisikan url controller
	private $default_view="Dashboard/Dashboard/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/profil/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Dashboard/Dashboard/index.php";
			$menu_submenu='user';
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
			'headline'=>'dashboard',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		$data=array(
			'global'=>$global,
			'menu'=>$this->duwi->menu_backend($this->session->userdata('user_level')),
		);
		//$this->viewdata($data);

		$this->load->view($this->view,$data);
		//print_r($data['menu']);
	}
	public function grafikdashboard(){
		$userloginharian="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal,log_aksi, COUNT(*) AS jumlah From log WHERE log_aksi='login' GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 20";
		$r_loginharian=$this->Crud->hardcode($userloginharian)->result_array();	

		$suratsakit="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From nomorsurat GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 20";
		$r_suratsakit=$this->Crud->hardcode($suratsakit)->result_array();

		$suratsehat="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From suratsehat GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 20";
		$r_suratsehat=$this->Crud->hardcode($suratsehat)->result_array();

		$surathamil="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From surathamil GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 20";
		$r_surathamil=$this->Crud->hardcode($surathamil)->result_array();

		$suratlahir="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From suratlahir GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 20";
		$r_suratlahir=$this->Crud->hardcode($suratlahir)->result_array();		

		$data=[
			$r_loginharian,
			$r_suratsakit,
			$r_suratsehat,
			$r_surathamil,
			$r_suratlahir,
		];	
		$this->output->set_output(json_encode($data));
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'Data',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);
		//USER LOGIN
		$userloginharian="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal,log_aksi, COUNT(*) AS jumlah From log WHERE log_aksi='login' GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 7";
		$r_loginharian=$this->Crud->hardcode($userloginharian)->result();
		$ar_loginharian=array();
		$ar_tglloginharian=array();
		foreach ($r_loginharian as $index => $row) {
			$ar_loginharian[$index]=intval($row->jumlah);
			$ar_tglloginharian[$index]='"'.date('d-m-Y',strtotime($row->tanggal)).'"';
		}
		$grafikloginuser=[
			'loginharian'=>'['.implode(',',$ar_loginharian).']',
			'tglloginharian'=>'['.implode(',', $ar_tglloginharian).']',
		];

		$data=array(
			'global'=>$global,
			// 'grafikloginuser'=>$grafikloginuser,
			// 'grafikregistrasi'=>$grafikregistrasi,
			// 'kegiatan'=>$r_kegiatan,
			// 'jumkegiatan'=>$this->Crud->hardcode($qjumkegiatan)->result(),
			// 'warga'=>$this->Crud->hardcode($qjumwarga)->result(),
		);
		// print_r($data);
		// exit();
		$this->load->view($this->default_view.'tabel',$data);
	}
}
