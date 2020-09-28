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

class Aduan extends CI_Controller {
// class Registrasi extends Core {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->load->helper('generatetombol');
		// $this->duwi->cekadmin();
		// $this->duwi->listakses($this->session->userdata('user_level'));
		$this->iduser=$this->session->userdata('user_id');
		$this->leveluser=$this->session->userdata('user_level');
		
	}
	//VARIABEL
	private $master_tabel="troubleshoot"; //Mendefinisikan Nama Tabel
	private $id="troubleshoot_id";	//Menedefinisaikan Nama Id Tabel
	private $aksesadmin=['1','7'];
	private $filename='troubleshoot Sistem';
	private $default_url="Front/Aduan/"; //Mendefinisikan url controller
	private $default_view="front/Aduan/"; //Mendefinisiakn defaul view
	private $view="_template/_frontend"; //Mendefinisikan Tamplate Root
	private $path='./upload/imageupload/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/front/Aduan/index.php";
			$menu_submenu=false;
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
			'export'=>false,
			'qrcode'=>false,
			'hapussemua'=>true,

		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		if($file->troubleshoot_image) unlink($this->path.$file->troubleshoot_image);
	}	
	public function index()
	{
		$global_set=array(
			'headline'=>'troubleshoot Sistem',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);

		//CEK SUBMIT DATA
		if($this->input->post('troubleshoot_ticket')){
			//PROSES SIMPAN
			$data=array(
				'troubleshoot_ticket'=>$this->input->post('troubleshoot_ticket'),
				'troubleshoot_nama'=>$this->input->post('troubleshoot_nama'),
				'troubleshoot_komputer'=>$this->input->post('troubleshoot_komputer'),
				'troubleshoot_deskripsi'=>$this->input->post('troubleshoot_deskripsi'),
				'troubleshoot_iduser'=>$this->iduser,
				'troubleshoot_idstatus'=>1,
			);
			########################################################
			$file='troubleshoot_image';
			if($_FILES[$file]['name']){
				if($this->duwi->gambarupload($this->path,$file)){
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
		// $query=array(
		// 	'select'=>'a.*,b.user_nama',
		// 	'tabel'=>'troubleshoot a',
		// 	'join'=>[['tabel'=>'user b','ON'=>'b.user_id=a.troubleshoot_iduser','jenis'=>'INNER']],
		// 	'order'=>array('kolom'=>'a.troubleshoot_id','orderby'=>'DESC'),
		// );
		$query='select a.*,b.user_nama,c.status_status,d.user_nama AS pic from troubleshoot a 
			JOIN user b ON b.user_id=a.troubleshoot_iduser 
			JOIN status c ON c.status_id=a.troubleshoot_idstatus
			LEFT JOIN user d ON d.user_id=a.troubleshoot_idpic
			ORDER BY LEFT(a.troubleshoot_ticket,4) DESC';
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
		if($this->input->post('troubleshoot_ticket')){
			//PROSES SIMPAN
			if(in_array($this->leveluser, $this->aksesadmin)){
				$data=array(
					'troubleshoot_idstatus'=>$this->input->post('troubleshoot_idstatus'),
					'troubleshoot_catatan'=>$this->input->post('troubleshoot_catatan'),
					'troubleshoot_idpic'=>$this->iduser,
				);
			}else{
				$data=array(
					'troubleshoot_nama'=>$this->input->post('troubleshoot_nama'),
					'troubleshoot_komputer'=>$this->input->post('troubleshoot_komputer'),
					'troubleshoot_deskripsi'=>$this->input->post('troubleshoot_deskripsi'),
				);				
			}
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
				'tabel'=>'status',
			];				
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'status'=>$this->Crud->read($q_kategori)->result(),
				'global'=>$global,
			);
			//$this->viewdata($data);
			if(in_array($this->leveluser, $this->aksesadmin)){
				$this->load->view($this->default_view.'edit',$data);	
			}else{
				$this->load->view($this->default_view.'edituser',$data);
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
		// $db_nourut=$this->Crud->hardcode("SELECT LEFT(troubleshoot_ticket,4) AS kode from troubleshoot ORDER BY kode DESC LIMIT 1")->row();
		// $ar_noskm=[
		// 	'bulan'=>str_replace('0','',date('m')),
		// 	'nomor'=>$db_nourut->kode,
		// 	'kodeberkas'=>$this->kodenomor,
		// 	'instansi'=>'RSUII',
		// 	'tahun'=>date('Y')
		// ];
		// $noskm=$this->duwi->nomorskm($ar_noskm);		
		$param=base_convert(microtime(false), 7, 36);		
		$data=array(
			'notiket'=>$param,
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
			$query='select a.*,b.user_nama,c.status_status from troubleshoot a 
				JOIN user b ON b.user_id=a.troubleshoot_iduser 
				JOIN status c ON c.status_id=a.troubleshoot_idstatus
				ORDER BY LEFT(a.troubleshoot_ticket,4) DESC';				
		}else{
			$query='select a.*,b.user_nama,c.status_status from troubleshoot a 
				JOIN user b ON b.user_id=a.troubleshoot_iduser 
				JOIN status c ON c.status_id=a.troubleshoot_idstatus
				WHERE a.troubleshoot_iduser='.$this->iduser.'
				ORDER BY LEFT(a.troubleshoot_ticket,4) DESC';			
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
	public function exportexcell(){
		$filename=$this->filename;
		$query=array(
			'select'=>'a.*,b.user_nama',
			'tabel'=>'troubleshoot a',
			'join'=>[['tabel'=>'user b','ON'=>'b.user_id=a.troubleshoot_iduser','jenis'=>'INNER']],
			'order'=>array('kolom'=>'a.troubleshoot_id','orderby'=>'DESC'),
		);
		$dt=$this->Crud->join($query)->result();
		$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet;
		$spreadsheet->setActiveSheetIndex(0)
		->mergeCells('A1:E1');
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1',$this->filename);		
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A2', 'No')
		->setCellValue('B2', 'Nomor Surat')
		->setCellValue('C2', 'Bulan')
		->setCellValue('D2', 'No RM')
		->setCellValue('E2', 'Nama')
		->setCellValue('F2', 'Unit')
		->setCellValue('G2', 'Ijin Diberikan');
		$kolom = 3;
		$nomor = 1;
		foreach($dt as $row) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A' . $kolom, $nomor)
			->setCellValue('B' . $kolom, $row->troubleshoot_nomor)
			->setCellValue('C' . $kolom, $row->troubleshoot_bulan)
			->setCellValue('D' . $kolom, $row->troubleshoot_norm)
			->setCellValue('E' . $kolom, $row->troubleshoot_nama)
			->setCellValue('F' . $kolom, $row->troubleshoot_unit)
			->setCellValue('G' . $kolom, $row->troubleshoot_ijin);
			$kolom++;
			$nomor++;
		}
		//$writer = new Xlsx($spreadsheet);
		$writer = new writer($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}
	public function importexcell(){
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
			for($i = 2;$i < count($sheetData);$i++)
			{
				$troubleshoot=str_pad($sheetData[$i]['1'], 4, "0", STR_PAD_LEFT).$sheetData[$i]['2'];
		    	array_push($data, array(
					'troubleshoot_nomor'=>$troubleshoot,
					'troubleshoot_norm'=>$sheetData[$i]['4'],
					'troubleshoot_nama'=>strtolower($sheetData[$i]['5']),
					'troubleshoot_tanggal'=>date('Y-m-d'),
					'troubleshoot_bulan'=>$sheetData[$i]['3'],
					'troubleshoot_unit'=>$sheetData[$i]['6'],
					'troubleshoot_ijin'=>$sheetData[$i]['7'],
					'troubleshoot_iduser'=>$this->session->userdata('user_id'),
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
			//$dt['success']='input data berhasil';
		}else{
			$this->session->set_flashdata('error','simpan gagal');
			//$dt['error']='input data error';
		}
		//return $this->output->set_output(json_encode($dt));
		redirect(site_url($this->default_url));
	}			
}
		
