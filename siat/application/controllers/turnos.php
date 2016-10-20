<?php


class turnos extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("turnos_model");
        $this->load->helper("url");
        $this->load->library("session");
        $this->data['data'] = $this->session->all_userdata();
        
        if(!isset($this->data['data']['tipoUsuario']))
            redirect(base_url()."index.php/login/index");
        if(isset($this->data['data']['tipoUsuario']) && $this->data['data']['tipoUsuario'] == 'paciente')
            redirect(base_url()."index.php/principalPaciente/index");
        
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
            "calendar" => base_url()."assets/js/fullcalendar.min.js",
            "bootbox" => base_url()."assets/js/bootbox.min.js",
            "elements" => base_url()."assets/js/ace-elements.min.js",
            "ace" => base_url()."assets/js/ace.min.js"
        );
    }
    
    public function index(){
        
        $this->data['scripts']['list'] = base_url()."assets/js/modules/turnos/list.js";
        
        $this->load->model("pacientes_model");
        $this->data['pac'] = $this->pacientes_model->getP();

        $this->data['turnos'] = json_encode($this->turnos_model->getTurnos());
        $this->load->view("turnos/todosLosTurnos", $this->data);
        
    }
    
    public function testTurnos(){echo json_encode($this->turnos_model->getTurnos());}
    
    public function addTurno($id = 0){
        if($id == 0) $id = $this->input->post("idPaciente");
        $this->turnos_model->addTurno();
        $this->notificaciones_model->notificationWithIdPaciente($this->data['data']['idUsuario'], $id,
                   "Nuevo Turno", "index.php/turnosPaciente/index", "icon-calendar");
        redirect(base_url()."index.php/turnos/listaTurnosPaciente/".$id);
    }
    
    public function delTurno($id){
        $this->turnos_model->delTurno($id);
        redirect(base_url()."index.php/turnos/index");
    }
    
    public function getJson(){
        $iDisplayDir = $this->input->post("iSortDir_0");
        $columns = explode(",", $this->input->post("sColumns"));
        $iDisplayBy = $columns[$this->input->post("iSortCol_0")];
        $sSearch = $this->input->post("sSearch");
        $iDisplayOffset = $this->input->post("iDisplayStart");
        $iDisplayLength = $this->input->post("iDisplayLength");
        $_DATA = $this->turnos_model->getJson(
                    $sSearch,
                    $iDisplayBy,
                    $iDisplayDir,
                    $iDisplayOffset,
                    $iDisplayLength
                );
        
        echo json_encode(array(
            "aaData" => $_DATA['data'],
            "sEcho" => intval((isset($_POST['sEcho']) ? $_POST['sEcho'] : 1)),
            "iTotalRecords" => $_DATA['total'],
            "iTotalDisplayRecords" => $_DATA['total_filter']
         ));
    }
    
    function getJsonFromId($id){
        $result = $this->turnos_model->getJsonFrom_Id($id);
        echo json_encode($result);
    }
    
    function editTurno($id){
        $this->turnos_model->editTurno($id);
        redirect(base_url()."index.php/turnos/index");
    }    
    
    public function listaTurnosPaciente($id){
        
        $this->data['turnos'] = $this->turnos_model->getTurnosPaciente($id);
        $this->data['id'] = $id;
        
        $this->load->view("turnos/principal", $this->data);
    }
    
}


?>