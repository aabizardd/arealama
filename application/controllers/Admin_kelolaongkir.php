<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kelolaongkir extends CI_Controller
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

        $ongkirs = $this->db->get('ongkir')->result();

        $data = [
            'title' => "Kelola Ongkir (Admin)",
            'ongkirs' => $ongkirs,
        ];

        $this->load->view('template/header', $data);
        $this->load->view('admin/listOngkir', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_ongkir()
    {

        $provinsi = htmlspecialchars($this->input->post('provinsi'));
        $ongkir = htmlspecialchars($this->input->post('ongkir'));

        $data = [
            'provinsi' => $provinsi,
            'ongkir' => $ongkir,
        ];

        $this->db->insert('ongkir', $data);

        $this->session->set_flashdata('flash', "Data Ongkir Berhasil Ditambahkan!");

        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function hapus($id)
    {

        $this->db->delete('ongkir', ['id' => $id]);

        $this->session->set_flashdata('flash', "Data Ongkir Berhasil Dihapus!");

        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function update()
    {
        $provinsi = htmlspecialchars($this->input->post('provinsi'));
        $ongkir = htmlspecialchars($this->input->post('ongkir'));
        $id_ongkir = $this->input->post('id_ongkir');

        $data = [
            'provinsi' => $provinsi,
            'ongkir' => $ongkir,
        ];

        $where = [
            'id' => $id_ongkir,
        ];

        $this->db->update('ongkir', $data, $where);

        $this->session->set_flashdata('flash', "Data Ongkir Berhasil Diupdate!");

        redirect($_SERVER["HTTP_REFERER"]);
    }
}