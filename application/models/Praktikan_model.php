<?php

class Praktikan_model extends CI_model
{

    public function get_where($table, $where)
    {

        return $this->db->get_where($table, $where);

    }

    public function get($table)
    {
        return $this->db->get_where($table);
    }

    public function getDetailInfoPraktikan()
    {
        $this->db->select('*');
        $this->db->from('tb_praktikan');
        $this->db->join('tb_user', 'tb_praktikan.id_user = tb_user.id_user');
        $this->db->join('tb_kelas', 'tb_praktikan.id_kelas = tb_kelas.id_kelas', 'left');
        $this->db->where('tb_praktikan.id_user', $this->session->userdata('id_user'));
        return $this->db->get();

    }

    public function update($table, $data, $where)
    {

        return $this->db->update($table, $data, $where);
    }

    public function count_all_results($table)
    {

        return $this->db->count_all_results($table);
    }

    public function get_limit($table, $limit, $start, $keyword = null)
    {

        // if ($keyword) {
        //     $this->db->like('judul_praktikum', $keyword);
        // }

        // $this->db->order_by('id_praktikum', 'DESC');
        // return $this->db->get($table, $limit, $start);

        $this->db->select('*');
        $this->db->from('tb_praktikum tp');
        $this->db->join('tb_pengumpulan_tugas tg', 'tp.id_praktikum = tg.id_praktikum', 'left');
        // $this->db->where('id_role', 1);
        if ($keyword) {
            $this->db->like('judul_praktikum', $keyword);
        }

        $this->db->order_by('tp.id_praktikum', 'DESC');
        $this->db->limit($limit, $start);

        return $this->db->get();
    }

    public function insert($table, $data)
    {

        return $this->db->insert($table, $data);

    }

    public function get_limit_modul($table, $limit, $start, $keyword = null)
    {

        if ($keyword) {
            $this->db->like('judul_praktikum', $keyword);
        }

        $this->db->order_by('id_praktikum', 'DESC');
        return $this->db->get($table, $limit, $start);
    }

}