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
            'all_package' => $paket,
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
            'id_konsumen' => $id_konsumen,
        ];

        $isAlreadyIn = $this->db->get_where('cart', $where1)->num_rows();
        $dataCart = $this->db->get_where('cart', $where1)->row_array();

        if ($isAlreadyIn >= 1) {

            $where = [
                'id_konsumen' => $id_konsumen,
                'id_barang' => $id_barang,
            ];

            $data = [
                'qty' => $dataCart['qty'] + 1,
            ];

            $this->konsumen->update('cart', $data, $where);
        } else {

            $data = [
                'id_barang' => $id_barang,
                'id_konsumen' => $id_konsumen,
            ];

            $this->db->insert('cart', $data);
        }

        redirect('shop');
    }

    public function checkout()
    {

        $id_konsumen = $this->session->userdata('id_konsumen');

        $cart = $this->konsumen->get_cart_detail($id_konsumen);

        $total = $this->konsumen->total_cart($id_konsumen);

        // $data_cart =

        $ongkir = $this->db->get('ongkir')->result();

        $data = [
            'carts' => $cart,
            'total_cart' => $total,
            'ongkir' => $ongkir,
            'transaksi' => $this->db->get_where('transaksi', ['id_konsumen' => $id_konsumen])->result(),
        ];

        $this->load->view('arealama_template/header');
        $this->load->view('arealama/checkout', $data);
        $this->load->view('arealama_template/footer');
    }

    public function kirim_pembayaran()
    {
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $pil_alamat = $this->input->post('pil_alamat');

        $alamat = $pil_alamat == "baru" ? $this->input->post('alamat_new') : $this->input->post('alamat_lama');

        $no_hp = $this->input->post('no_hp');
        $bukti_bayar = $this->_upload();
        $id_konsumen = $this->session->userdata('id_konsumen');
        $total = $this->konsumen->total_cart($id_konsumen);

        $data_transaksi = [
            'id_konsumen' => $id_konsumen,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'total' => $total['total'],
            'bukti_bayar' => $bukti_bayar,
        ];

        $this->db->insert('transaksi', $data_transaksi);
        $id_transaksi = $this->db->insert_id();

        $cart = $this->konsumen->get_cart_detail($id_konsumen);

        foreach ($cart as $c) {

            $data = [
                'id_barang' => $c['id_barang'],
                'qty' => $c['qty'],
                'id_transaksi' => $id_transaksi,
            ];

            $this->db->insert('barang_checkout', $data);
        }

        $this->db->delete('cart', array('id_konsumen' => $id_konsumen));

        $flahdata = $this->alert('Berhasil!', 'success', 'Pesanan kamu sedang diproses');

        $this->session->set_flashdata('message', $flahdata);

        // redirect('checkout');
        redirect('shop');

        // var_dump($nama_belakang);
        // die();
    }

    private function _upload()
    {

        $namaFiles = $_FILES['bukti_bayar']['name'];
        $ukuranFile = $_FILES['bukti_bayar']['size'];
        $type = $_FILES['bukti_bayar']['type'];
        $eror = $_FILES['bukti_bayar']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['bukti_bayar']['tmp_name'];

        if ($eror === 4) {
            $flahdata = $this->alert('Maaf!', 'danger', 'Belum memilih gambar');

            $this->session->set_flashdata('message', $flahdata);

            redirect('checkout');
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

        $ekstensiGambar = explode('.', $namaFiles);

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $flahdata = $this->alert('Maaf!', 'danger', 'Yang kamu pilih bukan gambar!');
            $this->session->set_flashdata('message', $flahdata);

            redirect('checkout');
            return false;
        }

        $namaFilesBaru = "materi";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets_arealama/img/bukti_bayar/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    public function alert($kata_depan = "", $warna = "", $isi = "")
    {

        $alert = '<div class="alert alert-' . $warna . ' alert-dismissible fade show" role="alert">
        <strong>' . $kata_depan . '</strong> ' . $isi . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

        return $alert;
    }

    public function history_pesanan()
    {

        $id_konsumen = $this->session->userdata('id_konsumen');

        // var_dump($id_konsumen);
        // die();

        $transaksi = $this->konsumen->get_transaction_detail($id_konsumen);

        $data = [
            'transaksi' => $transaksi,
        ];

        $this->load->view('arealama_template/header');
        $this->load->view('arealama/history_pesanan', $data);
        $this->load->view('arealama_template/footer');
    }

    public function detail_produk($id_barang)
    {

        $barangs = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
        $barangs_ex = $this->db->get_where('barang', ['id_barang !=' => $id_barang])->result_array();

        $data = [
            'barangs' => $barangs,
            'barangs_ex' => $barangs_ex,
        ];

        $this->load->view('arealama_template/header');
        $this->load->view('arealama/detail_produk', $data);
        $this->load->view('arealama_template/footer');
    }
}