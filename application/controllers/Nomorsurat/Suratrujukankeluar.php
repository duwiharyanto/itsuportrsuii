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

class suratrujukankeluar extends CI_Controller {
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
	private $master_tabel="suratrujukankeluar"; //Mendefinisikan Nama Tabel
	private $id="suratrujukankeluar_id";	//Menedefinisaikan Nama Id Tabel
	private $filename='surat rujukan keluar';
	private $kodeberkas="B.06";
	private $default_url="Nomorsurat/Suratrujukankeluar/"; //Mendefinisikan url controller
	private $default_view="Nomorsurat/Suratrujukankeluar/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/berkas/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Nomorsurat/Suratrujukankeluar/index.php";
			$menu_submenu="surat_rujukan_keluar";
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
			'import'=>true,
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
		if($file->berkas_file) unlink($this->path.$file->berkas_file);
	}	
	public function index()
	{
		$global_set=array(
			'headline'=>'surat rujukan keluar',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);

		//CEK SUBMIT DATA
		if($this->input->post('suratrujukankeluar_nomor')){
			//PROSES SIMPAN
			$data=array(
				'suratrujukankeluar_nomor'=>$this->input->post('suratrujukankeluar_nomor'),
				'suratrujukankeluar_norm'=>$this->input->post('suratrujukankeluar_norm'),
				'suratrujukankeluar_nama'=>$this->input->post('suratrujukankeluar_nama'),
				'suratrujukankeluar_tanggal'=>date('Y-m-d',strtotime($this->input->post('suratrujukankeluar_tanggal'))),
				'suratrujukankeluar_bulan'=>$this->duwi->bulannama(str_replace('0','',date('m',strtotime($this->input->post('suratrujukankeluar_tanggal'))))),
				'suratrujukankeluar_iduser'=>$this->session->userdata('user_id'),
				'suratrujukankeluar_dx'=>$this->input->post('suratrujukankeluar_dx'),
				'suratrujukankeluar_rstujuan'=>$this->input->post('suratrujukankeluar_rstujuan'),
				'suratrujukankeluar_poliasal'=>$this->input->post('suratrujukankeluar_poliasal'),
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
		$query=array(
			'select'=>'a.*,b.user_nama',
			'tabel'=>'suratrujukankeluar a',
			'join'=>[['tabel'=>'user b','ON'=>'b.user_id=a.suratrujukankeluar_iduser','jenis'=>'INNER']],
			'order'=>array('kolom'=>'a.suratrujukankeluar_id','orderby'=>'DESC'),
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
		if($this->input->post('suratrujukankeluar_norm')){
			//PROSES SIMPAN
			$data=array(
				'suratrujukankeluar_norm'=>$this->input->post('suratrujukankeluar_norm'),
				'suratrujukankeluar_nama'=>$this->input->post('suratrujukankeluar_nama'),
				'suratrujukankeluar_dx'=>$this->input->post('suratrujukankeluar_dx'),
				'suratrujukankeluar_rstujuan'=>$this->input->post('suratrujukankeluar_rstujuan'),
				'suratrujukankeluar_poliasal'=>$this->input->post('suratrujukankeluar_poliasal'),
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
		$nourut=0;
		$global=$this->global_set($global_set);
		$db_nourut=$this->Crud->hardcode("SELECT LEFT(suratrujukankeluar_nomor,4) AS kode from suratrujukankeluar ORDER BY suratrujukankeluar_nomor DESC LIMIT 1")->row();
		if($db_nourut) $nourut=$db_nourut->kode;
		$ar_noskm=[
			'bulan'=>str_replace('0','',date('m')),
			'nomor'=>$nourut,
			'kodeberkas'=>$this->kodeberkas,
			'instansi'=>'RSUII',
			'tahun'=>date('Y')
		];
		$noskm=$this->duwi->nomorskm($ar_noskm);		
		$data=array(
			'noskm'=>$noskm,
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
			//'where'=>array($this->id=>$id),
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
			'headline'=>$this->filename,
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$query=array(
			'select'=>'a.*,b.user_nama',
			'tabel'=>'suratrujukankeluar a',
			'join'=>[['tabel'=>'user b','ON'=>'b.user_id=a.suratrujukankeluar_iduser','jenis'=>'INNER']],
			'order'=>array('kolom'=>'a.suratrujukankeluar_id','orderby'=>'DESC'),
		);
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
	public function exportexcell()
	{
		$filename=$this->filename;
		$query=array(
			'select'=>'a.*,b.user_nama',
			'tabel'=>'suratrujukankeluar a',
			'join'=>[['tabel'=>'user b','ON'=>'b.user_id=a.suratrujukankeluar_iduser','jenis'=>'INNER']],
			'order'=>array('kolom'=>'a.suratrujukankeluar_id','orderby'=>'DESC'),
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
		->setCellValue('F2', 'Diagnosa')
		->setCellValue('G2', 'RS. Tujuan')
		->setCellValue('H2', 'Poli Asal');

		$kolom = 3;
		$nomor = 1;
		foreach($dt as $row) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A' . $kolom, $nomor)
			->setCellValue('B' . $kolom, $row->suratrujukankeluar_nomor)
			->setCellValue('C' . $kolom, $row->suratrujukankeluar_bulan)
			->setCellValue('D' . $kolom, $row->suratrujukankeluar_norm)
			->setCellValue('E' . $kolom, $row->suratrujukankeluar_nama)
			->setCellValue('F' . $kolom, $row->suratrujukankeluar_dx)
			->setCellValue('G' . $kolom, $row->suratrujukankeluar_rstujuan)
			->setCellValue('H' . $kolom, $row->suratrujukankeluar_poliasal);
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
		    	array_push($data, array(
					'suratrujukankeluar_nomor'=>$sheetData[$i]['1'],
					'suratrujukankeluar_bulan'=>$sheetData[$i]['2'],
					'suratrujukankeluar_norm'=>$sheetData[$i]['3'],
					'suratrujukankeluar_nama'=>$sheetData[$i]['4'],
					'suratrujukankeluar_tanggal'=>date('Y-m-d'),
					'suratrujukankeluar_iduser'=>$this->session->userdata('user_id'),
					'suratrujukankeluar_dx'=>$sheetData[$i]['5'],
					'suratrujukankeluar_rstujuan'=>$sheetData[$i]['6'],
					'suratrujukankeluar_poliasal'=>$sheetData[$i]['7'],
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
		
