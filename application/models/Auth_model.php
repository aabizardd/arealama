<?php

class Auth_model extends CI_model
{

    public function insert($table, $data)
    {

        return $this->db->insert($table, $data);

    }

}