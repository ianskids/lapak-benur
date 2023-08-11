<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->userdata = $this->session->userdata('name');
		
		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));
		$referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
		$this->session->set_userdata('login_referrer', $referrer_value);
		if ($this->session->userdata('name') == '') {
			redirect('auth/login');
		}
	}


}

/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */