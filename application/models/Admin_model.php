<?php

class Admin_model extends CI_model
{

    public function insert($table, $data)
    {

        return $this->db->insert($table, $data);
    }

    public function get($table)
    {

        return $this->db->get($table);
    }

    public function get_where($table, $wehre)
    {

        return $this->db->get_where($table, $wehre);
    }

    public function count_all_results($table)
    {

        return $this->db->count_all_rasdasesults($table);
    }

    public function get_limit($table, $limit, $start, $keyword = null)
    {

        if ($keyword) {
            $this->db->like('nama_barang', $keyword);
        }

        $this->db->order_by('id_barang', 'DESC');
        return $this->db->get($table, $limit, $start);
    }

    public function num_rows($table)
    {

        return $this->db->get($table)->num_rows();
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function update($table, $data, $where)
    {

        return $this->db->update($table, $data, $where);
    }

    // public function get_limit_kelas($table, $limit, $start, $keyword = null)
    // {

    //     // if ($keyword) {
    //     //     $this->db->like('nama_kelas', $keyword);
    //     // }

    //     // $this->db->order_by('nama_kelas', 'ASC');
    //     // return $this->db->get($table, $limit, $start);

    //     $this->db->select('*, count(id_praktikan) jml_praktikan');
    //     $this->db->from('tb_praktikan');
    //     $this->db->join('tb_kelas', 'tb_praktikan.id_kelas = tb_kelas.id_kelas', 'right');
    //     // $this->db->where('id_role', 1);
    //     if ($keyword) {
    //         $this->db->like('nama_kelas', $keyword);
    //     }
    //     $this->db->group_by('tb_kelas.id_kelas');
    //     $this->db->order_by('nama_kelas', 'ASC');
    //     $this->db->limit($limit, $start);

    //     return $this->db->get();
    // }

    // public function getPraktikansAll()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_praktikan');
    //     $this->db->join('tb_user', 'tb_praktikan.id_user = tb_user.id_user');
    //     $this->db->join('tb_kelas', 'tb_praktikan.id_kelas = tb_kelas.id_kelas', 'left');
    //     $this->db->where('id_role', 1);
    //     $this->db->order_by('nama_kelas', 'DESC');
    //     // $this->db->limit(2, 0);
    //     return $this->db->get();
    // }

    public function get_limit_dataadmin($table, $limit, $start, $keyword = null)
    {

        // if ($keyword) {
        //     $this->db->like('nama_lengkap', $keyword);
        // }

        // $this->db->order_by('id_admin', 'DESC');
        // return $this->db->get($table, $limit, $start);

        $this->db->select('*');
        $this->db->from('admin');
        // $this->db->join('tb_user', 'tb_admin.id_user = tb_user.id_user');
        // $this->db->where('id_role', 1);
        if ($keyword) {
            $this->db->like('username', $keyword);
        }

        $this->db->order_by('id_admin', 'DESC');
        $this->db->limit($limit, $start);

        return $this->db->get();
    }

    public function get_limit_dataapembeli($table, $limit, $start, $keyword = null)
    {

        // if ($keyword) {
        //     $this->db->like('nama_lengkap', $keyword);
        // }

        // $this->db->order_by('id_admin', 'DESC');
        // return $this->db->get($table, $limit, $start);

        $this->db->select('*');
        $this->db->from('konsumen');
        // $this->db->join('tb_user', 'tb_admin.id_user = tb_user.id_user');
        // $this->db->where('id_role', 1);
        if ($keyword) {
            $this->db->like('username', $keyword);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);

        return $this->db->get();
    }

    public function get_jml_pesanan($bulan, $tahun)
    {

        $this->db->select('count(id_transaksi) jml');
        $this->db->from('transaksi');
        $this->db->where('MONTH(tgl_transaksi)', $bulan);
        $this->db->where('YEAR(tgl_transaksi)', $tahun);

        return $this->db->get()->row_array();
    }

    // public function get_limit_praktikan($table, $limit, $start, $keyword = null, $id_kelas)
    // {

    //     // if ($keyword) {
    //     //     $this->db->like('nama_kelas', $keyword);
    //     // }

    //     // $this->db->order_by('nama_kelas', 'ASC');
    //     // return $this->db->get($table, $limit, $start);

    //     // $this->db->select('*');
    //     // $this->db->from('tb_praktikan');
    //     // $this->db->join('tb_user', 'tb_praktikan.id_user = tb_user.id_user');
    //     // // $this->db->where('id_role', 1);
    //     // if ($keyword) {
    //     //     $this->db->like('nama_lengkap', $keyword);
    //     // }

    //     // $this->db->where('id_kelas', $id_kelas);
    //     // $this->db->order_by('id_praktikan', 'DESC');
    //     // $this->db->limit($limit, $start);

    //     // return $this->db->get();

    //     if ($keyword) {
    //         $this->db->like('nama_lengkap', $keyword);
    //     }

    //     $this->db->where('id_kelas', $id_kelas);
    //     $this->db->order_by('id_praktikan', 'DESC');
    //     return $this->db->get($table, $limit, $start);
    // }

    // public function get_pengumpulan_tugas($id_praktikum)
    // {

    //     // SELECT * FROM tb_pengumpulan_tugas tpt JOIN tb_praktikum tp on(tpt.id_praktikum = tp.id_praktikum) RIGHT JOIN tb_praktikan tpk on(tpt.id_praktikan = tpk.id_praktikan)

    //     $this->db->select('*');
    //     $this->db->from('tb_pengumpulan_tugas tpt');
    //     $this->db->join('tb_praktikum tp', 'tpt.id_praktikum = tp.id_praktikum');
    //     $this->db->join('tb_praktikan tpk', 'tpt.id_praktikan = tpk.id_praktikan');
    //     $this->db->join('tb_kelas tk', 'tpk.id_kelas = tk.id_kelas');
    //     $this->db->join('tb_user tu', 'tpk.id_user = tu.id_user');
    //     $this->db->where('tpt.id_praktikum', $id_praktikum);
    //     $this->db->order_by('tk.id_kelas', 'DESC');
    //     // $this->db->limit(2, 0);
    //     return $this->db->get();
    // }

    // public function get_not_pengumpulan_tugas($data)
    // {

    //     // SELECT * FROM tb_pengumpulan_tugas tpt JOIN tb_praktikum tp on(tpt.id_praktikum = tp.id_praktikum) RIGHT JOIN tb_praktikan tpk on(tpt.id_praktikan = tpk.id_praktikan)

    //     // var_dump(count($data));die();

    //     $ct_data = count($data);

    //     $this->db->select('*');
    //     $this->db->from('tb_praktikan tpk');
    //     $this->db->join('tb_kelas tk', 'tpk.id_kelas = tk.id_kelas', 'left');
    //     $this->db->join('tb_user tu', 'tpk.id_user = tu.id_user');

    //     if ($ct_data > 0) {
    //         $this->db->where_not_in('tpk.id_praktikan', $data);
    //     }

    //     $this->db->order_by('tk.id_kelas', 'DESC');
    //     // $this->db->limit(2, 0);
    //     return $this->db->get();
    // }

    public function get_like($nama)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->like('link', $nama);

        return $this->db->get();
    }

    public function get_pesanan_konsumen($status = null)
    {
        $this->db->select('*');
        $this->db->from('transaksi tr');
        $this->db->join('konsumen ks', 'tr.id_konsumen = ks.id');
        $this->db->join('status_transaksi st', 'tr.status = st.id');

        if ($status != null) {

            $this->db->like('st.nama_status', $status);
        }

        return $this->db->get();
        // $this->db->like('link', $nama);
    }

    public function get_pesanan_barang($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('barang_checkout bc');
        $this->db->join('barang br', 'bc.id_barang = br.id_barang');
        $this->db->where('bc.id_transaksi', $id_transaksi);

        return $this->db->get();
        // $this->db->like('link', $nama);
    }
}