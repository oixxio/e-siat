<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ofertas_dia_lista extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}
	public function index($idMayorista=0)
	{
		$this->load->model('ofertas_dia_lista_model');
		$this->data['productos'] = $this->ofertas_dia_lista_model->getOfertasDia($idMayorista);
		$this->load->view('commons/view_head');
		$this->load->view('view_ofertas_dia_lista', $this->data);
		$this->load->view('commons/view_footer');

	}
}