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

class Backup extends CI_Controller {
// class Registrasi extends Core {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->duwi->cekadmin();
		date_default_timezone_set('Asia/Jakarta');

	}
	//VARIABEL
	private $master_tabel="setting"; //Mendefinisikan Nama Tabel
	private $id="setting_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Setting/Backup/"; //Mendefinisikan url controller
	private $default_view="Setting/Backup/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/sistem/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];		
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Setting/Backup/index.php"; //EDIT 
			$menu_submenu='backup';
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
	public function db(){
		$this->load->dbutil();
		$prefs = array(
			'format' => 'zip',
			'filename' => 'my_db_backup.sql'
		);
		$backup =& $this->dbutil->backup($prefs);
		$db_name = 'backup-on-' . date("d-m-Y, H-i-s") . '.zip'; // file name
		$save  = 'backupdb/' . $db_name; // dir name backup output destination

		$this->load->helper('file');
		$r=write_file($save, $backup);
		if($r){
			$this->session->set_flashdata('success','Backup data berhasil');
		}
		redirect(site_url($this->default_url));	
		// $this->load->helper('download');
		// force_download($db_name, $backup);
	}
	public function files(){
		$opt = array(
		'src' => './backupdb/', // dir name to backup
		//'src'=>'backup-on-2020-01-06-07-56-10.zip',
		'dst' => './backupdb/file/' // dir name backup output destination
		);

		// Codeigniter v3x
		$this->load->library('recurseZip_lib', $opt);
		$download = $this->recursezip_lib->compress();

		/* Codeigniter v2x
		$zip    = $this->load->library('recurseZip_lib', $opt);     
		$download = $zip->compress();
		*/
		//echo $download;
		redirect(base_url($download));
	}

	public function index()
	{
		$global_set=array(
			'headline'=>'Baackup Database',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$data=array(
			'global'=>$global,
			'menu'=>$this->duwi->menu_backend($this->session->userdata('user_level')),
		);
		$this->load->view($this->view,$data);
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'Backup Database',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);		
		$data=array(
			'global'=>$global,
		);
		$this->load->view($this->default_view.'tabel',$data);		
	}
	public function filemanager(){
        define('FM_EMBED', true);
        //define('FM_SELF_URL', UrlHelper::currentUrl()); // must be set if URL to manager not equal PHP_SELF
        define('FM_SELF_URL', $_SERVER['PHP_SELF']);
        $path=base_url('/plugins/');
        require 'filemanager.php';		
	}
}
