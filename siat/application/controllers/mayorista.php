<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mayorista extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}
	public function index($idMayorista = 0)
	{

		$this->load->model('mayorista_model');
	
		$this->data['idMayorista'] = $idMayorista;
		$this->data['logo'] = $this->mayorista_model->getLogo($idMayorista);
		$this->data['comunicado'] = $this->mayorista_model->getComunicado($idMayorista);
		
		$this->data['idUsuario_mayorista'] = $this->mayorista_model->getMayorista($idMayorista);
		$this->data['idUsuario_sucursal'] = $this->mayorista_model->getSucursal($idMayorista);

		$this->load->view('commons/view_head');
		$this->load->view('view_mayorista', $this->data);
		$this->load->view('commons/view_footer');



	}
}