<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kelolapesanan extends CI_Controller
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

        // $data[''] = "Kelola Data Pesanan";
        //load libraray

        $data = [
            'title' => "Kelola Data Pesanan",
            'transaksi' => $this->admin->get_pesanan_konsumen()->result(),
            'status_pesanan' => $this->db->get('status_transaksi')->result(),
        ];

        if ($this->input->get('status')) {
            $data['transaksi'] = $this->admin->get_pesanan_konsumen($this->input->get('status'))->result();
        }

        // $data['praktikans'] = $this->admin->getPraktikansAll()->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/listPesanan', $data);
        $this->load->view('template/footer', $data);
    }

    public function update_status_pesanan($id_transaksi, $status)
    {

        $data = [
            'status' => $status,
        ];

        $this->db->update('transaksi', $data, array('id_transaksi' => $id_transaksi));

        redirect('Admin_kelolapesanan');
    }

    public function detail_barang_pesanan($id_transaksi)
    {

        $data = [
            'title' => "Detail Data Pesanan",
            'transaksi' => $this->admin->get_pesanan_konsumen()->result(),
            'barangs' => $this->admin->get_pesanan_barang($id_transaksi)->result_array(),
        ];

        // $data['praktikans'] = $this->admin->getPraktikansAll()->result();

        $this->load->view('template/header', $data);
        $this->load->view('admin/detailPesanan', $data);
        $this->load->view('template/footer', $data);
    }
}