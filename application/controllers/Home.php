<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{


    public function index()
    {
        $data['title'] = 'CI 3 - Mazer Admin Dashboard';
        $data['count_user'] = $this->db->count_all('user');
          // SIDEBAR
          $data['root']  = 'dashboard';
          $data['page']  = 'dashboard';

          $data['title'] = "Data Benur Regular";
          $data['deskripsi'] = "";
          $this->template->views('home', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

/* End of file Home.php and path \application\controllers\Home.php */
