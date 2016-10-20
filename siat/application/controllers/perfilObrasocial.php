<?php

class perfilObrasocial extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->model("perfilobrasocial_model");
        $this->data['data'] = $this->session->all_userdata();
        $this->load->helper('form');
        
        if(!isset($this->data['data']['tipoUsuario']))
            redirect(base_url()."index.php/login/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'paciente')
            redirect(base_url()."index.php/principalPaciente/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'especialista')
            redirect(base_url()."index.php/principalEspecialista/index");
        
        $this->load->model("notificaciones_model");
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
            "elements" => base_url()."assets/js/ace-elements.min.js",
            "ace" => base_url()."assets/js/ace.min.js"
        );
        
    }
    
    public function index($state = 0){
        $this->data['perfil'] = $this->perfilobrasocial_model->getObrasocial($this->data['data']['idUsuario']);
        $this->data['state'] = $state;
        $this->load->view("obrasocial/perfil/principal", $this->data);
    }
    
    public function checkUserName(){
        echo $this->perfilobrasocial_model->checkUserName(
                $this->input->post("userName"),
                $this->input->post("actualUserName")
             );
    }
    
    public function actualizarData(){
        
        $telefonoPersonal = $this->input->post("telefonoPersonal");
        $telefonoOficina = $this->input->post("telefonoOficina");
        $lugarNacimiento= $this->input->post("lugarNacimiento");
        $titulo = $this->input->post("titulo");
        $telefonoCasa = $this->input->post("telefonoCasa");
        $genero = $this->input->post("genero");        
        $fechaNacimiento = $this->input->post("fechaNacimiento");
        $codigoPosta = $this->input->post("codigoPostal");
        $correoElectronico = $this->input->post("correoElectronico");
        $edad = $this->input->post("edad");
        $ciudad = $this->input->post("ciudad");
        $estado = $this->input->post("estado");
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $direccion = $this->input->post("direccion");
        
        $this->perfilobrasocial_model->actualizarData(
                $telefonoCasa, $telefonoPersonal, $telefonoOficina, $lugarNacimiento, $titulo,
                $genero, $fechaNacimiento, $codigoPosta, $correoElectronico, $edad, $ciudad, $estado, $nombre, $apellido, $direccion,  $this->data['data']['idUsuario']
                );
        
        redirect(base_url()."index.php/perfilObrasocial/index");
        
    }
    
    function updatePass(){
        
        $usuario = $this->input->post("nombreUsuario");
        $passViejo = $this->input->post("passAnterior");
        $passNuevo = $this->input->post("newPass");
        
        if($this->perfilobrasocial_model->updatePass($usuario, $passViejo, $passNuevo, $this->data['data']['idUsuario'])){
            redirect(base_url()."index.php/perfilObrasocial/index/1");
        }else{
            redirect(base_url()."index.php/perfilObrasocial/index/2");
        }
        
    }
    
    public function cambiarImagenPerfil(){
        
        $config['upload_path'] = './profilepicture/';
        $config['allowed_types'] = '*';
        $config['max_size']	= '10000';
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){
            redirect(base_url()."index.php/pacientes/showProfile/".$id."/2");
            echo  $this->upload->display_errors();
        }else{
            $data = $this->upload->data();
            $this->perfilobrasocial_model->doUpload($this->data['data']['idUsuario'], $data['file_name']);
            redirect(base_url()."index.php/perfilObrasocial");
        }
        
        
    }
    
}

?>
