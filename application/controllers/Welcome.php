<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Admin_model', 'admin');

        // var_dump($this->session->all_userdata());die();

    }
    public function index()
    {

        $data['barang'] = $this->db->get('barang')->result();

        // var_dump($data['barang']);die();

        $this->load->view('arealama_template/header', $data);
        $this->load->view('arealama/index', $data);
        $this->load->view('arealama_template/footer');
    }

    public function shop()
    {

        $this->load->view('arealama_template/header');
        $this->load->view('arealama/shop');
        $this->load->view('arealama_template/footer');
    }

    public function basket()
    {

        $this->load->view('arealama_template/header');
        $this->load->view('arealama/basket');
        $this->load->view('arealama_template/footer');
    }

    public function resi()
    {

        $data['barang'] = $this->db->get('barang')->result();
        $kurirs = [
            'JNE', 'Pos Indonesia', 'JNT', 'SiCepat', 'TIKI', 'AnterAja', 'Wahana', 'Ninja', 'Lion', 'JET Express', 'PCP Express', 'REX Express', 'First Logistics', 'ID Express', 'Shopee Express',
        ];

        $data['kurirs'] = $kurirs;
        // var_dump($data['barang']);die();

        $this->load->view('arealama_template/header', $data);
        $this->load->view('arealama/resi', $data);
        $this->load->view('arealama_template/footer');
    }

    public function order()
    {
        $this->load->view('arealama_template/header');
        $this->load->view('arealama/order');
        $this->load->view('arealama_template/footer');
    }
}