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

        $data['jml_user'] = $this->db->get('konsumen')->num_rows();
        $data['jml_admin'] = $this->db->get('admin')->num_rows();

        $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';

        $bulan_substr = substr($bulan, 0, 3);

        $data['bulan_graph'] = $bulan;

        $year = date("Y");
        $data['tahun'] = $year;

        $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // var_dump($data['bulan'][12 - 1]);die();

        $data_pesanan = [
            'jan' => $this->Admin_model->get_jml_pesanan(1, $year),
            'feb' => $this->Admin_model->get_jml_pesanan(2, $year),
            'mar' => $this->Admin_model->get_jml_pesanan(3, $year),
            'apr' => $this->Admin_model->get_jml_pesanan(4, $year),
            'mei' => $this->Admin_model->get_jml_pesanan(5, $year),
            'jun' => $this->Admin_model->get_jml_pesanan(6, $year),
            'jul' => $this->Admin_model->get_jml_pesanan(7, $year),
            'agu' => $this->Admin_model->get_jml_pesanan(8, $year),
            'sep' => $this->Admin_model->get_jml_pesanan(9, $year),
            'okt' => $this->Admin_model->get_jml_pesanan(10, $year),
            'nov' => $this->Admin_model->get_jml_pesanan(11, $year),
            'des' => $this->Admin_model->get_jml_pesanan(12, $year),
        ];

        if ($bulan != "") {

            $data['bulan_new'] = $data['bulan'][$bulan - 1];

            // var_dump($data['bulan_new']);die();

            $data['bulan_graphh'] = [
                $this->Admin_model->get_jml_pesanan($bulan, $year),
            ];

            // var_dump($data['bulan_graphh']);die();

        }

        // $data['jumlah_praktikan'] = $this->Asprak_model->count_all_results('tb_praktikan');
        // $data['jumlah_modul'] = $this->Asprak_model->count_all_results('tb_praktikum');
        // $data['jumlah_kelas'] = $this->Asprak_model->count_all_results('tb_kelas');

        $this->load->view('template/header', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('template/footer');
        $this->load->view('graph/graph_area_bulanan', $data_pesanan);
    }

    public function logout()
    {

        $this->session->sess_destroy();

        // $this->session->unset_userdata('email');
        // $this->session->unset_userdata('nim');
        // $this->session->unset_userdata('id_role');
        // $this->session->unset_userdata('id_user');
        // $this->session->unset_userdata('foto_profile');

        redirect('auth_admin');
    }
}