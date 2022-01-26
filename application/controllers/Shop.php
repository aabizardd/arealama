<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('Konsumen_model', 'konsumen');
    }


    public function index()
    {

        $paket = $this->db->get("barang")->result_array();

        $data = [
            'all_package' => $paket
        ];

        $this->load->view('arealama_template/header', $data);
        $this->load->view('arealama/shop');
        $this->load->view('arealama_template/footer');
    }

    public function add_to_chart($id_barang)
    {

        $id_konsumen = $this->session->userdata('id_konsumen');

        //cek apakah barang terkait sudah ada di cart? jika ada, tambahkan qty nya saja

        $where1 = [
            'id_barang' => $id_barang,
            'id_konsumen' => $id_konsumen
        ];

        $isAlreadyIn = $this->db->get_where('cart', $where1)->num_rows();
        $dataCart = $this->db->get_where('cart', $where1)->row_array();


        if ($isAlreadyIn >= 1) {

            $where = [
                'id_konsumen' => $id_konsumen,
                'id_barang' => $id_barang
            ];

            $data = [
                'qty' => $dataCart['qty'] + 1,
            ];

            $this->konsumen->update('cart', $data, $where);
        } else {

            $data = [
                'id_barang' => $id_barang,
                'id_konsumen' => $id_konsumen
            ];

            $this->db->insert('cart', $data);
        }

        redirect('shop');
    }
}