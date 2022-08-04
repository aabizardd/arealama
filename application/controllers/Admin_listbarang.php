<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_listbarang extends CI_Controller
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
        }
    }

    public function index()
    {

        $data['title'] = "List Modul Praktikum";
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
        $this->db->like('nama_barang', $data['keyword']);
        $this->db->from('barang');
        $config['total_rows'] = $this->db->count_all_results();

        $config['base_url'] = base_url('admin_listbarang/index');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['moduls'] = $this->admin->get_limit('barang', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/listBarang', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail_barang($id)
    {
        $data['title'] = "Detail Barang";
        $id = $this->uri->segment(2);
        $where = ['id_barang' => $id];
        $data['detail_barang'] = $this->admin->get_where('barang', $where)->row_array();

        // var_dump($data['detail_barang']['nama_barang']);die();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('deskripsi_lainnya', 'Deskripsi Lainnya', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

        // $this->form_validation->set_rules('judul_praktikum', 'Judul Praktikum', 'required');
        // $this->form_validation->set_rules('praktikum_ke', 'Praktikum Berapa', 'required');
        // $this->form_validation->set_rules('tujuan_praktikum', 'Tujuan Praktikum', 'required');
        // $this->form_validation->set_rules('tanggal_deadline', 'Tanggal Deadline', 'required');
        // $this->form_validation->set_rules('jam_deadline', 'Jam Deadline', 'required');
        // $this->form_validation->set_rules('materi_praktikum', 'Materi Praktikum', 'required');

        // $data['modul_praktikum'] = $this->admin->get('barang')->result();

        // $data['bahan_praktikum'] = $this->admin->get_where('tb_bahan_praktikum', $where_2)->result();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/detailBarang', $data);
            $this->load->view('template/footer');
        } else {
            $this->update_barang();
        }
    }

    public function update_barang()
    {

        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $deskripsi_lainnya = $this->input->post('deskripsi_lainnya');
        $link = $this->input->post('link');
        $foto_bahan_lama = $this->input->post('foto_bahan');
        $foto_bahan_baru = $_FILES['file']['name'];
        $id_barang = $this->input->post('id_barang');

        $harga = str_replace("Rp", "", $harga);
        $harga = str_replace(".", "", $harga);
        $harga = (int) $harga;

        // var_dump($harga);die();

        $data = [];

        if ($foto_bahan_baru) {

            $file = 'assets_praktikum/img_bahan_modul/' . $foto_bahan_lama;

            $data = [
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'stok' => $stok,
                'deskripsi_lainnya' => $deskripsi_lainnya,
                'link' => $link,
                'foto_barang' => $this->_uploadFile($id_barang, $file),
            ];
        } else {

            $data = [
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'stok' => $stok,
                'deskripsi_lainnya' => $deskripsi_lainnya,
                'link' => $link,
                'foto_barang' => $foto_bahan_lama,
            ];
        }

        // $data = [
        //     'judul_bahan' => $judul_bahan,
        //     'keterangan_bahan' => $keterangan_bahan,
        //     'foto_bahan' => $foto_bahan,
        // ];

        $where = ['id_barang' => $id_barang];

        $this->admin->update('barang', $data, $where);

        $this->session->set_flashdata('flash', "Data Barang Arealama Berhasil Diubah");

        redirect("detail_barang/$id_barang");
    }

    private function _uploadFile($id_barang, $file)
    {

        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];
        $tmpName = $_FILES['file']['tmp_name'];

        // var_dump($namaFiles);die();

        if ($eror === 4) {

            $this->session->set_flashdata('flash-error', "Error upload");

            redirect("detail_barang/$id_barang");

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

            $this->session->set_flashdata('flash-error', "Yang kamu pilih mungkin bukan gambar?");

            redirect("detail_modul/$id_barang");

            return false;
        }

        if (is_readable($file) && unlink($file)) {

            $namaFilesBaru = "barang";
            $namaFilesBaru .= uniqid();
            $namaFilesBaru .= '.';
            $namaFilesBaru .= $ekstensiGambar;

            move_uploaded_file($tmpName, 'assets_praktikum/img_bahan_modul/' . $namaFilesBaru);

            return $namaFilesBaru;
        }
    }

    public function updateaDataModul($id)
    {

        $judul_praktikum = $this->input->post('judul_praktikum');
        $praktikum_ke = $this->input->post('praktikum_ke');
        $tujuan_praktikum = $this->input->post('tujuan_praktikum');
        $materi_praktikum = $this->input->post('materi_praktikum');
        $tanggal_deadline = $this->input->post('tanggal_deadline');
        $jam_deadline = $this->input->post('jam_deadline');

        $data = [
            'judul_praktikum' => $judul_praktikum,
            'praktikum_ke' => $praktikum_ke,
            'tujuan_praktikum' => $tujuan_praktikum,
            'materi_praktikum' => $materi_praktikum,
            'deadline_tanggal' => $tanggal_deadline,
            'deadline_jam' => $jam_deadline,
        ];

        $where = ['id_praktikum' => $id];

        $this->asprak->update('tb_praktikum', $data, $where);

        $this->session->set_flashdata('flash', "Data Praktikum Berhasil Diubah");

        redirect("Admin_listmodul/detail_modul/$id");
    }

    public function hapus_barang($id)
    {

        $where = ["id_barang" => $id];

        $this->admin->delete("barang", $where);

        $this->session->set_flashdata("flash", "Data Barang Berhasil Dihapus!");

        redirect('Admin_listbarang');
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