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

class Sistem extends CI_Controller {
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
	private $master_tabel="trobelsistem"; //Mendefinisikan Nama Tabel
	private $id="trobelsistem_id";	//Menedefinisaikan Nama Id Tabel
	private $aksesadmin=['1','7','8'];
	private $filename='troubleshoot Sistem';
	private $default_url="Support/Sistem/"; //Mendefinisikan url controller
	private $default_view="Support/Sistem/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/errorsistem/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		$status=true;
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Support/Sistem/index.php";
			$menu_submenu=false;
		}
		if($this->leveluser!=1){
			$status=false;
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
			'edit'=>$status,
			'delete'=>$status,
			'download'=>true,
			'tambah'=>false,
			'import'=>false,
			'export'=>false,
			'qrcode'=>false,
			'hapussemua'=>true,
			'stats'=>$status,

		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		if($file->trobelsistem_image) unlink($this->path.$file->trobelsistem_image);
	}	
	public function index()
	{
		$global_set=array(
			'headline'=>'Troubleshoot Sistem/TERA',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);

		//CEK SUBMIT DATA
		if($this->input->post('trobelsistem_ticket')){
			//PROSES SIMPAN
			$data=array(
				'trobelsistem_ticket'=>$this->input->post('trobelsistem_ticket'),
				'trobelsistem_nama'=>$this->input->post('trobelsistem_nama'),
				'trobelsistem_unitid'=>$this->input->post('trobelsistem_unitid'),
				'trobelsistem_deskripsi'=>$this->input->post('trobelsistem_deskripsi'),
				'trobelsistem_iduser'=>$this->iduser,
				'trobelsistem_idstatus'=>1,
			);
			########################################################
			$file='trobelsistem_image';
			if($_FILES[$file]['name']){
				if($this->duwi->fileupload($this->path,$file)){
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
		if(in_array($this->leveluser, $this->aksesadmin)){
			$query='select a.*,b.user_nama,c.status_status,d.user_nama AS pic,e.unit_nama from trobelsistem a 
				JOIN user b ON b.user_id=a.trobelsistem_iduser
				JOIN status c ON c.status_id=a.trobelsistem_idstatus
				LEFT JOIN user d ON d.user_id=a.trobelsistem_idpic
				JOIN unit e ON e.unit_id=a.trobelsistem_unitid
				ORDER BY a.trobelsistem_id DESC';				
		}else{
			$query='select a.*,b.user_nama,c.status_status,d.user_nama AS pic,e.unit_nama from trobelsistem a 
				JOIN user b ON b.user_id=a.trobelsistem_iduser 
				JOIN status c ON c.status_id=a.trobelsistem_idstatus
				LEFT JOIN user d ON d.user_id=a.trobelsistem_idpic
				JOIN unit e ON e.unit_id=a.trobelsistem_unitid
				WHERE a.trobelsistem_iduser='.$this->iduser.'
				ORDER BY a.trobelsistem_id DESC';			
		}
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
		if($this->input->post('trobelsistem_ticket')){
			//PROSES SIMPAN
			if(in_array($this->leveluser, $this->aksesadmin)){
				$data=array(
					'trobelsistem_idstatus'=>$this->input->post('trobelsistem_idstatus'),
					'trobelsistem_catatan'=>$this->input->post('trobelsistem_catatan'),
					'trobelsistem_idpic'=>$this->iduser,
				);
			}else{
				$data=array(
					'trobelsistem_nama'=>$this->input->post('trobelsistem_nama'),
					'trobelsistem_unitid'=>$this->input->post('trobelsistem_unitid'),
					'trobelsistem_deskripsi'=>$this->input->post('trobelsistem_deskripsi'),
				);				
			}
			####################################################
			$file='trobelsistem_image';
			if($_FILES[$file]['name']){
				if($this->duwi->fileupload($this->path,$file)){
					$this->hapus_file($id);
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
			$unit=[
				'tabel'=>'unit',
			];				
			$q_kategori=[
				'tabel'=>'status',
			];				
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'status'=>$this->Crud->read($q_kategori)->result(),
				'unit'=>$this->Crud->read($unit)->result(),
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
		$param=base_convert(microtime(false), 7, 36);		
		$unit=[
			'tabel'=>'unit',
		];		
		$data=array(
			'unit'=>$this->Crud->read($unit)->result(),
			'notiket'=>$param,
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
			'headline'=>'Daftar Laporan Sistem',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		if(in_array($this->leveluser, $this->aksesadmin)){
			$query='select a.*,b.user_nama,c.status_status,d.user_nama AS pic,e.unit_nama from trobelsistem a 
				JOIN user b ON b.user_id=a.trobelsistem_iduser
				JOIN status c ON c.status_id=a.trobelsistem_idstatus
				LEFT JOIN user d ON d.user_id=a.trobelsistem_idpic
				JOIN unit e ON e.unit_id=a.trobelsistem_unitid
				ORDER BY a.trobelsistem_id DESC';				
		}else{
			$query='select a.*,b.user_nama,c.status_status,d.user_nama AS pic,e.unit_nama from trobelsistem a 
				JOIN user b ON b.user_id=a.trobelsistem_iduser 
				JOIN status c ON c.status_id=a.trobelsistem_idstatus
				LEFT JOIN user d ON d.user_id=a.trobelsistem_idpic
				JOIN unit e ON e.unit_id=a.trobelsistem_unitid
				WHERE a.trobelsistem_iduser='.$this->iduser.'
				ORDER BY a.trobelsistem_id DESC';			
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
	public function updatekirimemail($id){
		$data=[
			'trobelsistem_idstatus'=>5,
		];
		$query=array(
			'data'=>$this->security->xss_clean($data),
			'tabel'=>$this->master_tabel,
			'where'=>array($this->id=>$id),
		);
		return $this->Crud->update($query);		
	}
	public function send(){
		$id=$this->input->post('id');
		//$tujuankirim=['haryanto.duwi@gmail.com'];
		//$tujuankirim=['ari@terasolusi.com','adhi@terasolusi.com','ichsanfillarastyawan88@gmail.com','it@rsuii.co.id'];
		$tujuankirim=['ari@terasolusi.com','adhi@terasolusi.com'];
		$query='select a.*,b.user_nama,c.status_status,d.user_nama AS pic,e.unit_nama from trobelsistem a 
				JOIN user b ON b.user_id=a.trobelsistem_iduser
				JOIN status c ON c.status_id=a.trobelsistem_idstatus
				LEFT JOIN user d ON d.user_id=a.trobelsistem_idpic
				JOIN unit e ON e.unit_id=a.trobelsistem_unitid
				WHERE a.trobelsistem_id='.$id.'
				ORDER BY a.trobelsistem_id DESC';
		$data=$this->Crud->hardcode($query)->row();
		// print_r($data);
		// exit();			
		$this->load->library('mailer');
		// $emailseting=[
		// 	'penerima'=>$tujuankirim,
		// 	'subjek'=>$data->trobelsistem_nama,
		// 	'pesan'=>$data->trobelsistem_deskripsi,

		// ];
		$email_penerima = $tujuankirim;
		$subjek = $data->trobelsistem_nama;
		$pesan = $data->trobelsistem_deskripsi;
		$content = 'conten';
		//$attachment = false;
		$attachment =$this->path.$data->trobelsistem_image;

		// print_r($attachment);
		// exit();
		//$content = $this->load->view('content', array('pesan'=>$pesan), true); // Ambil isi file content.php dan masukan ke variabel $content
		$sendmail = array(
			'email_penerima'=>$email_penerima,
			'subjek'=>$subjek,
			'content'=>$pesan,
			'attachment'=>$attachment
		);

		if(empty($attachment)){ // Jika tanpa attachment
			$send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
			//echo 'email terkirim';
		}else{ // Jika dengan attachment
			$send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
		}
		if($send){
			//$this->session->set_flashdata('success','update data berhasil');
			$dt['msg']='Kirim email berhasil';
		}else{
			//$this->session->set_flashdata('error','update data gagal');
			$dt['msg']='Kirim email gagal';
		}
		$this->updatekirimemail($id);
		return $this->output->set_output(json_encode($dt));
	}
}
		
