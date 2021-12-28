<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Auth_model');

        // var_dump($this->session->all_userdata());die();

        if ($this->session->userdata('id_role') == 2) {
            redirect('Admin_home');
        } elseif ($this->session->userdata('id_role') == 1) {
            redirect('');
        }
    }

    public function index()
    {
        $data['title'] = "Login Aplikasi";
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', [
            'username' => $username,
        ])->row_array();
        // ada user
        if ($user) {
            // jika aktif

            if ($user['status_active'] == 1) {

                //cek password
                if (password_verify($password, $user['password'])) {

                    // var_dump("ok");die();
                    $data = [
                        'nama_admin' => $user['nama_admin'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'id_admin' => $user['id_admin'],
                        'foto_profile' => $user['foto_profile'],
                    ];

                    $this->session->set_userdata($data);

                    redirect('Admin_home');
                } else {
                    $pesan = $this->alert('Maaf!', 'danger', "Password Salah!");
                    $this->session->set_flashdata('alert', $pesan);

                    redirect('auth');
                }
            } else {

                $pesan = $this->alert('Maaf!', 'danger', "Email dengan Username tersebut belum aktif!");
                $this->session->set_flashdata('alert', $pesan);

                redirect('auth');
            }
        } else {

            $pesan = $this->alert('Maaf!', 'danger', "Username belum terdaftar!");
            $this->session->set_flashdata('alert', $pesan);

            redirect('auth');
        }
    }

    public function alert($kata_depan = "", $warna = "", $isi = "")
    {

        $alert = '<div class="alert alert-' . $warna . ' alert-dismissible fade show" role="alert">
		<strong>' . $kata_depan . '</strong> ' . $isi . '
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  	</div>';

        return $alert;
    }
}