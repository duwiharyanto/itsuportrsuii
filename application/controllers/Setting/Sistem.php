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
		$this->duwi->listakses($this->session->userdata('user_level'));
		$this->duwi->cekadmin();
	}
	//VARIABEL
	private $master_tabel="setting"; //Mendefinisikan Nama Tabel
	private $id="setting_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="Setting/Sistem/"; //Mendefinisikan url controller
	private $default_view="Setting/Sistem/"; //Mendefinisiakn defaul view
	private $view="_template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/sistem/';
	private $pathformatimport='./template/';

	private function global_set($data){
		//OVERWRITE UNTUK MULTI INDEX VIEW
		if(isset($data['overwriteview'])){
			$overwriteview=$data['overwriteview'];		
			$menu_submenu=$data['menu_submenu'];
		}else{
			$overwriteview="views/Setting/Sistem/index.php"; //EDIT 
			$menu_submenu='sistem';
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
		if($this->path.$file->setting_logo) unlink($this->path.$file->setting_logo);
	}

	public function index()
	{
		$global_set=array(
			'headline'=>'Setting Sistem',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		//CEK SUBMIT DATA
		if($this->input->post('setting_namasistem')){
			//PROSES SIMPAN
			$data=array(
				'setting_namasistem'=>$this->input->post('setting_namasistem'),
				'setting_namatempat'=>$this->input->post('setting_namatempat'),
				'setting_alamat'=>$this->input->post('setting_alamat'),
				'setting_email'=>$this->input->post('setting_email'),
				'setting_notlp'=>$this->input->post('setting_notlp'),
				'setting_namapemilik'=>$this->input->post('setting_namapemilik'),
			);
			########################################################
			$file='setting_logo';
			if($_FILES[$file]['name']){
				if($this->duwi->gambarupload($this->path,$file)){
					$this->hapus_file($id);				
					$fileupload=$this->upload->data('file_name');
					$data[$file]=$fileupload;
					$updateatributsistem=[
						'atributsistem_logo'=>$data['setting_logo'],
					];
				}else{
					$dt['error']=$this->upload->display_errors();
					return $this->output->set_output(json_encode($dt));
					//exit();
				}
			}
			if($id){
				$query=array(
					'data'=>$this->security->xss_clean($data),
					'tabel'=>$this->master_tabel,
					'where'=>array('setting_id'=>$id),
				);
				$result=$this->Crud->update($query);					
			}else{
				$query=array(
					'data'=>$this->security->xss_clean($data),
					'tabel'=>$this->master_tabel,
				);
				$result=$this->Crud->insert($query);
			}
			if($result){
				// $this->session->set_flashdata('success','simpan berhasil');	
				$updateatributsistem['atributsistem_namasistem']=$data['setting_namasistem'];
				$this->session->set_userdata($updateatributsistem);
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
	public function importuser(){
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
					'user_nama'=>$sheetData[$i]['1'],
					'user_email'=>$sheetData[$i]['2'],
					'user_username'=>$sheetData[$i]['3'],
					'user_password'=>md5($sheetData[$i]['4']),
					'user_level'=>$this->input->post('user_level'),
					'user_status'=>1,	    		
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
	public function tabel(){
		$global_set=array(
			'headline'=>'Data',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);		
		//PROSES TAMPIL DATA
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
		);
		//$this->load->view($this->default_view.'tabel',$data);		
		redirect(site_url($this->default_url.'add'));
	}
	public function edit(){
		$global_set=array(
			'headline'=>'edit data',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		if($this->input->post('setting_namasistem')){
			//PROSES SIMPAN
			$data=array(
				'setting_namasistem'=>$this->input->post('setting_namasistem'),
				'setting_namatempat'=>$this->input->post('setting_namatempat'),
				'setting_alamat'=>$this->input->post('setting_alamat'),
				'setting_email'=>$this->input->post('setting_email'),
				'setting_notlp'=>$this->input->post('setting_notlp'),
				'setting_namapemilik'=>$this->input->post('setting_namapemilik'),
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
			$q_level=[
				'tabel'=>'level',
			];
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'level'=>$this->Crud->read($q_level)->result(),
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
		$q_level=[
			'tabel'=>'level',
		];
		$q_data=[
			'tabel'=>'setting',
		];
		$data=array(
			'data'=>$this->Crud->read($q_data)->row(),
			'level'=>$this->Crud->read($q_level)->result(),
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
	public function profil()
	{
		$id=$this->session->userdata('user_id');
		if($id){
			$global_set=array(
				'headline'=>'Profil user',
				'url'=>$this->default_url,
				'overwriteview'=>'views/user/admin/profil.php',
				'menu_submenu'=>'profile',
			);
			$global=$this->global_set($global_set);
			//CEK SUBMIT DATA AJAX
			if($this->input->post('reg_nama')){	
				//PROSES SIMPAN
				$data=array(
				'reg_nama'=>$this->input->post('reg_nama'),
				'reg_notlp'=>$this->input->post('reg_notlp'),
				'reg_email'=>$this->input->post('reg_email'),
				'reg_alamat'=>$this->input->post('reg_alamat'),
				);
				// if($this->input->post('user_password')){
				// 	$data['user_password']=md5($this->input->post('user_password'));			
				// }
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
				//return $this->output->set_output(json_encode($dt));	
				redirect(site_url($this->default_url.'profil'));	
			}
			$query=array(
					'tabel'=>$this->master_tabel,
					'where'=>array(array($this->id=>$id))
				);
				$q_level=[
					'tabel'=>'level',
				];
				$data=array(
					'data'=>$this->Crud->read($query)->row(),
					'level'=>$this->Crud->read($q_level)->result(),
					'global'=>$global,
					'menu'=>$this->menu_backend($this->session->userdata('user_level')),
				);
				$this->load->view($this->view,$data);				
		}else{
			redirect(site_url('Notfound'));
		}
	}
	public function cetak(){
		$global_set=array(
			'headline'=>'Daftar Registrasi',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);	
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);			
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
			'deskripsi'=>'dicetak dari sistem tanggal '.date('d-m-Y'), 
		);
		$view=$this->load->view($this->default_view.'cetak',$data,true);
		$cetak=[
			'judul'=>'Daftar Registrasi',
			'view'=>$view,
			'kertas'=>'A4-l',
		];
		$this->duwi->prosescetak($cetak);
	}	
}
