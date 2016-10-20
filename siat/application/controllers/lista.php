<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lista extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}
	public function index($idUsuario=0)
	{
		$this->load->model('lista_model');
		$this->data['idUsuario_mayorista'] = $this->lista_model->getMayorista($idUsuario);		
		$this->data['productos'] = $this->lista_model->getProductos($idUsuario);
		$this->load->view('commons/view_head');
		$this->load->view('view_lista', $this->data);
		$this->load->view('commons/view_footer');

	}
}