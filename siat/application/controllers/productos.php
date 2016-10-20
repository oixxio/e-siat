<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}
	public function index($idMarca = 0)
	{
		$this->load->model('productos_model');		
		$this->data['productos'] = $this->productos_model->getProductos($idMarca);	
		$this->load->view('commons/view_head');
		$this->load->view('view_productos', $this->data);
		$this->load->view('commons/view_footer');
	}
}