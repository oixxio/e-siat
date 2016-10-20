<?php


class pacientesObrasocial extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->helper("url");
        $this->load->helper('form');

        $this->load->model("pacientes_model");
        $this->load->model("tratamiento_model");
        $this->load->model("notificaciones_model");
        $this->load->model("superusuario_model");
        
        $this->load->library("session");

        $this->data['data'] = $this->session->all_userdata();

        if(!isset($this->data['data']['tipoUsuario']))
            redirect(base_url()."index.php/login/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'paciente')
            redirect(base_url()."index.php/principalPaciente/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'especialista')
            redirect(base_url()."index.php/principalEspecialista/index");
        
        
        $this->data['notificaciones'] = $this->notificaciones_model->getNotificaciones($this->data['data']['idUsuario']);
        
        $this->data['scripts'] = array(
            "jquery" => base_url()."assets/js/jquery-1.9.1.min.js",
            "jqueryui" => base_url()."assets/js/jquery-ui-1.10.3.custom.min.js",
            "bootstrap" => base_url()."assets/js/bootstrap.js",
            "datatable" => base_url()."assets/js/jquery.dataTables.min.js",
            "choosen" => base_url()."assets/js/chosen.jquery.min.js",
            "fuelux" => base_url()."assets/js/fuelux/fuelux.spinner.min.js",
            "date-time" => base_url()."assets/js/date-time/bootstrap-datepicker.min.js",
            "timepicker" => base_url()."assets/js/date-time/bootstrap-timepicker.min.js",
            "dateranger" => base_url()."assets/js/date-time/daterangepicker.min.js",
            "color" => base_url()."assets/js/bootstrap-colorpicker.min.js",
            "knob" => base_url()."assets/js/jquery.knob.min.js",
            "autosize" => base_url()."assets/js/jquery.autosize-min.js",
            "inputlimiter" => base_url()."assets/js/jquery.inputlimiter.1.3.1.min.js",
            "maskedinput" => base_url()."assets/js/jquery.maskedinput.min.js",
            "calendar" => base_url()."assets/js/fullcalendar.min.js",
            "bootbox" => base_url()."assets/js/bootbox.min.js",
            "elements" => base_url()."assets/js/ace-elements.min.js",
            "underscore" => base_url()."assets/js/underscore-min.js",
            "ace" => base_url()."assets/js/ace.min.js"
        );
        
    }
    
    public function index(){
        $this->data['pacientes'] = $this->pacientes_model->getPacientesObraSocial($this->data['data']['idObraSocial']);
        $this->load->view("obrasocial/pacientes/principal", $this->data);
    }
    
    public function particular($id, $state = "0"){

	    $this->data['info'] = $this->pacientes_model->pacienteInfo($id);
        $this->data['tratamiento'] = $this->pacientes_model->pacienteTratamiento($id);
        $this->data['historial'] = $this->pacientes_model->getHistorial($id);
        $this->data['metricas'] = $this->tratamiento_model->getDosis($id);
        $this->data['state'] = $state;
        $this->data['idPaciente'] = $id;
        $this->data['files'] = $this->pacientes_model->getFiles($id);
        $this->data['prescripciones'] = $this->pacientes_model->getPrescripciones($id);
        $this->data['scripts']['CanvasJs'] = base_url()."assets/js/canvasjs.min.js";
        $this->data['dosisJson'] = $this->pacientes_model->pacienteDosisJson($id);
        $this->data['adherencia'] = $this->pacientes_model->getAdherencia($id);
        $this->data['score'] = $this->pacientes_model->getPruebas();
        $this->data['scoreResult'] = $this->pacientes_model->getScoreResult($id);
        $this->data['diana'] = $this->pacientes_model->get_articulaciones_diana($id);
        $this->data['obrasocial'] = $this->pacientes_model->getObraSocialPaciente($this->data['info']->idObraSocial);
        $this->data['droga'] = $this->superusuario_model->getDroga($this->data['tratamiento']['idTratamiento']);

        $this->load->view("obrasocial/pacientes/particular", $this->data);

    }

    public function setLote(){

        echo "asda";

        /*$month = $this->input->post("month");
        $year = $this->input->post("year");
        $lote = $this->input->post("lote");

        $this->pacientes_model->setLote($month, $year, $lote, $id);*/

        //redirect(base_url()."index.php/pacientesObrasocial/particular/".$id);
    }

    public function upload($id){

        echo "asdasdasda";

        $name = $this->data['data']['idUsuario'].$this->data['data']['nombreUsuario'].date('Y-m-d-H-i-s').".pdf";
        
        echo $name;

        /*$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '100000';
        $config['file_name'] = $name;

        $this->load->library('upload', $config);*/

        /*if (!$this->upload->do_upload()){

            $error = array('error' => $this->upload->display_errors());

            var_dump($error);

            redirect(base_url()."index.php/pacientesObraSocial/showProfile/".$id."/2");
        }else{
            $this->pacientes_model->doUplaod($id, $name );
            
            redirect(base_url()."index.php/pacientesObraSocial/showProfile/".$id."/1");
        }*/
    }

    public function test($id){

        $name = $this->data['data']['idUsuario'].$this->data['data']['nombreUsuario'].date('Y-m-d-H-i-s').".pdf";
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '100000';
        $config['file_name'] = $name;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){

            $error = array('error' => $this->upload->display_errors());

            var_dump($error);

            redirect(base_url()."index.php/pacientesObraSocial/showProfile/".$id."/2");
        }else{
            $this->pacientes_model->doUplaod($id, $name );
            
            redirect(base_url()."index.php/pacientesObraSocial/showProfile/".$id."/1");
        }

        echo $name;
    }

    
    
}


?>