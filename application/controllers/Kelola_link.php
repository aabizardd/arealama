<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_link extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Admin_model', "admin");

    }

    public function index($kodebarang)
    {

        $data['link'] = $this->admin->get_like($kodebarang)->row_array();

        $this->load->view('link/index', $data);

        // var_dump($data_barang);die();

    }
}