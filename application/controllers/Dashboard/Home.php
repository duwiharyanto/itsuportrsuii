
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

class Home extends CI_Controller {
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
	private $default_url="Dashboard/Home/"; //Mendefinisikan url controller
	private $default_view="Dashboard/Home/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/profil/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Dashboard/Home/index.php";
			$menu_submenu=false;
		}
		$data=array(
			'menu'=>'home',//Seting menu yang aktif
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

		//REGISTRASI
		$wargakampung="select DATE_FORMAT(created_at,'%d-%m-%Y') AS tanggal, COUNT(*) AS jumlah From wargakampung GROUP BY DATE_FORMAT(created_at,'%Y%m%d') ORDER BY created_at DESC LIMIT 7";
		$res_wargakampung=$this->Crud->hardcode($wargakampung)->result();
		$ar_jumharian=array();
		$ar_tgl=array();
		foreach ($res_wargakampung as $index => $row) {
			$ar_jumharian[$index]=intval($row->jumlah);
			$ar_tgl[$index]='"'.date('d-m-Y',strtotime($row->tanggal)).'"';
		}
		$grafikregistrasi=[
			'regharian'=>'['.implode(',',$ar_jumharian).']',
			'tglregharian'=>'['.implode(',', $ar_tgl).']',
		];

		$qpendatang="select pendatang_id From pendatang";
		$qbalita="select balita_id From balita";
		$qmeninggal="select meninggal_id From meninggal";
		$jeniskelamin="select cast(COUNT(warga_id) AS int) AS jumlah,if(warga_jeniskelamin=0,'Perempuan','Laki') AS jeniskelamin from wargakampung GROUP BY warga_jeniskelamin";
		$qjumwarga="select * From wargakampung order by warga_id desc";
		$qpendidikan="SELECT cast(COUNT(a.warga_id) AS int) AS jumlah,b.pendidikan_nama from wargakampung a join pendidikan b ON b.pendidikan_id=a.warga_idpendidikan GROUP BY a.warga_idpendidikan";
		$data=array(
			'global'=>$global,
			'grafikloginuser'=>$grafikloginuser,
			'grafikregistrasi'=>$grafikregistrasi,
			'pendatang'=>$this->Crud->hardcode($qpendatang)->result(),
			'balita'=>$this->Crud->hardcode($qbalita)->result(),
			'meninggal'=>$this->Crud->hardcode($qmeninggal)->result(),
			'jeniskelamin'=>$this->Crud->hardcode($jeniskelamin)->result(),
			'warga'=>$this->Crud->hardcode($qjumwarga)->result(),
			'pendidikan'=>$this->Crud->hardcode($qpendidikan)->result(),
		);
		// print_r($data);
		// exit();
		$this->load->view($this->default_view.'tabel',$data);
	}
}
