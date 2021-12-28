<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Admin_model', 'admin');

        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

    }

    public function index()
    {
        $data['title'] = "Profil Admin";
        $data['info_admin'] = $this->admin->get('admin')->row_array();

        $username = $this->input->post('username');
        $email = $this->input->post('email');

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        // var_dump($data['info_admin']['nama_lengkap']);die();
        if ($data['info_admin']['username'] != $username && $data['info_admin']['email'] != $email) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
                'is_unique' => 'Username ini sudah digunakan!',
            ]);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
                'is_unique' => 'Email ini sudah digunakan!',
            ]);
        } elseif ($data['info_admin']['username'] != $username) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
                'is_unique' => 'Username ini sudah digunakan!',
            ]);

        } elseif ($data['info_admin']['email'] != $email) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
                'is_unique' => 'Email ini sudah digunakan!',
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/admin_profile', $data);
            $this->load->view('template/footer');
        } else {
            $this->updateProfile();
        }

    }

    public function updateProfile()
    {

        $nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $foto_bahan_lama = $this->input->post('foto_bahan');
        $foto_bahan_baru = $_FILES['file']['name'];

        $data_admin = [];

        // var_dump($foto_bahan_baru);die();

        if ($foto_bahan_baru) {

            $file = 'assets_praktikum/img_profile/admin/' . $foto_bahan_lama;

            $data_admin = [
                'nama_admin' => $nama_lengkap,
                'username' => $username,
                'email' => $email,
                'foto_profile' => $this->_uploadFile($file, $foto_bahan_lama),
            ];

            // $this->session->set_userdata('foto_profile', $data_admin['foto_profile']);

        } else {
            $data_admin = [
                'nama_admin' => $nama_lengkap,
                'username' => $username,
                'email' => $email,
                'foto_profile' => $foto_bahan_lama,
            ];
        }

        $this->session->unset_userdata('foto_profile');
        $this->session->unset_userdata('nama_admin');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');

        $data = [
            'nama_admin' => $data_admin['nama_admin'],
            'username' => $data_admin['username'],
            'email' => $data_admin['email'],
            'foto_profile' => $data_admin['foto_profile'],
        ];

        $this->session->set_userdata($data);

        $this->admin->update('admin', $data_admin, ['id_admin' => $this->session->userdata('id_admin')]);
        // $this->admin->update('tb_user', $data_user, ['id_user' => $this->session->userdata('id_user')]);

        $this->session->set_flashdata('flash', 'Data Profil Berhasil Diubah!');

        redirect('admin_profile');

    }

    private function _uploadFile($file, $filelama)
    {

        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];
        $tmpName = $_FILES['file']['tmp_name'];

        // var_dump($namaFiles);die();

        if ($eror === 4) {

            $this->session->set_flashdata('flash-error', "Error upload");

            redirect("admin_profile");

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

            $this->session->set_flashdata('flash-error', "Yang kamu pilih mungkin bukan gambar?");

            redirect("admin_profile");

            return false;
        }

        if ($filelama == "default.jpg") {
            $namaFilesBaru = uniqid();
            $namaFilesBaru .= '.';
            $namaFilesBaru .= $ekstensiGambar;

            move_uploaded_file($tmpName, 'assets_praktikum/img_profile/admin/' . $namaFilesBaru);

            return $namaFilesBaru;
        } else {
            if (is_readable($file) && unlink($file)) {

                $namaFilesBaru = uniqid();
                $namaFilesBaru .= '.';
                $namaFilesBaru .= $ekstensiGambar;

                move_uploaded_file($tmpName, 'assets_praktikum/img_profile/asprak/' . $namaFilesBaru);

                return $namaFilesBaru;
            }
        }

    }

    public function update_password()
    {

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $this->form_validation->set_rules('password_lama', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-error', "Coba Cek Lagi Password Baru Mu!");
            redirect('admin_profile/');
        } else {

            $this->updatePassword();

        }

    }

    public function updatePassword()
    {

        $info_admin = $this->admin->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $password_lama = $this->input->post('password_lama');
        $password1 = $this->input->post('password1');

        $data = [
            'password' => password_hash($password1, PASSWORD_DEFAULT),
        ];

        if (password_verify($password_lama, $info_admin['password'])) {

            $this->admin->update('admin', $data, ['id_admin' => $this->session->userdata('id_admin')]);
            $this->session->set_flashdata('flash', "Password Berhasil Diubah!");

        } else {
            $this->session->set_flashdata('flash-error', "Password Lama Salah!");
        }

        redirect('admin_profile/');

    }

}