<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petambak extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Petambak_model');
	}

	public function ajax() {
		$alamat = $this->input->get('alamat');
		$data['dataPetambak'] = $this->Petambak_model->pilih_alamat($alamat);

		echo json_encode($data['dataPetambak']);
	}

}

/* End of file Petambak.php */
/* Location: ./application/controllers/Petambak.php */