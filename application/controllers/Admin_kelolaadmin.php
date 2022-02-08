<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kelolaadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Admin_model', 'admin');

        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        } else {

            if ($this->session->userdata('id_role') == 1) {
                redirect('praktikan_home');
            }
        }
    }

    public function index()
    {

        $data['title'] = "Kelola Admin (Admin)";
        //load libraray
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('submit')) {
            // var_dump($this->input->post('keyword'));die();
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->session->unset_userdata('keyword');

        //config
        $this->db->like('nama_admin', $data['keyword']);
        $this->db->from('admin');
        $config['total_rows'] = $this->db->count_all_results();

        $config['base_url'] = base_url('Admin_kelolaadmin/index');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;
        // $config['url_segment'] = 3;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['classes'] = $this->admin->get_limit_dataadmin('admin', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        // $data['praktikans'] = $this->admin->getPraktikansAll()->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/listAdmin', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapus_admin($id)
    {

        $this->admin->delete('admin', ['id_admin' => $id]);

        $this->session->set_flashdata('flash', 'Data Admin Berhasil Dihapus!');
        redirect('admin_kelolaadmin');
    }

    public function tambah_admin()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-error', "Error, Silahkan Periksa Data Tambah Admin Kembali!");
            redirect('admin_kelolaadmin');
        } else {

            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = [
                'nama_admin' => $this->input->post('nama_lengkap'),
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'status_active' => 1,
            ];

            $this->admin->insert('admin', $data);


            $this->session->set_flashdata('flash', "Data Admin Berhasil Didaftarkan!");
            redirect('admin_kelolaadmin');
        }
    }

    public function edit()
    {

        $data['title'] = "Profil Admin Mantap";

        $data['info_admin'] = $this->admin->get_where('admin', ['id_admin' => 2])->row_array();

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
}