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

class Warga extends CI_Controller {
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
	private $master_tabel="wargakampung"; //Mendefinisikan Nama Tabel
	private $id="warga_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Master/Warga/"; //Mendefinisikan url controller
	private $default_view="Master/Warga/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/registrasi/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Master/Warga/index.php";
			$menu_submenu='warga';
		}
		$data=array(
			'menu'=>'master',//Seting menu yang aktif
			'menu_submenu'=>$menu_submenu,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>$overwriteview,
			'detail'=>false,
			'print'=>true,
			'edit'=>true,
			'delete'=>true,
			'download'=>false,
			'tambah'=>true,
			'import'=>false,
			'qrcode'=>false,
			'cari'=>true,
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
	public function index()
	{
		$global_set=array(
			'headline'=>'warga',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);

		//CEK SUBMIT DATA
		if($this->input->post('warga_nama')){
			//PROSES SIMPAN
			$data=array(
				'warga_nama'=>$this->input->post('warga_nama'),
				'warga_jeniskelamin'=>$this->input->post('warga_jeniskelamin'),
				'warga_tanggallahir'=>date('Y-m-d',strtotime($this->input->post('warga_tanggallahir'))),
				'warga_nohp'=>$this->input->post('warga_nohp'),
				'warga_noktp'=>$this->input->post('warga_noktp'),
				'warga_idpendidikan'=>$this->input->post('warga_idpendidikan'),
				'warga_agama'=>$this->input->post('warga_agama'),
				'warga_golongandarah'=>strtoupper($this->input->post('warga_golongandarah')),
				'warga_domisili'=>$this->input->post('warga_domisili'),
				'warga_norumah'=>$this->input->post('warga_norumah'),
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
				$this->session->set_flashdata('success','simpan berhasil');
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
		$nama='';
		$norumah='';
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);
		//PROSES TAMPIL DATA
		$query=array(
			'select'=>'a.*,b.pendidikan_nama,c.norumah_nomor,c.norumah_keterangan',
			'tabel'=>'wargakampung a',
			'join'=>[['tabel'=>'pendidikan b','ON'=>'b.pendidikan_id=a.warga_idpendidikan','jenis'=>"iNNER"],
			['tabel'=>'norumah c','ON'=>'c.norumah_id=a.warga_norumah','jenis'=>'INNER']
			],
			'order'=>array('kolom'=>'warga_nama','orderby'=>'ASC'),
		);
		if($this->input->post('nama')) {
			$nama=$this->input->post('nama');
		}
		if($this->input->post('nomorumah')) {
			$norumah=$this->input->post('nomorumah');
		}
		if($nama OR $norumah){
		 	$query['like']=[['a.warga_nama'=>$nama]];
			if($norumah){
				// $query['like']=[['warga_nama'=>$nama],['warga_nomorrumah'=>$norumah]];
				$query['where']=[['c.norumah_nomor'=>$norumah]];
			}
		}
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
		if($this->input->post('warga_nama')){
			//PROSES SIMPAN
			$data=array(
				'warga_nama'=>$this->input->post('warga_nama'),
				'warga_jeniskelamin'=>$this->input->post('warga_jeniskelamin'),
				'warga_tanggallahir'=>date('Y-m-d',strtotime($this->input->post('warga_tanggallahir'))),
				'warga_nohp'=>$this->input->post('warga_nohp'),
				'warga_noktp'=>$this->input->post('warga_noktp'),
				'warga_idpendidikan'=>$this->input->post('warga_idpendidikan'),
				'warga_agama'=>$this->input->post('warga_agama'),
				'warga_golongandarah'=>strtoupper($this->input->post('warga_golongandarah')),
				'warga_domisili'=>$this->input->post('warga_domisili'),
				'warga_norumah'=>$this->input->post('warga_norumah'),
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
			$q_norumah=[
				'tabel'=>'norumah',
			];
			$q_pendidikan=[
				'tabel'=>'pendidikan',
				'order'=>['kolom'=>'pendidikan_id','orderby'=>'ASC']
			];
			$data=array(
				'norumah'=>$this->Crud->read($q_norumah)->result(),
				'pendidikan'=>$this->Crud->read($q_pendidikan)->result(),
				'data'=>$this->Crud->read($query)->row(),
				'global'=>$global,
			);
			//$this->viewdata($data);
			$this->load->view($this->default_view.'edit',$data);
		}
	}
	public function importdatas(){
		// echo "import";
		// exit();
		$file='fileimport';
		$insert=false; //DEFAULT
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(isset($_FILES[$file]['name']) && in_array($_FILES[$file]['type'], $file_mimes)) {
		    $arr_file = explode('.', $_FILES[$file]['name']);
		    $extension = end($arr_file);
		    if('csv' == $extension) {
		        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		    } else {
		        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

		    }
		    $spreadsheet = $reader->load($_FILES[$file]['tmp_name']);
		    $sheetData = $spreadsheet->getActiveSheet()->toArray();
		    $data=array();
			for($i = 1;$i < count($sheetData);$i++)
			{
		    	array_push($data, array(
					'warga_nomorrumah'=>$sheetData[$i]['1'],
					'warga_statustempattinggal'=>$sheetData[$i]['2'],
					'warga_statusktp'=>$sheetData[$i]['3'],
					'warga_domisili'=>$sheetData[$i]['4'],
					'warga_jaminankesehatan'=>$sheetData[$i]['5'],
					'warga_nomorjaminankesehatan'=>$sheetData[$i]['6'],
					'warga_sktm'=>$sheetData[$i]['7'],
					'warga_namakeluarga'=>$sheetData[$i]['8'],
					'warga_alamatnamakeluarga'=>$sheetData[$i]['9'],
					'warga_nohpkeluarga'=>$sheetData[$i]['10'],
					'warga_nomorkk'=>$sheetData[$i]['11'],
					'warga_nomorktp'=>$sheetData[$i]['12'],
					'warga_nama'=>$sheetData[$i]['13'],
					'warga_hubungankeluarga'=>$sheetData[$i]['14'],
					'warga_alamatktp'=>$sheetData[$i]['15'],
					'warga_jeniskelamin'=>$sheetData[$i]['16'],
					'warga_tempatlahir'=>$sheetData[$i]['17'],
					'warga_tanggallahir'=>$sheetData[$i]['18'],
					'warga_nomorhp'=>$sheetData[$i]['19'],
					'warga_statusnomor'=>$sheetData[$i]['20'],
					'warga_email'=>$sheetData[$i]['21'],
					'warga_agama'=>$sheetData[$i]['22'],
					'warga_golongandarah'=>$sheetData[$i]['23'],
					'warga_hobi'=>$sheetData[$i]['24'],
					'warga_statusperkawainan'=>$sheetData[$i]['25'],
					'warga_pendidikanterakhir'=>$sheetData[$i]['26'],
					'warga_pekerjaan'=>$sheetData[$i]['27'],
					'warga_alamatbekerja'=>$sheetData[$i]['28'],
					'warga_npwp'=>$sheetData[$i]['29'],
					'warga_nonpwp'=>$sheetData[$i]['30'],
		    	));
		    }
			$query=array(
				'data'=>$this->security->xss_clean($data),
				'tabel'=>$this->master_tabel,
			);
			$insert=$this->Crud->insert_multiple($query);
		}
		if($insert){
			$this->session->set_flashdata('success','simpan berhasil');
			$dt['success']='input data berhasil';
		}else{
			$this->session->set_flashdata('error','simpan gagal');
			$dt['error']='input data error';
		}
		//return $this->output->set_output(json_encode($dt));
		redirect(site_url($this->default_url));
	}
	public function add(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'tambah data',
			'url'=>$this->default_url, //AKAN DIREDIRECT KE INDEX
		);
		$global=$this->global_set($global_set);
		$q_norumah=[
			'tabel'=>'norumah',
		];
		$q_pendidikan=[
			'tabel'=>'pendidikan',
			'order'=>['kolom'=>'pendidikan_id','orderby'=>'ASC']
		];
		$data=array(
			'norumah'=>$this->Crud->read($q_norumah)->result(),
			'pendidikan'=>$this->Crud->read($q_pendidikan)->result(),
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
	public function cetak($nama=null,$norumah=null){
		$global_set=array(
			'headline'=>'Daftar Warga',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$query=array(
			'select'=>'a.*,b.pendidikan_nama,c.norumah_nomor,c.norumah_keterangan',
			'tabel'=>'wargakampung a',
			'join'=>[['tabel'=>'pendidikan b','ON'=>'b.pendidikan_id=a.warga_idpendidikan','jenis'=>"iNNER"],
			['tabel'=>'norumah c','ON'=>'c.norumah_id=a.warga_norumah','jenis'=>'INNER']
			],
			'order'=>array('kolom'=>'warga_nama','orderby'=>'ASC'),
		);
		if((isset($nama)) AND (isset($norumah))){
		if($norumah!='0'){
		 	// print_r($norumah.$nama);
		 	// exit();
			$query['where']=[['c.norumah_nomor'=>$norumah]];
		}
		if($nama!='0'){
		 	$query['like']=[['a.warga_nama'=>$nama]];
		}
		}
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->join($query)->result(),
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
	public function qrcode($id){
		$isi=site_url('public/registrasi/index/'.$id);
		$param=[
			'path'=>'./upload/qrcode/',
			'isi'=>$isi,
			'namafile'=>$id,
		];
		$url=$this->duwi->generateqrcode($param);
		echo "<h2 style='text-align:center'>Scan QRcode</h2>";
		echo "<img src='".$url."' width='300px' height='300px' style='display: block; margin-left: auto;margin-right:auto; margin-top:50px'></img>";
		echo "<p style='text-align:center;margin-top:20px'>".$isi."</p>";
	}
	public function detail(){
		$id=$this->input->post('id');
		$global_set=array(
			'submenu'=>false,
			'headline'=>'tambah data',
			'url'=>$this->default_url, //AKAN DIREDIRECT KE INDEX
		);
		$global=$this->global_set($global_set);
		$query=[
			'tabel'=>$this->master_tabel,
			'where'=>[['warga_id'=>$id]]
		];
		$r_query=$this->Crud->read($query)->row();
		$data=[
			'global'=>$global,
			'data'=>$r_query
		];
		$this->load->view($this->default_view.'detail',$data);
	}
}
