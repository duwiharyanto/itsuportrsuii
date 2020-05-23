<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include APPPATH.'controllers/Core.php';
	//class Login extends Core
	class Login extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('Model','Crud');
			$this->load->library('Duwi');			
		}
		private $master_tabel='user';
		private $id='user_id';
		private $url='Login';

		public function index(){
			$this->duwi->ceklogin();
			$data=[
				'url'=>'login',
				'onsubmit'=>'login/proseslogin',
				'onsignup'=>'login/signup',
			];
			
			$this->load->view('_template/_login',$data);
		}
		// public function signup(){
		// 	$data=[
		// 		'user_username'=>$this->input->post('user_username'),
		// 		'user_password'=>md5($this->input->post('user_password')),
		// 		'user_email'=>$this->input->post('user_email'),
		// 		'user_nama'=>$this->input->post('user_nama'),
		// 		'user_level'=>'',
		// 	];
		// 	$query=array(
		// 		'data'=>his->security->xss_clean($data),
		// 		'tabel'=>$this->master_tabel,
		// 	);
		// 	$insert=$this->Crud->insert($query);
		// 	if($insert){
		// 		$this->session->set_flashdata('success','pendaftaran berhasil, silahkan menunggu verifikasi admin');	
		// 		$dt['success']='update data berhasil';
		// 	}else{
		// 		$this->session->set_flashdata('error','pendaftaran gagal');	
		// 		$dt['error']='input data error';
		// 	}
		// 	return $this->output->set_output(json_encode($dt));					
		// }		
		public function proseslogin(){
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$queryuser=array(
				'tabel'=>$this->master_tabel,
				'where'=>array(array('user_username'=>$username)),
				'limit'=>1,
			);
			$cek_user=$this->Crud->read($queryuser);
			if($cek_user->num_rows()==1){
			//if(($username=='admin') && ($password=='rsuii')){
				$query=array(
					'select'=>'a.*, b.level_dashboard,b.level_nama',
					'tabel'=>'user a',
					'join'=>array(array('tabel'=>'level b','ON'=>'a.user_level=b.level_id','jenis'=>'INNER')),
					'where'=>array(array('user_username'=>$username),array('user_password'=>$password)),
					'limit'=>1,
				);				
				$cek_pass=$this->Crud->join($query);
				if($cek_pass->num_rows()==1){
					$user=$cek_pass->row();
					$atributsistem=$this->duwi->atributsistem();
					$dt_session=array(
						'user_id'=>$user->user_id,
						'user_username'=>$user->user_username,
						'user_nama'=>$user->user_nama,
						'user_level'=>$user->user_level,
						'user_namalevel'=>$user->level_nama,
						'user_email'=>$user->user_email,
						'user_foto'=>$user->user_foto,
						'user_dashboard'=>$user->level_dashboard,
						'user_terdaftar'=>date('d-m-Y',strtotime($user->user_terdaftar)),
						'user_login'=>true,
						'atributsistem_namasistem'=>$atributsistem->setting_namasistem,
						'atributsistem_logo'=>$atributsistem->setting_logo,
					);
					$logdata=[
						'aksi'=>'login',
						'iduser'=>$dt_session['user_id'],
						'loglevel'=>1,
					];				
					if(!$this->duwi->log($logdata)){
						$this->session->set_flashdata('error','log tidak tercatat');
						redirect(base_url('Login'));					
					}
					$this->session->set_userdata($dt_session);
					$this->session->set_flashdata('success','selamat datang '.$user->user_nama);
					$dashboard = $dt_session['user_dashboard'];
					if($dashboard){
						redirect(site_url($dashboard));
					}else{
						 redirect(site_url("notfound"));
					}									
				}
				else{
					$user=$cek_user->row();
					$logdata=[
						'aksi'=>'password salah',
						'iduser'=>$user->user_id,
						'loglevel'=>3,
					];
					if(!$this->duwi->log($logdata)){
						$this->session->set_flashdata('error','log tidak tercatat');
						redirect(base_url('Login'));					
					}								
					$this->session->set_flashdata('error','password tidak ditemukan');
					redirect(base_url('Login'));
				}
				$this->session->set_userdata('login',true);
				redirect(site_url('Welcome'));
			}else{				
				$this->session->set_flashdata('error','username & password tidak ditemukan');
				redirect(base_url('Login'));
			}
		}
		function logout(){
			$logdata=[
				'aksi'=>'logout',
				'iduser'=>$this->session->userdata('user_id'),
				'loglevel'=>3,
			];
			if(!$this->duwi->log($logdata)){
				$this->session->set_flashdata('error','log tidak tercatat');
				redirect(base_url('Login'));					
			}			
			$this->session->sess_destroy();
			redirect(base_url('Login'));
		}	
	
	}
?>