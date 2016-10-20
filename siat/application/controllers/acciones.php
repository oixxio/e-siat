<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acciones extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');

		$this->load->model(Array(
			'session_model',
			'acciones_model'
		));

		$this->load->library(Array(
			'parser'
		));

		if(!$this->session_model->acceso($this->data))
			redirect(base_url('index.php/login'));
	}

	public function index()
	{
		
		$this->data['imagen'] = $this->parser->parse('template/actions/imagen', 
			Array( "imagenes" => $this->acciones_model->getFotos()), TRUE);

		/*$this->data['imagen_tiempo'] = $this->parser->parse('template/actions/imagen_tiempo', 
			Array( "imagenes_tiempo" => $this->acciones_model->getFotosTiempo()), TRUE);*/

		$this->data['cuestionario'] = $this->parser->parse('template/actions/cuestionario', 
			Array( "cuestionarios" => $this->acciones_model->getCuestionarios()), TRUE);	

		$this->load->view('commons/view_head');
		$this->load->view('view_acciones', $this->data);
		$this->load->view('commons/view_footer');

	}

	public function cuestionario ($id) {
		$this->load->view('commons/view_head');
		$this->parser->parse('modules/actions/cuestionario', $this->acciones_model->getQuestionaire ($id) );
		$this->load->view('commons/view_footer');
	}

	public function usuario_cuestionario($id){
		$this->acciones_model->usuario_cuestionario(
			$this->input->post("pregunta"),
			$this->data['userData']['id'],
			$id
		);
		redirect(base_url()."index.php/acciones/index");
	}

	public function foto ($id) {
		$this->load->view('commons/view_head');
		$this->parser->parse('modules/actions/foto', $this->acciones_model->getPicture ($id) );
		$this->load->view('commons/view_footer');
	}


	public function usuario_foto ($id) {

		var_dump($_POST);

		$config['upload_path'] = './upload/foto/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10000';
        $config['file_name'] = round(microtime(true) * 1000)."_".$this->data['userData']['id'] ;
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){
            echo  $this->upload->display_errors();
            redirect(base_url()."index.php/acciones/index");
        }else{
            $data = $this->upload->data();
            $this->acciones_model->usuario_foto(
				$this->data['userData']['id'],
				$id,
				$data['file_name']
			);
			redirect(base_url()."index.php/acciones/index");
        }
		
	}

}