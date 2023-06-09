<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_Model');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$data['pertanyaan'] = $this->Auth_Model->GetPertanyaan();
		$this->load->view('register', $data);
	}
}
