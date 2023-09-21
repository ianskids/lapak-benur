<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// namespace App\Controllers;
class Realisasi extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('benur/Benur_model');
		$this->load->model('benur/Proses_model');
		$this->load->model('benur/Realisasi_model');
		$this->load->model('Petambak_model');
	}

	public function index() {
		$data['userdata'] = $this->userdata;

		// SIDEBAR
		$data['root']  = 'realisasi';
		$data['page']  = 'realisasi-regular';

		$data['title'] = "Data realisasi Benur Regular";
		$data['deskripsi'] = "";
		$data['jnsBnr'] = 'reg';
		$data['data']	='regular';
		$data['dataBenur'] = $this->Realisasi_model->select_all_benur_kode($data['jnsBnr']);
		$this->template->views('benur/realisasi/index', $data);
	}
	public function data($jenis_benur= 'regular') {
	     $data['userdata'] = $this->userdata;

	     // SIDEBAR
	     $data['root']  = 'realisasi';
	     $data['page']  = 'realisasi-'.$jenis_benur;

	     $data['title'] = "realisasi Benur ".ucwords($jenis_benur);
	     $data['deskripsi'] = "";
	     $data['jenis_benur'] = $jenis_benur;
	     $data['jnsBnr'] = kode_benur($jenis_benur);
	     $data['dataBenur'] = $this->Realisasi_model->select_all_benur_kode($data['jnsBnr']);
	     $this->template->views('benur/realisasi/data', $data);
	}


	public function list_data($jnsBnr='regular', $id="") {
		$data['userdata'] = $this->userdata;

		// SIDEBAR
		$data['root']  = 'realisasi';
		$data['page']  = 'realisasi-'.$jnsBnr;

		$data['title'] = "Data Benur ".$jnsBnr;
		$data['deskripsi'] = "";
		$data['jnsBnr'] = kode_benur($jnsBnr);
		$data['data']=$jnsBnr;
		if($id){
			$data['id'] = $id;
			$data['data_kode'] = $this->Realisasi_model->select_kode($id);
		
			$this->template->views('benur/realisasi/list_data', $data);
		}
	}

	public function data_ajax($jenis= 'reg',  $blok="", $idkode="", $proses='tebar') {
		
		$fetch_data = $this->Realisasi_model->select_all_benur($jenis, $blok, $idkode, $proses);
		
		$data = array();  
		         $no=1;
		         // print_r($fetch_data);
		         foreach($fetch_data as $row)  
		         {  
		         	// print_r($row);
		              $sub_array = array();                  
		              $sub_array[] = $no++. '<input type="hidden" name="id_benur[]" value="'.$row->id.'"/>';
		              $sub_array[] = $row->kode_benur;                 
		              $sub_array[] = $row->alamat;  
		              $sub_array[] = $row->nama; 
		              $sub_array[] = angka_indo($row->jmlBenurKirim); 
		              $sub_array[] = angka_indo($row->realisasi_jml_benur); 
		              $sub_array[] = angka_indo($row->jmlKantong);

		              if($row->jmlKantong - $row->realisasi_jml_kantong > 0 ){
		                   $realisasi_jml_kantong = '<span class="bg-danger text-white">&nbsp;'.angka_indo($row->realisasi_jml_kantong).'&nbsp;</span>';
		              }elseif($row->jmlKantong - $row->realisasi_jml_kantong < 0){
		                   $realisasi_jml_kantong = '<span class="bg-success text-white">&nbsp;' .angka_indo($row->realisasi_jml_kantong). '&nbsp;</span>';
		              }else{
		                   $realisasi_jml_kantong = '<span>&nbsp;' .angka_indo($row->realisasi_jml_kantong). '&nbsp;</span>';
		              }

		              $sub_array[] = $realisasi_jml_kantong;
		              $sub_array[] = '<div class="btn btn-success btn-xs  up-kantongbenur-realisasi" data-id="'.$row->id.'"><i class="bi bi-arrow-up"></i></div>
		              <div class="btn btn-warning btn-xs down-kantongbenur-realisasi" data-id="'.$row->id.'"><i class="bi bi-arrow-down"></i></div>';  
		              $sub_array[] = angka_indo($row->realisasi_biaya);
		              $sub_array[] = angka_indo($row->dp); 
		               $sub_array[] = angka_indo($row->dp-$row->realisasi_biaya); 
		              $sub_array[] = '
		              <div type="button" name="update" data-id="'.$row->id.'" class="btn btn-info btn-xs update-dataBenur-kirim"><i class="fa fa-edit"></i></div>'; 
		              $data[] = $sub_array;  
		         }  
		         $output = array(   
		              "data"   =>     $data  
		         );  
		         echo json_encode($output);  
	}


	public function update_kantong($jnsBnr='reg', $id_kode="") {
	 $id = $this->input->post('id');
	 $kantong = $this->input->post('kantong');

	 $result = $this->Realisasi_model->update_kantong($id, $kantong);
	 echo json_encode( $this->Realisasi_model->sum($jnsBnr, $id_kode, 'tebar'));
	}


}

/* End of file Benur.php */
/* Location: ./application/controllers/Benur.php */