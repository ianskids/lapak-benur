<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi_model extends CI_Model {
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
	public function select_by_id($id) {

		$this->db->select('benur_data.*, benur_data.id as id_benur, agen.nama as nama_agen, benur_kode.* ,benur_jenis.nama as jenis_benur');
		$this->db->from('benur_data');
		$this->db->join('petambak','benur_data.alamat = petambak.alamat','LEFT');      
		$this->db->join('agen','benur_data.idAgen = agen.id','LEFT');
		$this->db->join('benur_kode','benur_data.kode = benur_kode.id','LEFT');
		$this->db->join('benur_jenis','benur_data.jnsBenur = benur_jenis.kode','LEFT');
		$this->db->where('benur_data.id', $id);
		$data = $this->db->get();
		// print_r($this->db->last_query()); exit();
		return $data->row();
	}

	public function update_kantong($id, $kantong){
		$data_awal = $this->select_by_id($id);

		$selisih =  $data_awal->dp - (($data_awal->realisasi_jml_benur + ($data_awal->perkantong*$kantong)) * $data_awal->harga);

		$data = array(
			'realisasi_jml_benur' =>  $data_awal->realisasi_jml_benur + ($data_awal->perkantong*$kantong),
			'realisasi_jml_kantong'=> $data_awal->realisasi_jml_kantong + $kantong,
			'realisasi_biaya' => ($data_awal->realisasi_jml_benur + ($data_awal->perkantong*$kantong)) * $data_awal->harga,
		);
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

	public function sum($jenis,  $idkode='', $data){
		$this->db->select_sum('jmlBenurKirim');
		$this->db->where('status', $data);
		$this->db->where('jnsBenur', $jenis);
		$this->db->where('benur_data.kode', $idkode);
		$data = $this->db->get('benur_data');
		// print_r($this->db->last_query());
		return $data->row();
		
	}

	public function select_all_benur_pembayaran($jenis= Null){
		$this->db->select('benur_data.*, agen.nama AS nama_agen, benur_kode.kode as kode_benur');
		$this->db->from('benur_data');
		$this->db->join('petambak','benur_data.alamat = petambak.alamat','LEFT');      
		$this->db->join('agen','benur_data.idAgen = agen.id','LEFT');
		$this->db->join('benur_kode','benur_data.kode = benur_kode.id','LEFT');
		$this->db->where('status', 'tebar');
		if($jenis)$this->db->where('benur_data.jnsBenur', $jenis);
		$this->db->order_by('benur_data.tglTebar','DESC');
		$this->db->order_by('benur_data.alamat', 'ASC');
		$data = $this->db->get();
		 // print_r($this->db->last_query()); exit();
		return $data->result();
		
	}


		public function ajax_bayar($alamat=""){

			$this->db->select('*');
			$this->db->from('benur_data');
			$this->db->like('alamat', $alamat,  'after');
			$this->db->where('status', 'tebar');
			$this->db->where("(saldo <> 0 OR saldo IS NULL)", NULL, FALSE);
			$this->db->order_by('alamat', 'ASC');
			$this->db->order_by('tglTebar', 'DESC');

			 return $this->db->get()->result();
			// print_r($this->db->last_query()); exit();


		}


//////////////////////////////////////////////////// pembayaran

		public function simpan($data) {
			$dataP = array(
						'no_invoice'	=> $data['no_invoice'],
						'tanggal'		=> date("Y-m-d h:m:s",strtotime($data['tanggal'])),
						'id_benur'		=> $data['id_benur'],
						'kasir'			=> $data['kasir'],
						'pelanggan'		=> $data['pelanggan'],
			);
			$this->db->insert('benur_pembayaran', $dataP);
			$hasil =  $this->db->insert_id();

		$benur = json_decode($data['benur']);
		foreach ($benur as $data_benur) {

			$data_awal = $this->select_by_id($data_benur->id);
			
			if ($data_benur->tagihan < 0){
				$saldo =  $data_awal->dp - $data_awal->realisasi_biaya+($data_benur->tagihan * -1);
				$dataa = array(
					'pembayaran_piutang' => $data_benur->tagihan * -1,
					'tgl_pembayaran_piutang' => date("Y-m-d h:m:s",strtotime($data['tanggal'])),
					'saldo' => $saldo,
					'id_invoice' => $hasil,
				);
			} else{
				$saldo =  $data_awal->dp - $data_awal->realisasi_biaya-$data_benur->tagihan;
				$dataa = array(
					'pembayaran_hutang' => $data_benur->tagihan,
					'tgl_pembayaran_hutang' => date("Y-m-d h:m:s",strtotime($data['tanggal'])),
					'saldo' => $saldo,
					'id_invoice' => $hasil,
				);
			}
			$this->db->where('id', $data_benur->id);
			$this->db->update('benur_data', $dataa);
		}
		return $hasil;		
	}

		public function update($data) {
			$dataP = array(
						'no_invoice'	=> $data['no_invoice'],
						'tanggal'		=> date("Y-m-d h:m:s",strtotime($data['tanggal'])),
						'id_benur'		=> $data['id_benur'],
						'kasir'			=> $data['kasir'],
						'pelanggan'		=> $data['pelanggan'],
			);
			$this->db->insert('benur_pembayaran', $dataP);
			$hasil =  $this->db->insert_id();

		$benur = json_decode($data['benur']);
		foreach ($benur as $data_benur) {

			$data_awal = $this->select_by_id($data_benur->id);
			
			if ($data_benur->tagihan < 0){
				$saldo =  $data_awal->dp - $data_awal->realisasi_biaya+($data_benur->tagihan * -1);
				$dataa = array(
					'pembayaran_piutang' => $data_benur->tagihan * -1,
					'tgl_pembayaran_piutang' => date("Y-m-d h:m:s",strtotime($data['tanggal'])),
					'saldo' => $saldo,
					'id_invoice' => $hasil,
				);
			} else{
				$saldo =  $data_awal->dp - $data_awal->realisasi_biaya-$data_benur->tagihan;
				$dataa = array(
					'pembayaran_hutang' => $data_benur->tagihan,
					'tgl_pembayaran_hutang' => date("Y-m-d h:m:s",strtotime($data['tanggal'])),
					'saldo' => $saldo,
					'id_invoice' => $hasil,
				);
			}
			$this->db->where('id', $data_benur->id);
			$this->db->update('benur_data', $dataa);
		}
		return $hasil;
	}

	public function select_invoice($id){
		$this->db->select('*');
		$this->db->from('benur_pembayaran');
		$this->db->where('id', $id);
		$data = $this->db->get();
		return $data->row();
	}


	public function sum_transaksi($tgl){
		$this->db->select_max('no_invoice');
		$this->db->from('benur_pembayaran');
		$this->db->like('no_invoice', $tgl,  'after');
		$data = $this->db->get();
		return $data->row();
	}

	public function simpan_path($id, $filename){
		$data = array(
			'path' => $filename,
			);
		$this->db->where('id', $id);
		$this->db->update('benur_pembayaran', $data);
		//print_r($this->db->last_query());
		return $this->db->affected_rows();

	}

		public function select_all_voucher(){
		$this->db->select("*");
		$this->db->from('benur_data');
		$this->db->order_by('tglTebar', 'DESC');
		$data = $this->db->get();
	//	print_r($this->db->last_query());
		return $data->result();
		
	}
}

/* End of file M_benur.php */
/* Location: ./application/models/M_benur.php */