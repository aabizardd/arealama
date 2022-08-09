<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kelolapembeli extends CI_Controller
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
// test
        $data['title'] = "Kelola Data Pembeli";
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
        $this->db->like('username', $data['keyword']);
        $this->db->from('konsumen');
        $config['total_rows'] = $this->db->count_all_results();

        $config['base_url'] = base_url('admin_kelolapembeli/index');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;
        // $config['url_segment'] = 3;

        // var_dump($this->session->all_userdata());die();

        // var_dump($config['total_rows']);die();

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['classes'] = $this->admin->get_limit_dataapembeli('konsumen', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        // $data['praktikans'] = $this->admin->getPraktikansAll()->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/listPembeli', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapus_pembeli($id)
    {

        $this->admin->delete('konsumen', ['id' => $id]);

        $this->session->set_flashdata('flash', 'Data Pembeli Berhasil Dihapus!');
        redirect('admin_kelolapembeli');
    }

    public function tambah_pembeli()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[konsumen.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[konsumen.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-error', "Error, Silahkan Periksa Data Tambah Admin Kembali!");
            redirect('admin_kelolapembeli');
        } else {

            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = [
                'nama' => $this->input->post('nama_lengkap'),
                'username' => $username,
                'email' => $email,
                'no_telp' => $no_hp,
                'password' => $password,
                'status_aktif' => 1,
            ];

            $this->admin->insert('konsumen', $data);

            $this->session->set_flashdata('flash', "Data Konsumen Berhasil Didaftarkan!");
            redirect('admin_kelolapembeli');
        }
    }

    public function edit($id)
    {

        $data['title'] = "Profil Konsumen";

        $data['info_pembeli'] = $this->admin->get_where('konsumen', ['id' => $id])->row_array();

        $username = $this->input->post('username');
        $email = $this->input->post('email');

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        // var_dump($data['info_admin']['nama_lengkap']);die();
        if ($data['info_pembeli']['username'] != $username && $data['info_pembeli']['email'] != $email) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[konsumen.username]', [
                'is_unique' => 'Username ini sudah digunakan!',
            ]);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[konsumen.email]', [
                'is_unique' => 'Email ini sudah digunakan!',
            ]);
        } elseif ($data['info_pembeli']['username'] != $username) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[konsumen.username]', [
                'is_unique' => 'Username ini sudah digunakan!',
            ]);
        } elseif ($data['info_pembeli']['email'] != $email) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[konsumen.email]', [
                'is_unique' => 'Email ini sudah digunakan!',
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/pembeli_profile', $data);
            $this->load->view('template/footer');
        } else {
            $this->updateProfile();
        }
    }

    public function updateProfile()
    {

        $nama_lengkap = $this->input->post('nama_lengkap');
        $id_konsumen = $this->input->post('id_konsumen');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $foto_bahan_lama = $this->input->post('foto_bahan');
        $foto_bahan_baru = $_FILES['file']['name'];

        $data_admin = [];

        // var_dump($foto_bahan_baru);die();

        if ($foto_bahan_baru) {

            $file = 'assets_arealama/img_profile/' . $foto_bahan_lama;

            $data_konsumen = [
                'nama' => $nama_lengkap,
                'username' => $username,
                'email' => $email,
                'no_telp' => $no_hp,
                'foto' => $this->_uploadFile($file, $foto_bahan_lama, $id_konsumen),
            ];

            // $this->session->set_userdata('foto', $data_konsumen['foto']);

        } else {
            $data_konsumen = [
                'nama' => $nama_lengkap,
                'username' => $username,
                'email' => $email,
                'no_telp' => $no_hp,
                'foto' => $foto_bahan_lama,
            ];
        }

        $this->admin->update('konsumen', $data_konsumen, ['id' => $id_konsumen]);
        // $this->admin->update('tb_user', $data_user, ['id_user' => $this->session->userdata('id_user')]);

        $this->session->set_flashdata('flash', 'Data Profil Berhasil Diubah!');

        redirect('admin_kelolapembeli/edit/' . $id_konsumen);
    }

    private function _uploadFile($file, $filelama, $id_konsumen)
    {

        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];
        $tmpName = $_FILES['file']['tmp_name'];

        // var_dump($namaFiles);die();

        if ($eror === 4) {

            $this->session->set_flashdata('flash-error', "Error upload");

            redirect("admin_kelolapembeli/edit/" . $id_konsumen);

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

            $this->session->set_flashdata('flash-error', "Yang kamu pilih mungkin bukan gambar?");

            redirect("admin_kelolapembeli/edit/" . $id_konsumen);

            return false;
        }

        if ($filelama == "user_default.png") {
            $namaFilesBaru = uniqid();
            $namaFilesBaru .= '.';
            $namaFilesBaru .= $ekstensiGambar;

            move_uploaded_file($tmpName, 'assets_arealama/img_profile/' . $namaFilesBaru);

            return $namaFilesBaru;
        } else {
            if (is_readable($file) && unlink($file)) {

                $namaFilesBaru = uniqid();
                $namaFilesBaru .= '.';
                $namaFilesBaru .= $ekstensiGambar;

                move_uploaded_file($tmpName, 'assets_arealama/img_profile/' . $namaFilesBaru);

                return $namaFilesBaru;
            }
        }
    }
}