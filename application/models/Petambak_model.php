<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petambak_model extends CI_Model {
	public function select_all_petambak() {
		$sql = "SELECT * FROM petambak";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT petambak.id AS id, petambak.nama AS petambak, petambak.no_hp AS no_hp FROM petambak ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($alamat) {
		$sql = "SELECT petambak.id AS id_petambak, petambak.nama AS nama_petambak, petambak.no_hp AS no_hp, petambak.register, petambak.alamat FROM petambak WHERE petambak.alamat = '{$alamat}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_alamat($alamat) {
		$sql = "SELECT petambak.id AS id_petambak, petambak.nama AS nama_petambak, petambak.no_hp AS no_hp, petambak.register, petambak.alamat FROM petambak WHERE petambak.alamat like '{$alamat}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
		// Fetch users
	public function pilih_alamat($alamat=""){

	    	// Fetch users
	        $this->db->select('*');
	        $this->db->where("alamat = '$alamat' ");
	        $fetched_records = $this->db->get('petambak');
	        $users = $fetched_records->result_array();

	        // Initialize Array with fetched data
	         
				if($users){
					foreach($users as $user){
					            $data = array(
					            	"id"=>$user['id'], 
					            	"nama"=>$user['nama'],
						           'register' => $user['register'],
						           'alamat' => $user['alamat']);
					        }

				}else{
					$data = [ 'alamat' => $alamat ];
				}
				// print_r($data);
	        return $data;
	    }

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM petambak WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM petambak WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE petambak SET nama='" .$data['nama'] ."', no_hp='" .$data['no_hp'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM petambak WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO petambak VALUES('{$id}','" .$data['nama'] ."','" .$data['no_hp'] ."'," .$data['kota'] ."," .$data['jk'] ."," .$data['posisi'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('petambak', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('petambak');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('petambak');

		return $data->num_rows();
	}
}

/* End of file M_petambak.php */
/* Location: ./application/models/M_petambak.php */