<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');
    }
    public function register()
    {
        $this->form_validation->set_rules('nama_depan', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required|alpha_numeric|min_length[8]');
        $this->form_validation->set_rules('repass', 'Perulangan Password', 'required|alpha_numeric|matches[pass]');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
        $pertanyaan = $this->input->post('pertanyaan');
        $foto = $this->input->post('foto');
        if ($this->form_validation->run() == FALSE && $pertanyaan = "Pilih Pertanyaan" && $foto == null) {
            $this->session->set_flashdata('pertanyaan', 'Pertanyaan field must be choosen');
            $this->session->set_flashdata('foto', 'Foto field must be uploaded');
            $data['pertanyaan'] = $this->Auth_Model->GetPertanyaan();
            $this->load->view('register', $data);
        } else {
            $nama_depan = $this->input->post('nama_depan');
            $nama_belakang = $this->input->post('nama_belakang');
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $pertanyaan = $this->input->post('pertanyaan');
            $jawaban = $this->input->post('jawaban');
            $nama = $nama_depan . ' ' . $nama_belakang;


            //proses foto
            $config['upload_path']          = './assets/foto';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = "Foto_" . $nama;
            $config['overwrite']            = true;
            $config['max_size']             = 2048; // 2MB
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $uploaded_foto = $this->upload->data();
                $id_user = $this->Auth_Model->AddUser($nama, $email, md5($pass), $pertanyaan, $jawaban, $uploaded_foto['orig_name']);
                $this->session->set_flashdata('berhasil', 'berhasil buat akun');
                redirect('welcome');
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('gagal', $error);
                $data['pertanyaan'] = $this->Auth_Model->GetPertanyaan();
                $this->load->view('register', $data);
            }
        }
    }
    public function login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $cek_data = $this->Auth_Model->GetUser($email);

        if (!empty($cek_data)) {
            if ($cek_data[0]['PASSWORD_USER'] == md5($pass)) {
                $this->Auth_Model->UpdateLogin($cek_data[0]['ID_USER']);
                $sessionUser = array(
                    'ID_USER' => $cek_data[0]['ID_USER']
                );
                $this->session->set_userdata($sessionUser);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Password Salah!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>      
            ');
                redirect('welcome');
            }
        } else {
            $this->session->set_flashdata('error', '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Email Tidak Ditemukan! Silakan Registrasi Terlebih Dahulu.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>      
          ');
            redirect('welcome');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
    public function forgot()
    {
        $this->load->view('pertanyaan');
    }
    public function CekPertanyaan()
    {
        $email = $this->input->post('email');
        $data = $this->Auth_Model->CekPertanyaan($email);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function CekJawaban()
    {
        $jawaban = $this->input->post('jawaban');
        $data['email'] = $this->input->post('email');
        $cek = $this->Auth_Model->CekJawaban($data['email']);
        if ($jawaban == $cek[0]['JAWABAN']) {
            $this->load->view('reset', $data);
        } else {
            $this->session->set_flashdata('jawaban', 'Jawaban Tidak Sesuai. Mohon cek kembali jawaban Anda!');
            $this->load->view('pertanyaan');
        }
    }
    public function reset()
    {
        $this->form_validation->set_rules('pass', 'Password', 'required|alpha_numeric|min_length[8]');
        $this->form_validation->set_rules('repass', 'Perulangan Password', 'required|alpha_numeric|matches[pass]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('reset');
        } else {
            $pass = md5($this->input->post('pass'));
            $email = $this->input->post('email');
            $this->Auth_Model->UpdatePass($pass, $email);
            $this->session->set_flashdata('reset', 'Reset Password Berhasil. Silakan Login!');
            redirect('welcome');
        }
    }
}
