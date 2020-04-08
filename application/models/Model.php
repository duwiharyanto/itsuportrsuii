<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	//MEMBACA DATA
	public function read($data){
		if(isset($data['select'])){
			$this->db->select($data['select']);
			//SELECT nama kolom,.dst
		}
		if(isset($data['where'])){
			foreach($data['where'] AS $where){
				$this->db->where($where);
			}
			//WHERE nama=... AND WHERE ... N
		}
		if(isset($data['like'])){
			foreach($data['like'] AS $like){
				$this->db->like($like);
			}
			//WHERE nama=... AND WHERE ... N
		}
		if(isset($data['or_where'])){
			// $this->db->where($data['or_where']);
			foreach($data['or_where'] AS $orwhere){
				$this->db->or_where($orwhere);
			}
		}
		if(isset($data['limit'])){
			$this->db->limit($data['limit']);
		}
		if(isset($data['order'])){
			$this->db->order_by($data['order']['kolom'],$data['order']['orderby']);
		}
		if(isset($data['group_by'])){
			$this->db->group_by($data['group_by']);
		}
		return $this->db->get($data['tabel']);
	}
	public function insert($data){
		if($this->db->insert($data['tabel'],$data['data'])){
			return true;
		}else{
			$error=$this->db->error();
			return $error['message'];
		}
	}
	public function insert_returnid($data){
		if($this->db->insert($data['tabel'],$data['data'])){
			return $this->db->insert_id();
		}else{
			$error=$this->db->error();
			return $error['message'];
		}
	}
  	public function insert_multiple($data){
		if( $this->db->insert_batch($data['tabel'], $data['data'])){
			return true;
		}else{
			$error=$this->db->error();
			return $error['message'];
		}
  	}
	public function delete($data){
		$this->db->where($data['where']); //ID PRIMARY KEY
		if($this->db->delete($data['tabel'])){
			return true;
		}else{
			$error=$this->db->error();
			return $error['message'];
		}
	}
	public function update($data){
		if(isset($data['where'])){
			$this->db->where($data['where']);
		}
		if($this->db->update($data['tabel'],$data['data'])){
			return true;
		}else{
			$error=$this->db->error();
			return $error['message'];
		}
	}
	public function join($data){
		$this->db->select($data['select']);
		$this->db->from($data['tabel']);
		foreach ($data['join'] as $row) {
			$this->db->join($row['tabel'],$row['ON'],$row['jenis']);
		}
		if(isset($data['order'])){
			$this->db->order_by($data['order']['kolom'],$data['order']['orderby']);
		}
		if(isset($data['where'])){
			foreach($data['where'] AS $where){
				$this->db->where($where);
			}
		}
		if(isset($data['limit'])){
			$this->db->limit($data['limit']);
		}
		if(isset($data['like'])){
			foreach($data['like'] AS $like){
				$this->db->like($like);
			}
		}
		return $this->db->get();
	}
	public function count($tabel){
		return $this->db->count_all($tabel);
	}
	public function hardcode($data){
		return $this->db->query($data);
	}
}
?>
