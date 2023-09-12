<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembagian_model extends CI_Model {

		public function select_all_benur_kode($jenis){
		$this->db->select("*");
		$this->db->where('jnsBenur', $jenis);
		$this->db->from('benur_kode');
		$this->db->order_by('tanggal', 'DESC');
		$data = $this->db->get();
	//	print_r($this->db->last_query());
		return $data->result();
		
	}

		public function select_kode($id){
		$this->db->select("*");
		$this->db->where('id', $id);
		$this->db->from('benur_kode');
		$data = $this->db->get();
	//	print_r($this->db->last_query());
		return $data->row();
		
	}


	public function select_all_benur($jenis,  $blok, $idkode= NUll, $data){
		$this->db->select('benur_data.*, agen.nama AS nama_agen, benur_kode.kode as kode_benur');
		$this->db->from('benur_data');
		$this->db->join('petambak','benur_data.alamat = petambak.alamat','LEFT');      
		$this->db->join('agen','benur_data.idAgen = agen.id','LEFT');
		$this->db->join('benur_kode','benur_data.kode = benur_kode.id','LEFT');
		$this->db->where('status', $data);
		if($blok) $this->db->like('benur_data.alamat', $blok,  'after');
		$this->db->where('benur_data.jnsBenur', $jenis);
		$this->db->where('benur_data.kode', $idkode);
		$this->db->order_by('benur_data.alamat', 'ASC');
		$data = $this->db->get();
		 // print_r($this->db->last_query()); exit();
		return $data->result();
		
	}

	public function sum($jenis,  $idkode='', $data){
		$this->db->select_sum('jmlBenurKirim');
		$this->db->where('status', $data);
		$this->db->where('jnsBenur', $jenis);
		$this->db->where('benur_data.kode', $idkode);
		$data = $this->db->get('benur_data');
		// print_r($this->db->last_query());
		return $data->row();
		
	}

	public function prosesbyid($data) {
		if ($data['status'] == 'proses')
		{

			$data = array(
					'id' => $data['id'],
					'status'=> $data['status'],
					'kode'=> (isset($data['kode']))?$data['kode']:NUll,
					'jmlBenurKirim'=> NUll,
					'jml_kantong_kirim'=> NUll,
					'realisasi_jml_benur'=>NUll,
					'realisasi_jml_kantong'=>NUll,
					'realisasi_biaya' => NUll,
					'piutang' => Null,
					'hutang' => Null,
			);
		}elseif (($data['kode'])){

			$kantong = $this->select_kode($data['kode']);
			$data_awal = $this->select_by_id( $data['id']);
			$kantong_baru = floor($data_awal->jmlBenur / $kantong->perkantong);
			$jlm_baru		=  $kantong_baru * $kantong->perkantong;
			$realisasi_biaya = $jlm_baru* $data_awal->harga;

			$data = array(
					'id' => $data['id'],
					'status'=> $data['status'],
					'kode'=> (isset($data['kode']))?$data['kode']:NUll,
					'perkantong'=> $kantong->perkantong,
					'jml_kantong_kirim'=> $kantong_baru,
					'jmlBenurKirim' => $jlm_baru,
					'realisasi_jml_kantong'=> $kantong_baru,
					'realisasi_jml_benur' => $jlm_baru,
					'realisasi_biaya' => $realisasi_biaya
			);
			$selisih =  $data_awal->dp - $realisasi_biaya;

			if ( $selisih < 0){
				$data['piutang'] = $selisih*-1;
				$data['hutang'] = 0;
			}else{
				$data['piutang'] =0;
				$data['hutang'] = $selisih;
			}
		}else{
			$data_awal = $this->select_by_id($data['id']);

			$data = array(
					'id' => $data['id'],
					'status'=> $data['status'],
					'kode'=> (isset($data['kode']))?$data['kode']:NUll,
					'jmlBenurKirim'=> $data_awal->jmlBenur,
					'jml_kantong_kirim'=> $data_awal->jmlKantong,
					'realisasi_jml_benur'=> $data_awal->jmlBenur,
					'realisasi_jml_kantong'=>$data_awal->jmlKantong,
					'realisasi_biaya' => $data_awal->jmlBenur * $data_awal->harga,
			);

			$selisih =  $data_awal->dp - ($data_awal->jmlBenur * $data_awal->harga);

			if ( $selisih < 0){
				$data['piutang'] = $selisih*-1;
				$data['hutang'] = 0;
			}else{
				$data['piutang'] =0;
				$data['hutang'] = $selisih;
			}
		}
		
		$this->db->where('id', $data['id']);
		$this->db->update('benur_data', $data);
		//print_r($this->db->last_query());
		return $this->db->affected_rows();
	}

	public function add_kode($data) {
		// print_r($data); die();
		$data_benur =  $data;
		$data = array(
		        'kode' 				=> $data['kode'],
		        'pl'				=> $data['pl'],
		        'box'				=> $data['box'],
		        'perbox'			=> $data['perbox'],
		        'total_kantong'		=> $data['total_kantong'],
		        'jnsBenur' 			=> kode_benur($data['benur']),
		        'perkantong' 		=> only_numbers($data['perkantong_kirim']),
		        'stok_tersedia' 	=> only_numbers($data['stok']),
		        'stok_kebutuhan'	=> only_numbers($data['kebutuhan']),
		        'selisih'			=> only_numbers($data['selisih']),
		        'selisih_kantong'	=> ($data['selisihKantong']),
		        'tanggal'			=> date("Y-m-d", strtotime($data['tanggal'])),
		);

		$this->db->insert('benur_kode', $data);
		$id = $this->db->insert_id();
		$hasil[] = $this->update_kode_tambak($data_benur, $id);	
		$hasil[] = $this->db->affected_rows();	
		$this->session->set_flashdata('id', $id);
		
		return $id;
	}

	public function update_kode($data) {
		$hasil[] = $this->update_kode_tambak($data, $data['id']);
			$data = array(
			  	'id' 				=> $data['id'],
		        'kode' 				=> $data['kode'],
		        'pl'				=> $data['pl'],
		        'box'				=> $data['box'],
		        'perbox'			=> $data['perbox'],
		        'total_kantong'		=> $data['total_kantong'],
		        'jnsBenur' 			=> kode_benur($data['benur']),
		        'perkantong' 		=> only_numbers($data['perkantong_kirim']),
		        'stok_tersedia' 	=> only_numbers($data['stok']),
		        'stok_kebutuhan'	=> only_numbers($data['kebutuhan']),
		        'selisih'			=> only_numbers($data['selisih']),
		        'selisih_kantong'	=> ($data['selisihKantong']),
		        'tanggal'			=> date("Y-m-d", strtotime($data['tanggal'])),
		);

		$this->db->where('id', $data['id']);
		$this->db->update('benur_kode', $data);
		$hasil[] = $this->db->affected_rows();
		return $hasil;
	}
	public function update_kode_tambak($data, $key) {
		foreach ($data['id_benur'] as $id) {
			$datas = array(
				'kode' 	=> $key,
				'tglTebar' => date("Y-m-d", strtotime($data['tanggal'])),
			);
			$this->db->update('benur_data', $datas, array('id' => $id));
			$hasil[] = $this->db->affected_rows();
		}
		return $hasil;
	}


	public function update_benur($data) {
		$data = array(
				'id'=> $data['id'],
		        'alamat' 	=> $data['alamat'],
		        'register' 	=> $data['register'],
		        'nama' 	=> $data['nama'],
		        'namaPendaftar'=> $data['namaPendaftar'],
		        'idAgen'=> $data['idAgen'],
		        'noHp'=> $data['noHp'],
		        'jnsBenur'=> $data['jnsBenur'],
		        'harga'=> only_numbers($data['harga']),
		        'perkantong'=> only_numbers($data['perkantong']),
		        'jmlBenurKirim'=> only_numbers($data['jmlBenurKirim']),
		        'jmlKantong'=> only_numbers($data['jmlKantong']),
		        'tglSchedule'=> date("Y-m-d", strtotime($data['tglSchedule'])),
		        'biaya'=> only_numbers($data['biaya']),
		        'dp' => only_numbers($data['dp'])
		);

		$this->db->where('id', $data['id']);
		$this->db->update('benur_data', $data);
		//print_r($this->db->last_query());
		// return $this->db->affected_rows();
		return $data['id'];
		
	}

	public function update_kantong($id, $kantong){
		$data_awal = $this->select_by_id($id);

		$data = array(
			'jmlBenurKirim' =>  $data_awal->jmlBenurKirim + ($data_awal->perkantong*$kantong),
			'jmlKantong'=> $data_awal->jmlKantong + $kantong,
			'realisasi_jml_benur' =>  $data_awal->jmlBenurKirim + ($data_awal->perkantong*$kantong),
			'realisasi_jml_kantong'=> $data_awal->jmlKantong + $kantong,
			'realisasi_biaya' => ($data_awal->jmlBenurKirim + ($data_awal->perkantong*$kantong)) * $data_awal->harga,
		);

		$selisih =  $data_awal->dp - (($data_awal->jmlBenurKirim + ($data_awal->perkantong*$kantong)) * $data_awal->harga);

		if ( $selisih < 0){
			$data['piutang'] = $selisih*-1;
			$data['hutang'] = 0;
		}else{
			$data['piutang'] =0;
			$data['hutang'] = $selisih;
		}

		$this->db->where('id', $id);
		$this->db->update('benur_data', $data);
		//print_r($this->db->last_query());
		return $this->db->affected_rows();

	}

	public function batch_update_kantong($kode, $perkantong){
		if($kode){
			$data1 = array(
				'perkantong'  => only_numbers($perkantong),
			);
			$this->db->where('id', $kode);
			$this->db->update('benur_kode', $data1);
		}

		$data =  $this->select_by_kode($kode);
		foreach ($data as $id){
			$id = $id->id;
			$jlm_benur  =  $this->select_by_id($id);
			$kantong_baru = floor($jlm_benur->jmlBenur / only_numbers($perkantong));
			$jlm_baru		=  $kantong_baru * only_numbers($perkantong);
			$harga = $jlm_baru * $jlm_benur->harga;

			$datas = array(
				'perkantong'=> only_numbers($perkantong),
				'jmlKantong'=> $kantong_baru,
				'jmlBenurKirim' => $jlm_baru,
				'realisasi_jml_kantong'=> $kantong_baru,
				'realisasi_jml_benur' => $jlm_baru,
				'realisasi_biaya' => $harga,
			);
			$this->db->update('benur_data', $datas, array('id' => $id));
			// print_r($this->db->last_query());
			 $hasil[] = $this->db->affected_rows();
		}
		return  $hasil;
	}

	public function select_by_id($id) {

		$this->db->select('benur_data.*, agen.nama as nama_agen, benur_kode.* ,benur_jenis.nama as jenis_benur');
		$this->db->from('benur_data');
		$this->db->join('petambak','benur_data.alamat = petambak.alamat','LEFT');      
		$this->db->join('agen','benur_data.idAgen = agen.id','LEFT');
		$this->db->join('benur_kode','benur_data.kode = benur_kode.id','LEFT');
		$this->db->join('benur_jenis','benur_data.jnsBenur = benur_jenis.kode','LEFT');
		$this->db->where('benur_data.id', $id);
		$data = $this->db->get();
		return $data->row();
	}

	public function select_by_kode($kode) {
		$this->db->select('id');
		$this->db->from('benur_data');
		$this->db->where('kode', $kode);
		$data = $this->db->get();
		return $data->result();
	}


	public function select_all_by_code($kode) {
		$this->db->select('benur_data.*, agen.nama AS nama_agen, benur_kode.kode as kode_benur, benur_jenis.nama as jenis_benur,benur_kode.* ');
		$this->db->from('benur_data');
		$this->db->join('petambak','benur_data.alamat = petambak.alamat','LEFT');      
		$this->db->join('agen','benur_data.idAgen = agen.id','LEFT');
		$this->db->join('benur_kode','benur_data.kode = benur_kode.id','LEFT');
		$this->db->join('benur_jenis','benur_data.jnsBenur = benur_jenis.kode','LEFT');
		$this->db->where('benur_data.kode', $kode);
		$this->db->order_by('benur_data.alamat', 'ASC');
		$data = $this->db->get();
		 // print_r($this->db->last_query());
		return $data->result();

	}
	public function delete($id) {

		$this->db->where('kode', $id);
		$this->db->update('benur_data', ['kode' => Null, 'status' => 'proses']);

		$sql = "DELETE FROM benur_kode WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}

/* End of file M_benur.php */
/* Location: ./application/models/M_benur.php */