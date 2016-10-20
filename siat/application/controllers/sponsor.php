<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sponsor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}
	public function index($idEmpresa = 0)
	{

		$this->load->model('sponsor_model');
		$this->data['idEmpresa'] = $idEmpresa;
		$this->data['comunicado'] = $this->sponsor_model->getComunicado($idEmpresa);
		$this->data['logo'] = $this->sponsor_model->getLogo($idEmpresa);
		$this->data['marcas'] = $this->sponsor_model->getMarcas($idEmpresa);
		$this->data['idUsuario_empresa'] = $this->sponsor_model->getEmpresa($idEmpresa);
		$this->data['idUsuario_distribuidor'] = $this->sponsor_model->getDistribuidor($idEmpresa);

		$this->load->view('commons/view_head');
		$this->load->view('view_sponsor', $this->data);
		$this->load->view('commons/view_footer');
	}
}