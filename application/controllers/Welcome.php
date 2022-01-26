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
        $this->load->model('Konsumen_model', 'konsumen');

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

    public function cart()
    {

        $id_konsumen = $this->session->userdata('id_konsumen');

        $cart = $this->konsumen->get_cart_detail($id_konsumen);

        // var_dump($cart);
        // die();

        $data = [
            'carts' => $cart
        ];



        $this->load->view('arealama_template/header', $data);
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

    public function update_cart()
    {


        $id_cart = $this->input->post('id_cart');
        $qty = $this->input->post('qty');

        // $foto_bahan = ;

        foreach ($id_cart as $key => $value) {

            $where = [
                'id' => $value,
            ];

            $data = [
                'qty' => $qty[$key]
            ];

            // var_dump($qty[$key]);
            // die();

            $this->konsumen->update('cart', $data, $where);
        }

        // $this->session->set_flashdata('flash', "Bahan Praktikum Berhasil Ditambahkan!");

        redirect('cart');
    }

    public function delete_cart($id)
    {
        $where = [];
        $this->konsumen->delete('cart', $where);


        redirect('cart');
    }
}