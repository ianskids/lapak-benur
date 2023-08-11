<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benur_model extends CI_Model {

    public function select_all_benur($jenis){
        $this->db->select('benur_data.*, agen.nama AS nama_agen');
        $this->db->from('benur_data');
        $this->db->join('petambak','benur_data.alamat = petambak.alamat','LEFT');      
        $this->db->join('agen','benur_data.idAgen = agen.id','LEFT');
        $this->db->where('jnsBenur', $jenis);
        $this->db->order_by('benur_data.tglDaftar', 'DESC');
        $data = $this->db->get();
        return $data->result();
        
    }

    public function sum($jenis){
        $this->db->select_sum('jmlBenur');
        $this->db->where('jnsBenur', $jenis);
        $data = $this->db->get('benur_data');
        return $data->result_array();
        
    }
    public function select_all() {
        $sql = " SELECT benur_data.id AS id, benur_data.nama AS benur, benur_data.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM benur_data, kota, kelamin, posisi WHERE benur_data.id_kelamin = kelamin.id AND benur_data.id_posisi = posisi.id AND benur_data.id_kota = kota.id";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_id($id) {

        $this->db->select('benur_data.*, agen.nama AS nama_agen');
        $this->db->from('benur_data');
        $this->db->join('petambak','benur_data.alamat = petambak.alamat','LEFT');      
        $this->db->join('agen','benur_data.idAgen = agen.id','LEFT');
        $this->db->order_by('benur_data.tglDaftar', 'DESC');
        $this->db->where('benur_data.id', $id);
        $data = $this->db->get();
        //print_r($data->row());
        return $data->row();
    }



    public function insert($data) {
        
        $data = array(
                'alamat'    => $data['alamat'],
                'register'  => $data['register'],
                'nama'  => $data['nama'],
                'namaPendaftar'=> $data['namaPendaftar'],
                'idAgen'=> $data['idAgen'],
                'noHp'=> $data['noHp'],
                'jnsBenur'=> $data['jnsBenur'],
                'harga'=> only_numbers($data['harga']),
                'perkantong'=> only_numbers($data['perkantong']),
                'jmlBenur'=> only_numbers($data['jmlBenur']),
                'jmlKantong'=> only_numbers($data['jmlKantong']),
                'tglSchedule'=> date("Y-m-d", strtotime($data['tglSchedule'])),
                'biaya'=> only_numbers($data['biaya']),
                'status' => 'daftar'
        );

        $this->db->insert('benur_data', $data);

        return $this->db->insert_id();
    }

    public function update($data) {
        $data = array(
                'id'=> $data['id'],
                'alamat'    => $data['alamat'],
                'register'  => $data['register'],
                'nama'  => $data['nama'],
                'namaPendaftar'=> $data['namaPendaftar'],
                'idAgen'=> $data['idAgen'],
                'noHp'=> $data['noHp'],
                'jnsBenur'=> $data['jnsBenur'],
                'harga'=> only_numbers($data['harga']),
                'perkantong'=> only_numbers($data['perkantong']),
                'jmlBenur'=> only_numbers($data['jmlBenur']),
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

    public function delete($id) {
        $sql = "DELETE FROM benur_data WHERE id='" .$id ."'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    public function insert_batch($data) {
        $this->db->insert_batch('benur_data', $data);
        
        return $this->db->affected_rows();
    }

    public function check_nama($nama) {
        $this->db->where('nama', $nama);
        $data = $this->db->get('benur_data');

        return $data->num_rows();
    }

    public function total_rows() {
        $data = $this->db->get('benur_data');

        return $data->num_rows();
    }

    public function select_jenis_benur() {
        $this->db->select('*');
        $this->db->from('benur_jenis');

        $data = $this->db->get();

        return $data->result();
    }

    public function select_agen() {
        $this->db->select('*');
        $this->db->from('agen');
        $this->db->order_by('nama', 'ASC');

        $data = $this->db->get();

        return $data->result();
    }
}



/* End of file M_benur.php */
/* Location: ./application/models/M_benur.php */