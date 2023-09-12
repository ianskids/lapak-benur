<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('benur/Benur_model');
         $this->load->model('Petambak_model');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $jnsBenur =     "reg";
        $data['jenis_benur'] = 'regular';

          // SIDEBAR
          $data['root']  = 'benur';
          $data['page']  = 'daftar-regular';

        $data['title'] = "Data Benur Regular";
        $data['deskripsi'] = "";
        $data['jnsBnr'] = $jnsBenur;
        $this->template->views('benur/pendaftaran/data', $data);
    }

     public function data($jenis_benur= 'regular') {
          $data['userdata'] = $this->userdata;

          // SIDEBAR
          $data['root']  = 'benur';
          $data['page']  = 'daftar-'.$jenis_benur;

          $data['title'] = "Data Benur ".ucwords($jenis_benur);
          $data['deskripsi'] = "";
          $data['jenis_benur'] = $jenis_benur;
          $data['jnsBnr'] = kode_benur($jenis_benur);
          $this->template->views('benur/pendaftaran/data', $data);
     }

     // data_ajax di index
    public function data_ajax($jenis= 'reg') 
    {          
         $fetch_data = $this->Benur_model->select_all_benur($jenis);
         $data = array();  
         $no=1;
         foreach($fetch_data as $row)  
         {  

          if($row->status == 'tebar'){
               $status = '<span class="badge bg-success">'.strtoupper($row->status).'</span>';
          }elseif($row->status == 'proses'){
               $status = '<span class="badge bg-warning">'.strtoupper($row->status).'</span>';
          }else{
               $status = '<span class="badge bg-danger">'.strtoupper($row->status).'</span>';
          }
               

              $sub_array = array();                  
              $sub_array[] = $no++;                  
              $sub_array[] = $row->alamat;
              $sub_array[] = $row->nama; 
             
              $sub_array[] = angka_indo($row->jmlBenur); 
              $sub_array[] = $row->nama_agen; 
              $sub_array[] = time_convert($row->tglSchedule);
              $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update-dataBenur" data-id="'.$row->id.'"><i class="bi bi-pencil"></i></a> <a href="#" class="btn btn-warning btn-xs"><i class="bi bi-x"></i></a>';  
               $sub_array[] = $status; 
              $data[] = $sub_array;  

         }  
         $output = array(   
              "data"  =>     $data  
         );  
         header('Content-Type: application/json; charset=utf-8');
         echo json_encode($output);  
    }  

    // form add
    public function add($jenis_benur="") {
        $data['userdata'] = $this->userdata;
        // $data['dataBenur'] = $this->Benur_model->select_all_benur();
        $data['dataPetambak'] = $this->Petambak_model->select_all_petambak();
        $data['dataJenisBenur'] = $this->Benur_model->select_jenis_benur();
        $data['dataAgen'] = $this->Benur_model->select_agen();

        // SIDEBAR
        $data['root']  = 'benur';
        $data['page']  = 'daftar-regular';
        $data['jenis_benur'] = $jenis_benur;

        $data['title'] = "Pendaftaran Benur";
        $data['deskripsi'] = "Manage Data Benur";
        $this->template->views('benur/pendaftaran/add', $data);
    }

    public function form_update() {
     $id = trim($_POST['id']);
     $data['dataBenur'] = $this->Benur_model->select_by_id($id);
     $data['userdata'] = $this->userdata;
     // $data['dataBenur'] = $this->Benur_model->select_all_benur();
     $data['dataJenisBenur'] = $this->Benur_model->select_jenis_benur();
     $data['dataAgen'] = $this->Benur_model->select_agen();


     $data['page'] = "benur";
     $data['judul'] = "Data Benur";
     $data['deskripsi'] = "Manage Data Benur";

     echo show_my_modal_form('benur/pendaftaran/update_benur', 'Pendaftaran Tebar Benur', 'form-update-benur', 'update-benur', $data, 'lg');
    }

    public function insert() {
        $this->form_validation->set_rules('alamat' , 'Alamat', 'trim|required');
        $this->form_validation->set_rules('namaPendaftar', 'Nama Pendaftar', 'trim|required');
        $this->form_validation->set_rules('idAgen', 'agen', 'trim');
        $this->form_validation->set_rules('noHp', 'no hp', 'trim');
        $this->form_validation->set_rules('jnsBenur', 'jenis benur', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        $this->form_validation->set_rules('perkantong', 'perkantong', 'trim|required');
        $this->form_validation->set_rules('jmlBenur', 'jmlBenur', 'trim|required');
        $this->form_validation->set_rules('jmlKantong', 'jmlKantong', 'trim|required');
        $this->form_validation->set_rules('tglSchedule', 'tglSchedule', 'trim|required');
        $this->form_validation->set_rules('biaya', 'biaya', 'trim');

        $data = $this->input->post();

        if ($this->form_validation->run() == TRUE) {
          if($this->input->post('id'))
          {
               $result = $this->Benur_model->update_benur($data);
               $msg = 'Data Benur Berhasil diupdate';

          }else{
               $result = $this->Benur_model->insert_benur($data);
               $msg = 'Data Benur Berhasil ditambahkan';
          }

            if ($result > 0) {
                $out['id'] = $result;
                $out['status'] = 'success';
               $out['msg'] = $msg;
               $this->session->set_flashdata('berhasil', 'Data Benur berhasil ditambahkan!');
            } else {
                $out['status'] = 'error';
                $out['msg'] = 'Data Benur Gagal ditambahkan';
                $this->session->set_flashdata('error', 'Data Benur Gagal ditambahkan ditambahkan!');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function print($id) {
     $data['userdata'] = $this->userdata;
     print_r($data);
     $data['dataBenur'] = $this->Benur_model->select_by_id($id);
     //print_r($data['dataBenur']);
     // $data['dataAgen'] = $this->Benur_model->select_agen();
     // $data['userdata'] = $this->userdata;

     $this->load->view('benur/pendaftaran/print', $data);
    }

    public function delete() {
     $id = $_POST['id'];
     $result = $this->Benur_model->delete($id);

     if ($result > 0) {
          $out['status'] = 'success';
          $out['msg'] = 'Data Benur Berhasil dihapus';
     } else {
          $out['status'] = 'error';
          $out['msg'] = 'Data Benur Gagal dihapus';
     }
     echo json_encode($out);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */