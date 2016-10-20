<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa extends CI_Controller {	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}
	public function index($idUsuarioEmpresa = 0)
	{
		$idUsuario = $this->data['userData']['id'];
		//$idUsuario = 5;
		$this->load->model('empresa_model');	
		$this->data['mensajes'] = $this->empresa_model->getMensajes($idUsuario,$idUsuarioEmpresa);	
		$this->data['empresa'] = $this->empresa_model->getEmpresa($idUsuarioEmpresa);
		$this->load->view('commons/view_head');
		$this->load->view('view_empresa', $this->data);
		$this->load->view('commons/view_footer');
	}
}