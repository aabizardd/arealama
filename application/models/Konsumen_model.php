<?php

class Konsumen_model extends CI_model
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

    public function get_cart_detail($id_user)
    {

        // SELECT * FROM tb_pengumpulan_tugas tpt JOIN tb_praktikum tp on(tpt.id_praktikum = tp.id_praktikum) RIGHT JOIN tb_praktikan tpk on(tpt.id_praktikan = tpk.id_praktikan)

        $this->db->select('*');
        $this->db->from('cart c');
        $this->db->join('barang b', 'c.id_barang = b.id_barang');
        $this->db->where('c.id_konsumen', $id_user);
        return $this->db->get()->result_array();
    }

    public function total_cart($id_user)
    {

        // SELECT * FROM tb_pengumpulan_tugas tpt JOIN tb_praktikum tp on(tpt.id_praktikum = tp.id_praktikum) RIGHT JOIN tb_praktikan tpk on(tpt.id_praktikan = tpk.id_praktikan)

        $this->db->select('sum(qty * harga) total');
        $this->db->from('cart c');
        $this->db->join('barang b', 'c.id_barang = b.id_barang');
        $this->db->where('c.id_konsumen', $id_user);
        return $this->db->get()->row_array();
    }

    public function get_transaction_detail($id_user)
    {

        // SELECT * FROM tb_pengumpulan_tugas tpt JOIN tb_praktikum tp on(tpt.id_praktikum = tp.id_praktikum) RIGHT JOIN tb_praktikan tpk on(tpt.id_praktikan = tpk.id_praktikan)

        $this->db->select('*');
        $this->db->from('barang_checkout c');
        $this->db->join('barang b', 'c.id_barang = b.id_barang');
        $this->db->join('transaksi t', 'c.id_transaksi = t.id_transaksi');
        $this->db->where('t.id_konsumen', $id_user);
        return $this->db->get()->result_array();
    }

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


}