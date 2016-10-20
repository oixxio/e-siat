<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url("index.php/login"));
	}
	public function index()
	{
		$this->load->view('commons/view_head');
		$this->load->view('view_index',$this->data);
		$this->load->view('commons/view_footer');
	}
}