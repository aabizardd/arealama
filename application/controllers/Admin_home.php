<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Admin_model');

        if (!$this->session->userdata('id_admin')) {
            redirect('auth');
        }

        // $info_asprak = $this->Asprak_model->get_where('tb_admin', ['id_user' => $this->session->userdata('id_user')])->row_array();

        // // var_dump($info_asprak['foto_profile']);die();
        // $this->session->set_userdata('foto_profile', $info_asprak['foto_profile']);

        // var_dump($this->session->userdata('foto_profile'));die();

    }

    public function index()
    {

        $data['title'] = "Admin Home";
        $data['test'] = "hello";
        $data['jml_barang'] = $this->db->get('barang')->num_rows();

        // $data['jumlah_praktikan'] = $this->Asprak_model->count_all_results('tb_praktikan');
        // $data['jumlah_modul'] = $this->Asprak_model->count_all_results('tb_praktikum');
        // $data['jumlah_kelas'] = $this->Asprak_model->count_all_results('tb_kelas');

        $this->load->view('template/header', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('template/footer');
    }

    public function logout()
    {

        $this->session->sess_destroy();

        // $this->session->unset_userdata('email');
        // $this->session->unset_userdata('nim');
        // $this->session->unset_userdata('id_role');
        // $this->session->unset_userdata('id_user');
        // $this->session->unset_userdata('foto_profile');

        redirect('auth');
    }
}