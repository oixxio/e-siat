<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('session_model');
		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
		$this->load->model('producto_model');
	}
	public function index($idProducto = 0)
	{
		//$this->data['idEmpresa'] = $idEmpresa;
		$this->data['producto'] = $this->producto_model->getProducto($idProducto);

		$this->load->view('commons/view_head');
		$this->load->view('view_producto', $this->data);
		$this->load->view('commons/view_footer');
	}
	public function comprar($idProducto,$cantidad)
	{
		$this->producto_model->carrito($idProducto,$cantidad,$this->data['userData']['id']);
		redirect(base_url('index.php/producto/index/'.$idProducto));
	}
}