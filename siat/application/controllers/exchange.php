<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exchange extends CI_Controller {	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("data_model");

	}
	public function index()
	{

	}
	public function setMessage(){		
    	$from = $this->input->post("id_from");
    	$to = $this->input->post("id_to");
    	$mensaje = $this->input->post("mensaje");
    	$this->data_model->setMessage($from, $to, $mensaje);
    }
    public function getMessages(){
    	$from = $this->input->post("id_from");
    	$to = $this->input->post("id_to");
    	$ultimo = $this->input->post("ultimo");
    	echo json_encode($this->data_model->getMessages($from, $to, $ultimo));
    }
}
?>