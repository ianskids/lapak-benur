<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'User');
    }

    public function index()
    {
        // SIDEBAR
        $data['root']  = 'user';
        $data['page']  = '-';

        $data['title'] = 'Data User';
        $data['user'] = $this->User->select();
        $this->template->views('user/view', $data);
    }

    public function add()
    {
        // SIDEBAR
        $data['root']  = 'user';
        $data['page']  = '-';

        $data['title'] = 'Tambah Data User';
        $data['content'] = 'user/add';
        $this->template->views('user/add', $data);
    }

    public function edit($id)
    {
        // SIDEBAR
        $data['root']  = 'user';
        $data['page']  = '-';

        $data['title'] = 'Ubah Data User';
        $data['user'] = $this->User->select_by_id($id);

        $this->template->views('user/edit', $data);
    }

    public function create()
    {
        $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        $data = [
            "name" => $this->input->post('name', true),
            "username" => $this->input->post('username', true),
            "password" => $password,
        ];
        $create = $this->User->insert($data);

        // Cek Apakah berhasil atau tidak
        if ($create) {
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan!');
            redirect('user');
        }

        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
        redirect('user/add');
    }

    public function update()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "username" => $this->input->post('username', true),
        ];
        $update = $this->User->update($data, $this->input->post('id', true));

        // Cek Apakah berhasil atau tidak
        if ($update) {
            $this->session->set_flashdata('berhasil', 'Data berhasil diubah!');
            redirect('user');
        }

        $this->session->set_flashdata('gagal', 'Data gagal diubah!');
        redirect('user/add');
    }

    public function delete($id)
    {
        $this->User->delete($id);
        $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!');
        redirect('user');
    }
}

/* End of file User.php and path \application\controllers\User.php */
