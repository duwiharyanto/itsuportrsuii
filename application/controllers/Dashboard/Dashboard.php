
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
		$qtroubel="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From troubleshoot GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 7";
		$r_trobel=$this->Crud->hardcode($qtroubel)->result_array();
		$qtroubelsistem="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From trobelsistem GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 7";		
		$r_trobelsistem=$this->Crud->hardcode($qtroubelsistem)->result_array();
		$qstatus="select b.status_status AS status, COUNT(*) AS jumlah From troubleshoot a JOIN 
			status b ON b.status_id=troubleshoot_idstatus GROUP BY a.troubleshoot_idstatus";
		$r_status=$this->Crud->hardcode($qstatus)->result_array();
		$qstatussistem="select b.status_status AS status, COUNT(*) AS jumlah From trobelsistem a JOIN 
			status b ON b.status_id=trobelsistem_idstatus GROUP BY a.trobelsistem_idstatus";
		$r_statussistem=$this->Crud->hardcode($qstatussistem)->result_array();		
		$data=[
			$r_loginharian,
			$r_trobel,
			$r_status,
			$r_trobelsistem,
			$r_statussistem
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
		$trobelshoot=[
			'tabel'=>'troubleshoot',
		];
		$sistem=[
			'tabel'=>'trobelsistem',
		];		
		$notulen=[
			'tabel'=>'notulen',
		];
		$data=array(
			'global'=>$global,
			'jumtroubleshoot'=>count($this->Crud->read($trobelshoot)->result()),
			'jumnotulen'=>count($this->Crud->read($notulen)->result()),
			'jumsistem'=>count($this->Crud->read($sistem)->result()),
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
