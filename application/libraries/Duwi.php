<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Duwi {
	// public function __construct(){
	// 	parent::__construct();
	// 	$this->load->model('Model','Crud');
	// }
    private $_CI;
    public function __construct()
    {
        $this->_CI = & get_instance();
        $this->_CI->load->model('Model','Crud');
    }

    public function atributsistem(){
    	$query=[
    		'tabel'=>'setting',
    		'limit'=>1,
    	];
    	return $this->_CI->Crud->read($query)->row();
    }	
	public function notifiaksi($param){
		if($param==1){
			$this->session->set_flashdata('success','proses berhasil');
		}else{
			$this->session->set_flashdata('error',$param);
		}		
	}
	public function ujicobalib($param){
		echo "<pre>";
		print_r($param);
	}
	public function listakses($levelakses){
		$url=$this->_CI->uri->segment(1).'/'.$this->_CI->uri->segment(2);
		$aksesmenu=false;
		$menu=array(
			'tabel'=>'menu',
			'where'=>array(array('menu_link'=>$url)),
			// 'order'=>array('kolom'=>'menu_urutan','orderby'=>'ASC'),
		);
		$_aksesmenu=$this->_CI->Crud->read($menu)->result();	
		foreach ($_aksesmenu as $index => $var) {						
			$level=explode(',', $var->menu_akses_level);
			foreach ($level as $_userakses) {			
				if($levelakses==$_userakses){
					$aksesmenu=true;
					//return $aksesmenu;	
				}
			}
		}
		if(!$aksesmenu){
			redirect(site_url('error'));
		}			
		//return $aksesmenu;
	}	
	public function cekadmin(){
		if($this->_CI->session->userdata('user_level')!=1 && $this->_CI->session->userdata('user_login')!=true){
			redirect(site_url());
		}
	}
	public function ceklogin(){
		if($this->_CI->session->userdata('user_level')==1 && $this->_CI->session->userdata('user_login')==true){
			redirect(site_url('dashboard/dashboard'));
		}elseif($this->_CI->session->userdata('user_level')!=1 && $this->_CI->session->userdata('user_login')==true){
			redirect(site_url($this->_CI->session->userdata('user_dashboard')));
		}
	}
	public function nomorurut($param){
		//01.004/SMA-SM/V/2018
		//$nourut=$this->db->query("SELECT RIGHT(notest,4) AS kode from jual ORDER BY kode DESC LIMIT 1");
		$nourut=$param['nomor'];
		if($nourut->num_rows()<>0){
			$nourut=$nourut->row();
			$nourut=intval($nourut->kode)+1;
		}else{
			$nourut=1;
		}
		$padnourut=str_pad($nourut,3,'0',STR_PAD_LEFT);
		$tahun=date('Y');
		$kodependaftaran='D'.$param['kodedokter'].substr($tahun, 2).$padnourut;
		return $kodependaftaran;
	}	
	public function bulanromawi($param){
		switch ($param) {
			case '1':
				$bulan='I';
				break;
			case '2':
				$bulan='II';
				break;	
			case '3':
				$bulan='III';
				break;
			case '4':
				$bulan='IV';
				break;
			case '5':
				$bulan='V';
				break;	
			case '6':
				$bulan='VI';
				break;
			case '7':
				$bulan='VII';
				break;
			case '8':
				$bulan='VIII';
				break;
			case '9':
				$bulan='IX';
				break;
			case '10':
				$bulan='X';
				break;
			case '11':
				$bulan='XI';
				break;
			case '12':
				$bulan='XII';
				break;																													
			default:
				$bulan='_';
				break;
		}
		return $bulan;		
	}
	public function bulannama($param){
		switch ($param) {
			case '1':
				$bulan='januari';
				break;
			case '2':
				$bulan='fabruari';
				break;	
			case '3':
				$bulan='maret';
				break;
			case '4':
				$bulan='april';
				break;
			case '5':
				$bulan='mei';
				break;	
			case '6':
				$bulan='juni';
				break;
			case '7':
				$bulan='juli';
				break;
			case '8':
				$bulan='agustus';
				break;
			case '9':
				$bulan='september';
				break;
			case '10':
				$bulan='oktober';
				break;
			case '11':
				$bulan='november';
				break;
			case '12':
				$bulan='desember';
				break;						
			default:
				$bulan='_';
				break;
		}
		return $bulan;		
	}	
	public function nomorskm($param){
		//01.004/SMA-SM/V/2018
		//$nourut=$this->db->query("SELECT RIGHT(notest,4) AS kode from jual ORDER BY kode DESC LIMIT 1");
		$bulan=$this->bulanromawi($param['bulan']);
		$delimiter='/';
		if($param['nomor']<>0){
			$nourut=intval($param['nomor'])+1;
		}else{
			$nourut=1;
		}
		$padnourut=str_pad($nourut,4,'0',STR_PAD_LEFT);
		$nomorsurat=$padnourut.$delimiter.$param['kodeberkas'].$delimiter.$param['instansi'].$delimiter.$bulan.$delimiter.$param['tahun'];
		return $nomorsurat;
	}
	public function nomorsurat($param){
		//01.004/SMA-SM/V/2018
		//$nourut=$this->db->query("SELECT RIGHT(notest,4) AS kode from jual ORDER BY kode DESC LIMIT 1");
		$bulan=$this->bulanromawi($param['bulan']);
		$delimiter='/';
		if($param['nomor']<>0){
			$nourut=intval($param['nomor'])+1;
		}else{
			$nourut=1;
		}
		$padnourut=str_pad($nourut,3,'0',STR_PAD_LEFT);
		$nomorsurat=$param['kodeberkas'].'.'.$padnourut.$delimiter.$param['instansi'].$delimiter.$bulan.$delimiter.$param['tahun'];
		return $nomorsurat;
	}		
	public function fileupload($path,$file){
		$config=array(
			'upload_path'=>$path,
			'allowed_types'=>'xlsx|pdf',
			'max_size'=>5000, //5MN
			'encrypt_name'=>true, //ENCTYPT
		);
		$this->_CI->load->library('upload',$config);
		return $this->_CI->upload->do_upload($file);
	}
	public function gambarupload($path,$file){
		$config=array(
			'upload_path'=>$path,
			'allowed_types'=>'jpg|jpeg|png',
			'max_size'=>2000, //5MN
			'encrypt_name'=>true, //ENCTYPT
		);
		$this->_CI->load->library('upload',$config);
		return $this->_CI->upload->do_upload($file);
	}	
	public function downloadfile($path,$file){
		$link=$path.$file;
		if(file_exists($link)){
			$url=file_get_contents($link);
			force_download($file,$url);
		}else{
			$this->_CI->session->set_flashdata('error','File tidak ditemukan');
		}						
	}
	public function matauang($param){
		$level1=str_replace('Rp ', '', $param);
		$level2=str_replace('.', '', $level1);
		return $level2;
	}
	public function dumpdata($data){
		echo "<pre>";
		print_r($data);
	}
	public function menu($levelakses){		
		$main_menu=array(
			'tabel'=>'menu',
			'where'=>array(array('menu_is_mainmenu'=>'0'),array('menu_status'=>'1'),array('menu_akses_level'=>$levelakses)),
			'order'=>array('kolom'=>'menu_urutan','orderby'=>'ASC'),
		);
		$menu_akhir=array();
		$menu=$this->_CI->Crud->read($main_menu)->result();
		if(count($menu)>0){
			foreach ($menu as $index => $row) {
				$menu_akhir[$index]=$row;
				$sub_menu=array(
					'tabel'=>'menu',
					'where'=>array('menu_is_mainmenu '=>$row->menu_id),
				);
				$submenu=$this->_CI->Crud->read($sub_menu)->result();
				if(count($submenu)>0){
					$menu_akhir[$index]->status=1;
					//$submenu=array();
					$menu_akhir[$index]->submenu=$submenu;
				}else{
					$menu_akhir[$index]->status=0;
					$menu_akhir[$index]->submenu=0;
				}				
			}
		}
		return $menu_akhir;		
	}
	public function prosescetak($data){
		if(isset($data['kertas'])){
			$kertas=$data['kertas'];
		}else{
			$kertas='A4';
		}
		$nama_dokumen=$data['judul']; //Beri nama file PDF hasil.
		// require_once('./assets/mPDF/mpdf.php');
		// require_once('./assets/mpdf7/src/Mpdf.php');
		require_once('./plugins/mpdf7/vendor/autoload.php');
		$mpdf = new \Mpdf\Mpdf([
		    'mode' => 'utf-8',
		    'margin_right'=>'20',
		    'margin_left'=>'20',
		    'margin_bottom'=>'20',
		    'margin_top'=>'20',
		    // 'format' => [190, 236],
		    'format' => $kertas,
		    //'orientation' => 'P'
		]);
		//$mpdf->SetTitle('Cetak Laporan');		
		// $mpdf->WriteHTML('<h1>Hello world!</h1>');
		// $mpdf->Output();
		//$mpdf= new \Mpdf\Mpdf('c','A4-Pa','',0,20,20,20,20);	
		
		// $mpdf->SetHTMLHeader('
		// <div style="text-align: left; font-weight: bold;">
		//     <img src="./assets/img/logohead.png" width="60px" height="60px">'.$nama_dokumen.'
		// </div>');
		$mpdf->SetHTMLFooter('
		<table width="100%">
		    <tr>
		        <td width="33%">{DATE j-m-Y}</td>
		        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right;">'.$nama_dokumen.'</td>
		    </tr>
		</table>');		
		$mpdf->WriteHTML($data['view']);
		$mpdf->Output($nama_dokumen.".pdf",'I');		
	}
	public function qrcode($param){
		$dir= "./barcode/";
		include "./assets/phpqrcode/qrlib.php"; 
		$tempdir = $dir;
		#parameter inputan
		$isi_teks = $param;
		$namafile = $param.'.png';
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
		$padding = 0;
		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
		$path="barcode/".$namafile;
		return base_url($path);		
	}
	public function generateqrcode($param){
		include "./plugins/phpqrcode/qrlib.php"; 
		$tempdir = $param['path'];
		#parameter inputan
		$isi_teks = $param['isi'];
		$namafile = $param['namafile'].'.png';
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 10; //batasan 1 paling kecil, 10 paling besar
		$padding = 0;
		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
		$path=$param['path'].$namafile;
		return base_url($path);		
	}	
	public function log($aksi){
		$data=[
			'log_aksi'=>$aksi['aksi'],
			'log_iduser'=>$aksi['iduser'],
			'log_level'=>$aksi['loglevel'],
		];
		$q=[
			'tabel'=>'log',
			'data'=>$data,
		];
		$res=$this->_CI->Crud->insert($q);
		return $res;
	}

	public function menu_backend($levelakses){
		$akses_menu=array(
			'tabel'=>'menu',
			'where'=>array(array('menu_is_mainmenu'=>'0'),array('menu_status'=>'1'),array('menu_akses'=>'1')),
			'order'=>array('kolom'=>'menu_urutan','orderby'=>'ASC'),
		);
		$_aksesmenu=$this->_CI->Crud->read($akses_menu)->result();	
		$menu_akhir=array();
		foreach ($_aksesmenu as $index => $var) {						
			$_akseslevel=explode(',', $var->menu_akses_level);
			foreach ($_akseslevel as $_userakses) {			
				if($levelakses==$_userakses){
					$menu_akhir[$index]=$var;
					$menu_akhir[$index]->status=0;
					$menu_akhir[$index]->submenu=0;						
					if($_aksesmenu){
						$sub_menu=array(
							'tabel'=>'menu',
							'where'=>array(array('menu_is_mainmenu'=>$var->menu_id),array('menu_status'=>'1')),
							'order'=>array('kolom'=>'menu_urutan','orderby'=>'ASC'),
						);
						$submenu=$this->_CI->Crud->read($sub_menu)->result();
						if(count($submenu)>0){
							$menu_akhirsubmenu=array();
							foreach ($submenu as $indexsubmenu => $varsubmenu) {
								$_aksessubmenulevel=explode(',', $varsubmenu->menu_akses_level);
								foreach ($_aksessubmenulevel as $_useraksessubmenu) {
									//echo $_useraksessubmenu.' = '.$levelakses.'<br>';	
									if($_useraksessubmenu==$levelakses){
										$menu_akhirsubmenu[$indexsubmenu]=$varsubmenu;	
									}
								}							
							}
							$menu_akhir[$index]->status=1;
							$menu_akhir[$index]->submenu=$menu_akhirsubmenu;
						}
						// else{
						// 	$menu_akhir[$index]->status=0;
						// 	$menu_akhir[$index]->submenu=0;											
						// }						
					}
					//return 		
				}
			}
		}
		return $menu_akhir;	
	}
}
