<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kelolaadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Admin_model', 'asprak');

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

        $data['title'] = "Kelola Admin (Asprak)";
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
        $data['classes'] = $this->asprak->get_limit_dataadmin('admin', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        // $data['praktikans'] = $this->asprak->getPraktikansAll()->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/listAdmin', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapus_admin($id)
    {

        $this->asprak->delete('user', ['id_user' => $id]);

        $this->session->set_flashdata('flash', 'Data Admin Berhasil Dihapus!');
        redirect('admin_kelolaadmin');
    }

    public function tambah_admin()
    {

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[tb_user.nim]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-error', "Error, Silahkan Periksa Data Tambah Admin Kembali!");
            redirect('admin_kelolaadmin');
        } else {

            $nim = $this->input->post('nim');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = [
                'nim' => $nim,
                'email' => $email,
                'password' => $password,
                'id_role' => 2,
                'status_active' => 1,
            ];

            $this->asprak->insert('tb_user', $data);

            $asprak_baru = $this->asprak->get_where('tb_user', ['nim' => $data['nim']])->row_array();

            $data_upd = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
            ];

            $this->asprak->update('admin', $data_upd, ['id_user' => $asprak_baru['id_user']]);

            $this->session->set_flashdata('flash', "Data Admin Berhasil Didaftarkan!");
            redirect('admin_kelolaadmin');
        }
    }
}