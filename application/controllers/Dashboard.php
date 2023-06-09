<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_Model');
    }
    public function index()
    {
        if ($this->session->userdata('ID_USER')) {
            $data['user'] = $this->Dashboard_Model->GetIdentity($this->session->userdata('ID_USER'));
            $this->load->view('dashboard', $data);
        } else {
            redirect('welcome');
        }
    }
}
