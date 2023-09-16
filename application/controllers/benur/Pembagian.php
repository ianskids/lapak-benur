<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// namespace App\Controllers;
class Pembagian extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('benur/Benur_model');
        $this->load->model('Petambak_model');
        $this->load->model('benur/Proses_model');
        $this->load->model('benur/Pembagian_model');
	}

	public function index() {
		$data['userdata'] = $this->userdata;

		// SIDEBAR
		$data['root']  = 'pembagian';
		$data['page']  = 'pembagian-regular';

		$data['judul'] = "Data Pembagian Benur Regular";
		$data['deskripsi'] = "";
		$data['jnsBnr'] = 'reg';
		$data['data']	='regular';
		$data['dataBenur'] = $this->Pembagian_model->select_all_benur_kode($data['jnsBnr']);
		$this->template->views('benur/pembagian/data', $data);

	}

	public function data($jenis_benur= 'regular') {
		$data['userdata'] = $this->userdata;

		// SIDEBAR
		$data['root']  = 'pembagian';
		$data['page']  = 'pembagian-'.$jenis_benur;

		$data['judul'] = "Data Pembagian Benur".ucwords($jenis_benur);
		$data['deskripsi'] = "";
		$data['jenis_benur'] = $jenis_benur;
		$data['jnsBnr'] = kode_benur($jenis_benur);
		$data['dataBenur'] = $this->Pembagian_model->select_all_benur_kode($data['jnsBnr']);
		$this->template->views('benur/pembagian/data', $data);
	}


	public function list_data($jnsBnr='regular', $id="") {
		$data['userdata'] = $this->userdata;

		// SIDEBAR
		$data['root']  = 'pembagian';
		$data['page']  = 'pembagian-'.$jnsBnr;

		$data['judul'] = "Data Benur ".$jnsBnr;
		$data['deskripsi'] = "";
		$data['jnsBnr'] = kode_benur($jnsBnr);
		$data['data']=$jnsBnr;
		$data['total_benur']=  $this->Pembagian_model->sum($data['jnsBnr'], $id, 'tebar');
		if($id){
			$data['id'] = $id;
			$data['data_kode'] = $this->Pembagian_model->select_kode($id);
		
			$this->template->views('benur/pembagian/list_data_update', $data);
		}else
		{
			$this->template->views('benur/pembagian/list_data', $data);	
		}
	}

	public function data_ajax($jenis= 'reg',  $blok="", $idkode="", $proses='tebar') {
		
		$fetch_data = $this->Pembagian_model->select_all_benur($jenis, $blok, $idkode, $proses);
		
		$data = array();  
		         $no=1;
		         // print_r($fetch_data);
		         foreach($fetch_data as $row)  
		         {  
		              $sub_array = array();                  
		              $sub_array[] = $no++. '<input type="hidden" name="id_benur[]" value="'.$row->id.'"/>';          
		              $sub_array[] = $row->alamat;  
		              $sub_array[] = $row->nama; 
		              $sub_array[] = angka_indo($row->jmlBenur);
		              $sub_array[] = angka_indo($row->jmlBenurKirim); 
		              $sub_array[] = angka_indo($row->perkantong); 
		              $sub_array[] = angka_indo($row->jmlKantong);
		              $sub_array[] = '<div class="btn btn-success btn-xs  up-kantongbenur" data-id="'.$row->id.'"><i class="bi bi-arrow-up"></i></div>
		              <div class="btn btn-warning btn-xs down-kantongbenur" data-id="'.$row->id.'"><i class="bi bi-arrow-down"></i></div>';  
		              $sub_array[] = time_convert($row->tglTebar);   
		              $sub_array[] = '<div class="btn btn-success btn-xs  kembali-proses-dataBenur" data-id="'.$row->id.'"><i class="bi bi-rewind-btn"></i></div>
		              <div type="button" name="update" data-id="'.$row->id.'" class="btn btn-info btn-xs update-dataBenur"><i class="fa fa-edit"></i></div>&nbsp;
              <div class="btn btn-danger btn-xs konfirmasiHapus-benur" data-id="'.$row->id.'"  data-target="#konfirmasiHapus"  data-toggle="modal"><i class="fa fa-trash"></i></div>'; 
		              $data[] = $sub_array;  
		         }  
		         $output = array(   
		              "data"   =>     $data  
		         );  
		         echo json_encode($output);  
	}


	public function form_add($jnsBnr, $id= NUll) {
		$data['userdata'] = $this->userdata;

		$data['page'] = "benur";
		$data['judul'] = "Data Benur";
		$data['deskripsi'] = "Manage Data Benur";

		$data['id']= $id;
		$data['jnsBnr'] = kode_benur($jnsBnr);

		echo show_my_modal('benur/pembagian/modals/form_add', 'Pembagian Alamat Tebar Benur', 'pembagian-benur', $data, 'lg', 'simpan-pembagian');
	}

	public function form_add_kode() {

		$this->form_validation->set_rules('kode' , 'Kode', 'trim|required');
		$this->form_validation->set_rules('perkantong_kirim' , 'Isi Perkantong', 'trim|required');
		$this->form_validation->set_rules('stok' , 'Stok tersedia', 'trim|required');
		$this->form_validation->set_rules('kebutuhan', 'Nama Pendaftar', 'trim|required');
		$this->form_validation->set_rules('selisih', 'Selisih', 'trim|required');

		$data = $this->input->post();

		if ($this->form_validation->run() == TRUE) {
			if($this->input->post('id')){
				$result = $this->Pembagian_model->update_kode($data);
				$id = ($this->input->post('id'))? : '';
				if ($result[0] > 0) {
					$out['status'] = '';
					$out['msg'] = 'Data Benur Berhasil diupdate';
					$this->session->set_flashdata('success', 'User Updated successfully');
				} else {
					$out['status'] = '';
					$out['msg'] = 'Data Benur Gagal diupdate';
					$this->session->set_flashdata('error', 'Data Benur Gagal diupdate');
				}
			}else{
				$result = $this->Pembagian_model->add_kode($data);
				$id =  $this->session->flashdata('id');
				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = 'Data Benur Berhasil diupdate';
					$this->session->set_flashdata('success', 'User Updated successfully');
				} else {
					$out['status'] = '';
					$out['msg'] = 'Data Benur Gagal diupdate';
					$this->session->set_flashdata('error', 'Data Benur Gagal diupdate');
				}
			}
		} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
				$this->session->set_flashdata('msg',  clean_toast(validation_errors()));
			}
	$url = ($this->input->post('benur'));

		redirect('benur/pembagian/data/'.$url.'/'.$id);
}
	public function form_update() {
	 $id = trim($_POST['id']);
	 $data['dataBenur'] = $this->M_benur->select_by_id($id);
	 $data['userdata'] = $this->userdata;
	 // $data['dataBenur'] = $this->M_benur->select_all_benur();
	 $data['dataJenisBenur'] = $this->M_benur->select_jenis_benur();
	 $data['dataAgen'] = $this->M_benur->select_agen();


	 $data['page'] = "benur";
	 $data['judul'] = "Data Benur";
	 $data['deskripsi'] = "Manage Data Benur";

	 echo show_my_modal('benur/pembagian/modals/update_benur', 'Update Pembagian Benur', 'update-benur', $data, 'lg');
	}
	public function update_benur($jnsBnr='reg', $id_kode="") {
		$this->form_validation->set_rules('alamat' , 'Alamat', 'trim|required');
		$this->form_validation->set_rules('namaPendaftar', 'Nama Pendaftar', 'trim|required');
		$this->form_validation->set_rules('idAgen', 'agen', 'trim');
		$this->form_validation->set_rules('noHp', 'no hp', 'trim');
		$this->form_validation->set_rules('jnsBenur', 'jenis benur', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('perkantong', 'perkantong', 'trim|required');
		$this->form_validation->set_rules('jmlBenurKirim', 'jmlBenurKirim', 'trim|required');
		$this->form_validation->set_rules('jmlKantong', 'jmlKantong', 'trim|required');
		$this->form_validation->set_rules('tglSchedule', 'tglSchedule', 'trim|required');
		$this->form_validation->set_rules('biaya', 'biaya', 'trim');

		$data = $this->input->post();

		if ($this->form_validation->run() == TRUE) {
	      if($this->input->post('id'))
	      {
	           $result = $this->Pembagian_model->update_benur($data);
	      }

			if ($result > 0) {
				$jumlah_benur = (array)  $this->Pembagian_model->sum($jnsBnr, $id_kode, 'tebar');
				$out['id'] = $result;
				$out['status'] = 'success';
	           $out['msg'] = 'Data Benur Berhasil diupdate';
	           $out['jmlBenurKirim'] = $jumlah_benur['jmlBenurKirim'];
			} else {
				$out['status'] = 'error';
				$out['msg'] = 'Data Benur Gagal diupdate';
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
	public function data_proses_ajax($jenis= 'reg', $proses='proses') {
		
		$fetch_data = $this->Pembagian_model->select_all_benur($jenis, NULL, NULL, $proses);
		
		$data = array();  
		         $no=1;
		         foreach($fetch_data as $row)  
		         {  
		              $sub_array = array();                  
		              $sub_array[] = $no++;                  
		              $sub_array[] = $row->alamat;  
		              $sub_array[] = $row->nama; 
		              $sub_array[] = $row->jmlBenur; 
		              $sub_array[] = $row->perkantong; 
		               $sub_array[] = '<div class="btn btn-success btn-xs tebar-dataBenur" data-id="'.$row->id.'"><i class="bi bi-check2-square"></i></div>';  
		              $data[] = $sub_array;  
		         }  
		         $output = array(   
		              "data"   =>     $data  
		         );  
		         echo json_encode($output);  
	}


	public function proses_edit_ajax() {
		$data = $this->input->post();
		// print_r($data);
		$total = 0;
		if(isset($data['benur'])){
			$benur = $data['benur'];

			$kode = ($data['kode'] ==! "")?$data['kode']:NUll;


			$sum = $this->Pembagian_model->sum($data['benur'], $kode, 'tebar');
			$total = $sum->jmlBenurKirim;
		}
		$result = $this->Pembagian_model->prosesbyid($data);
		
		if ($result > 0) {
			$out['status'] = 'success';
			$out['msg'] = 'Data Benur Berhasil diupdate';
			$out['jmlBenurKirim'] = $total;
		} else {
			$out['status'] = 'error';
			$out['msg'] = 'Data Benur Gagal diupdate';
		}
		echo json_encode($out);
	}

	public function prosesInsertKode() {

		$this->form_validation->set_rules('kode' , 'Kode', 'trim|required');
		$this->form_validation->set_rules('perkantong' , 'Isi Perkantong', 'trim|required');
		$this->form_validation->set_rules('stok' , 'Stok tersedia', 'trim|required');
		$this->form_validation->set_rules('kebutuhan', 'Nama Pendaftar', 'trim|required');
		$this->form_validation->set_rules('selisih', 'Selisih', 'trim|required');
		$this->form_validation->set_rules('id[]', 'Data Tambak', 'trim|required');

		$data = $this->input->post();

			if ($this->form_validation->run() == TRUE) {
				$result = $this->M_benur_proses->prosesinsertkode($data);
				if ($result[0] > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Berhasil diupdate', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Benur Gagal diupdate', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

		echo json_encode($out);
	}
	
	public function update_kantong($jnsBnr='reg', $id_kode="") {
	 $id = $this->input->post('id');
	 $kantong = $this->input->post('kantong');

	 $result = $this->Pembagian_model->update_kantong($id, $kantong);
	 echo json_encode( $this->Pembagian_model->sum($jnsBnr, $id_kode, 'tebar'));
	}

	public function batch_update_kantong($jnsBnr='reg', $id_kode="") {
	 $kantong = $this->input->post('perkantong_kirim_batch');

	$result = $this->Pembagian_model->batch_update_kantong($id_kode, $kantong);
	redirect('benur/pembagian/data/'.$jnsBnr.'/'.$id_kode);
	}
	public function delete($url, $id) {
		$result = $this->Pembagian_model->delete($id);

		if ($result > 0) {
			$out['status'] = 'success';
			$out['msg'] = 'Data Benur Berhasil dihapus';
		} else {
			$out['status'] = 'error';
			$out['msg'] = 'Data Benur Gagal dihapus';
		}
		echo json_encode($out);
		$url = ($url != 'regular')?:'';
		redirect('benur/pembagian/'.$url);
	}

	public function total_benur($jnsBnr, $id=''){
		echo json_encode ($this->Pembagian_model->sum($jnsBnr, $id, 'tebar'));
	}

	public function print($jnsBnr, $id) {

		$data['userdata'] = $this->userdata;
	    $data['data_kode'] = $this->Pembagian_model->select_kode($id);
	    // print_r( $data['data_kode']);
	    $data['fetch_data_03'] = $this->Pembagian_model->select_all_benur(kode_benur($jnsBnr), '03', $id, 'tebar');
	    $data['fetch_data_04'] = $this->Pembagian_model->select_all_benur(kode_benur($jnsBnr), '04', $id, 'tebar');


     $this->load->view('benur/pembagian/print', $data);
	}

	public function print_surat_jalan($id) {

		$data['userdata'] = $this->userdata;
	    // $data['dataBenur'] = $this->Pembagian_model->select_by_id($id);
	    $data['daftar_benur'] = $this->Pembagian_model->select_all_by_code($id);

 // print_r($data['daftar_benur']);
		$this->load->view('benur/pembagian/print_surat_jalan', $data);
	}

}

/* End of file Benur.php */
/* Location: ./application/controllers/Benur.php */