<?php

class Auth_Model extends CI_Model
{
    public function AddUser($nama, $email, $pass, $id_pertanyaan, $jawaban, $foto)
    {
        $data = array(
            'NAMA_USER' => $nama,
            'EMAIL_USER' => $email,
            'PASSWORD_USER' => $pass,
            'ID_PERTANYAAN' => $id_pertanyaan,
            'JAWABAN' => $jawaban,
            'FOTO_USER' => $foto,
            'CREATED_AT' => date('Y-m-d H:i:s')
        );
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    public function GetPertanyaan()
    {
        return $this->db->get('pertanyaan')->result_array();
    }
    public function GetUser($email)
    {
        $this->db->select('ID_USER,PASSWORD_USER');
        $this->db->where('EMAIL_USER', $email);
        return $this->db->get('user')->result_array();
    }
    public function UpdateLogin($id_user)
    {
        $this->db->set('LAST_ACCESS_AT', date('Y-m-d H:i:s'));
        $this->db->where('ID_USER', $id_user);
        $this->db->update('user');
    }
    public function CekPertanyaan($email)
    {
        $this->db->select('p.PERTANYAAN');
        $this->db->from('pertanyaan p');
        $this->db->join('user u', 'p.ID_PERTANYAAN=u.ID_PERTANYAAN');
        $this->db->where('u.EMAIL_USER', $email);
        return $this->db->get()->result_array();
    }
    public function CekJawaban($email)
    {
        $this->db->select('JAWABAN');
        $this->db->where('EMAIL_USER', $email);
        return $this->db->get('user')->result_array();
    }
    public function UpdatePass($pass, $email)
    {
        $data = array(
            'PASSWORD_USER' => $pass,
            'UPDATED_AT' => date('Y-m-d H:i:s')
        );
        $this->db->where('EMAIL_USER', $email);
        $this->db->update('user', $data);
    }
}
