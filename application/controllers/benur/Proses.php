<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// namespace App\Controllers;
class Proses extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('benur/Benur_model');
        $this->load->model('Petambak_model');
        $this->load->model('benur/Proses_model');
    }

    public function index() {
        $data['userdata'] = $this->userdata;

        // SIDEBAR
        $data['root']  = 'proses';
        $data['page']  = 'proses-regular';

        $data['judul'] = "Data Benur Regular";
        $data['deskripsi'] = "";

        $data['jnsBnr'] = 'reg';
        $this->template->views('benur/proses/data', $data);
    }

 public function data($jenis_benur= 'regular') {
      $data['userdata'] = $this->userdata;

      // SIDEBAR
      $data['root']  = 'proses';
      $data['page']  = 'proses-'.$jenis_benur;

      $data['title'] = "Proses Benur ".ucwords($jenis_benur);
      $data['deskripsi'] = "";
      $data['jenis_benur'] = $jenis_benur;
      $data['jnsBnr'] = kode_benur($jenis_benur);
      $this->template->views('benur/proses/data', $data);
 }
    public function data_ajax($jenis= 'reg', $proses='daftar') {
        
        $fetch_data = $this->Proses_model->select_all_benur($jenis, $proses);
        
        $data = array();  
                 $no=1;
                 foreach($fetch_data as $row)  
                 {  
                      $sub_array = array();                  
                      $sub_array[] = $no++;                  
                      $sub_array[] = $row->alamat;
                      $sub_array[] = $row->nama;
                      $sub_array[] = angka_indo($row->jmlBenur); 
                      $sub_array[] = $row->nama_agen; 
                      $sub_array[] = $row->tglSchedule;
                      if($proses === 'daftar'){
                        $sub_array[] = '<button class="btn btn-success proses-dataBenur btn-xs" data-id="'.$row->id.'"><i class="bi bi-check-square-fill"></i></button>
                      <button class="btn btn-primary proses-edit-dataBenur btn-xs"><i class="bi bi-pencil-square"></i></button>';
                    }else{
                            $sub_array[] = '<button class="btn btn-success kembali-dataBenur btn-xs" data-id="'.$row->id.'"><i class="bi bi-arrow-left-square"></i></button>
                      <button class="btn btn-warning update-dataBenur btn-xs" data-id="'.$row->id.'"><i class="bi bi-pencil-square"></i></button>';
                    }               
                      $data[] = $sub_array;  
                 }  
                 $output = array(   
                      "data"   =>     $data  
                 );  
                 echo json_encode($output);  
    }


    public function proses_edit_ajax() {

        $data = $this->input->post();
        $result = $this->Proses_model->prosesbyid($data);
        if ($result > 0) {
            $out['status'] = 'success';
            $out['msg'] = 'Data Benur Berhasil diupdate';
        } else {
            $out['status'] = 'error';
            $out['msg'] = 'Data Benur Gagal diupdate';
        }
        echo json_encode($out);
    }

}

/* End of file Benur.php */
/* Location: ./application/controllers/Benur.php */