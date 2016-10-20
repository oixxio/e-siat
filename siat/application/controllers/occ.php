<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Occ extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}
	public function index()
	{
		$this->load->model('occ_model');		
		$this->data['occ'] = $this->occ_model->getOcc();
		$this->load->view('commons/view_head');
		$this->load->view('view_occ', $this->data);
		$this->load->view('commons/view_footer');

	}
}