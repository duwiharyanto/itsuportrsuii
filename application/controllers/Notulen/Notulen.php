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

class Notulen extends CI_Controller {
// class Registrasi extends Core {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model','Crud');
		$this->load->library('Duwi');
		$this->load->helper('generatetombol');
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->iduser=$this->session->userdata('user_id');
		$this->leveluser=$this->session->userdata('user_level');
		$this->duwi->cekadmin();
	}
	//VARIABEL
	private $master_tabel="notulen"; //Mendefinisikan Nama Tabel
	private $id="notulen_id";	//Menedefinisaikan Nama Id Tabel
	private $kodenomor='B.4';
	private $instansi='RSUII';
	private $aksesadmin=['1','7'];
	private $filename='troubleshoot Sistem';
	private $default_url="Notulen/Notulen/"; //Mendefinisikan url controller
	private $default_view="Notulen/Notulen/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/notulen/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Notulen/Notulen/index.php";
			$menu_submenu=false;
		}
		$data=array(
			'menu'=>'notulen',//Seting menu yang aktif
			'menu_submenu'=>false,
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
			'headline'=>'Notulen/Catatan',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);

		//CEK SUBMIT DATA
		if($this->input->post('notulen_param')){
			//PROSES SIMPAN
			$data=array(
				'notulen_param'=>$this->input->post('notulen_param'),
				'notulen_nama'=>$this->input->post('notulen_nama'),
				'notulen_isi'=>$this->input->post('notulen_isi'),
				'notulen_status'=>$this->input->post('notulen_status'),
				'notulen_iduser'=>$this->iduser,
			);
			########################################################
			// $file='troubleshoot_image';
			// if($_FILES[$file]['name']){
			// 	if($this->duwi->gambarupload($this->path,$file)){
			// 		$fileupload=$this->upload->data('file_name');
			// 		$data[$file]=$fileupload;
			// 		//$data['berkas_kapasitas']=$this->upload->data('file_size');
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
		// 	'select'=>'a.*,b.user_nama',
		// 	'tabel'=>'troubleshoot a',
		// 	'join'=>[['tabel'=>'user b','ON'=>'b.user_id=a.troubleshoot_iduser','jenis'=>'INNER']],
		// 	'order'=>array('kolom'=>'a.troubleshoot_id','orderby'=>'DESC'),
		// );
		if(in_array($this->leveluser, $this->aksesadmin)){
			$query=[
				'tabel'=>$this->master_tabel,
			];			
		}else{
			$query=[
				'tabel'=>$this->master_tabel,
				'where'=>[$this->id=>$this->iduser]
			];		
		}
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
		if($this->input->post('notulen_nama')){
			//PROSES SIMPAN
			if(in_array($this->leveluser, $this->aksesadmin)){
				$data=array(
					'notulen_nama'=>$this->input->post('notulen_nama'),
					'notulen_isi'=>$this->input->post('notulen_isi'),
					'notulen_status'=>$this->input->post('notulen_status'),
					'notulen_iduser'=>$this->iduser,
				);
			}else{
				$data=array(
					'notulen_nama'=>$this->input->post('notulen_nama'),
					'notulen_isi'=>$this->input->post('notulen_isi'),
					'notulen_status'=>$this->input->post('notulen_status'),
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
	public function cetak(){
		$global_set=array(
			'headline'=>'Daftar Nomor Surat',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		// if($this->leveluser==1){
		// 	$query='select a.*,b.user_nama,c.status_status from troubleshoot a 
		// 		JOIN user b ON b.user_id=a.troubleshoot_iduser 
		// 		JOIN status c ON c.status_id=a.troubleshoot_idstatus
		// 		ORDER BY LEFT(a.troubleshoot_ticket,4) DESC';				
		// }else{
		// 	$query='select a.*,b.user_nama,c.status_status from troubleshoot a 
		// 		JOIN user b ON b.user_id=a.troubleshoot_iduser 
		// 		JOIN status c ON c.status_id=a.troubleshoot_idstatus
		// 		WHERE a.troubleshoot_iduser='.$this->iduser.'
		// 		ORDER BY LEFT(a.troubleshoot_ticket,4) DESC';			
		// }
		if(in_array($this->leveluser, $this->aksesadmin)){
			$query=[
				'tabel'=>$this->master_tabel,
			];			
		}else{
			$query=[
				'tabel'=>$this->master_tabel,
				'where'=>[$this->id=>$this->iduser]
			];		
		}		
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
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
		
