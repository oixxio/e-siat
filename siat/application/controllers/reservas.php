<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('session_model');
    $this->load->model('reservas_model');
    if(!$this->session_model->acceso($this->data))
      redirect(base_url('index.php/login'));
  }
  
  public function index($idMayorista = 0)
  {

    $this->data['compras'] = $this->reservas_model->getCarrito($this->data['userData']['id']);

    $this->load->view('commons/view_head');
    $this->load->view('view_reservas', $this->data);

  }

  public function updateReserva($id, $cant){
    $this->reservas_model->updateReserva($id, $cant);
  }

  public function deleteReserva($id){
    $this->reservas_model->deleteReserva($id);
  }

  public function pendientes($idMayorista = 0)
  { 

    $this->data['compras'] = $this->reservas_model->getCarritoPendiente($this->data['userData']['id']);

    $this->load->view('commons/view_head');
    $this->load->view('view_reservas_pendientes', $this->data);

  }

    public function confirmadas($idMayorista = 0)
  {

    $this->data['compras'] = $this->reservas_model->getCarritoConfirmado($this->data['userData']['id']);

    $this->load->view('commons/view_head');
    $this->load->view('view_reservas_confirmadas', $this->data);

  }

  public function createCompras(){
    $this->reservas_model->createCompras($this->data['userData']['supermercado']->id);
    redirect(base_url()."index.php/reservas/pendientes");
  }

}