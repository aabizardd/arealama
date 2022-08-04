<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_tambahbarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Admin_model', 'admin');

        // var_dump($this->session->all_userdata());die();

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
        $data['title'] = "Tambah Data Paket Barang";

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('deskripsi_lainnya', 'Deskripsi Lainnya', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        // var_dump("PKT-" . bin2hex($bytes));die();

        // $data['modul_praktikum'] = $this->Asprak_model->get('tb_praktikum')->result();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/tambahBarang', $data);
            $this->load->view('template/footer');
        } else {
            $this->tambahDataPaket();
        }
    }

    public function tambahDataPaket()
    {
        $random_string = random_bytes(5);

        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $deskripsi_lainnya = $this->input->post('deskripsi_lainnya');
        $link = $this->input->post('link');
        $foto_barang = $this->_uploadFile();

        $harga = str_replace("Rp", "", $harga);
        $harga = str_replace(".", "", $harga);
        $harga = (int) $harga;

        // var_dump($jam_deadline);die();

        $data = [
            'kode_barang' => "PKT-" . bin2hex($random_string),
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'stok' => $stok,
            'deskripsi_lainnya' => $deskripsi_lainnya,
            'foto_barang' => $foto_barang,
            'link' => $link,
        ];

        $this->admin->insert('barang', $data);

        $this->session->set_flashdata('flash', "Data Barang Berhasil Ditambahkan!");

        redirect('Admin_tambahbarang');
    }

    private function _uploadFile()
    {
        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['file']['tmp_name'];

        if ($eror === 4) {
            $flahdata = $this->alert('Maaf', 'danger', 'Gagal Mengunggah Gambar!');

            $this->session->set_flashdata('alert', $flahdata);

            redirect('admin_tambahbarang');
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

        $ekstensiGambar = explode('.', $namaFiles);

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $flahdata = $this->alert('Maaf', 'danger', 'Ada File yang Kamu Upload Bukan Gambar!');

            $this->session->set_flashdata('alert', $flahdata);

            redirect('admin_tambahbarang');
            return false;
        }

        $namaFilesBaru = "barang";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets_praktikum/img_bahan_modul/' . $namaFilesBaru);

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
}