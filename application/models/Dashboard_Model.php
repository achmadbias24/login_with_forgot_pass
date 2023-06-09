<?php

class Dashboard_Model extends CI_Model
{
    public function GetIdentity($id_user)
    {
        $this->db->select('NAMA_USER, EMAIL_USER, FOTO_USER');
        $this->db->where('ID_USER', $id_user);
        return $this->db->get('user')->result_array();
    }
}
