<?php


class pacientes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("pacientes_model");
        $this->load->model("superusuario_model");
        $this->load->helper("url");
        $this->load->library("session");
        $this->data['data'] = $this->session->all_userdata();
        $this->load->helper('form');
        
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
            "underscore" => base_url()."assets/js/underscore-min.js",
            "ace" => base_url()."assets/js/ace.min.js"
        );
        
    }
    
    public function index(){
        $this->data['scripts']['list'] = base_url()."assets/js/modules/pacientes/list.js";
        $this->data['pac'] = $this->pacientes_model->getP();
        $this->load->view("pacientes/principal", $this->data);
    }
    
    
    public function addPaciente(){
        $this->pacientes_model->addPaciente();
        redirect(base_url()."index.php/pacientes/index");
    }
    
    public function delPaciente($id){
        $this->pacientes_model->delPaciente($id);
        redirect(base_url()."index.php/pacientes/index");
    }
    
    
    public function getJson(){
        $iDisplayDir = $this->input->post("iSortDir_0");
        $columns = explode(",", $this->input->post("sColumns"));
        $iDisplayBy = $columns[$this->input->post("iSortCol_0")];
        $sSearch = $this->input->post("sSearch");
        $iDisplayOffset = $this->input->post("iDisplayStart");
        $iDisplayLength = $this->input->post("iDisplayLength");
        $_DATA = $this->pacientes_model->getJson(
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
        $result = $this->pacientes_model->getJsonFrom_Id($id);
        echo json_encode($result);
    }
    
    function editPaciente($id){
        $this->pacientes_model->editPaciente($id);
        redirect(base_url()."index.php/pacientes/index");
    }
    
    function showProfile($id, $state = "0"){
        
        $this->data['info'] = $this->pacientes_model->pacienteInfo($id);
        $this->data['tratamiento'] = $this->pacientes_model->pacienteTratamiento($id);
        $this->data['historial'] = $this->pacientes_model->getHistorial($id);
		$this->load->model("tratamiento_model");
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
        $this->data['drogas'] = $this->superusuario_model->getAllDrugs();
        
        $this->load->view("pacientes/pacienteInfo" , $this->data);
    }
 
    function crearPaciente(){
        $this->data['obrasocial'] = $this->pacientes_model->getObraSocial();
        $this->load->view("pacientes/crearPaciente", $this->data);
    }
    
    public function crearPacienteCargar(){
        $this->pacientes_model->addPacienteData($this->data['data']['idEspecialista']);
        redirect(base_url()."index.php/pacientes/index");
    }
    
    function addHistorial($id){
        $fecha = $this->input->post("fecha");
        $observacion = $this->input->post("observacion");
        
        $this->pacientes_model->crearHistoria($id, $fecha, $observacion);
        
        redirect(base_url()."index.php/pacientes/showProfile/".$id);
        
    }
    
    public function eliminarPaciente($id){
        $this->pacientes_model->eliminarPaciente($id);
        redirect(base_url()."index.php/pacientes/index");
    }
    
    public function upload($id){
        
        $nameO = $_FILES['userfile']['name']; // get file name from form
        $fileNameParts   = explode( '.', $nameO ); // explode file name to two part
        $fileExtension   = end( $fileNameParts ); // give extension
        
        
        $name = $this->data['data']['idUsuario'].$this->data['data']['nombreUsuario'].date('Y-m-d-H-i-s').".".$fileExtension;
        //echo $name;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|gif|jpg|png';
        $config['max_size']	= '100000';
        $config['file_name'] = $name;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){
            redirect(base_url()."index.php/pacientes/showProfile/".$id."/2");
        }else{
            $this->pacientes_model->doUplaod($id, $name );
            
            
            $this->notificaciones_model->notificationWithIdPaciente($this->data['data']['idUsuario'], $id,
                   "Nuevo archivo de historial Medico", "index.php/perfilMedico/index", "icon-file");
            redirect(base_url()."index.php/pacientes/showProfile/".$id."/1");
        }
    }
    
/*
    public function uploadSuper($id){

        $this->load->library('upload');

        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);

        for($i=0; $i<$cpt; $i++)
        {
            $nameO = $files['userfile']['name'][$i]; // get file name from form           
           
            $fileNameParts   = explode( '.', $nameO ); // explode file name to two part
            $fileExtension   = end( $fileNameParts ); // give extension

            $name = $this->data['data']['idUsuario'].$this->data['data']['nombreUsuario'].date('Y-m-d-H-i-s')."-".$i.".".$fileExtension;
            //echo $name;  


            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    


            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|gif|jpg|png';
            $config['max_size'] = '100000';
            $config['file_name'] = $name;

            $images[] = $name;
           //var_dump($_FILES); echo "<br>";
           //var_dump($_FILES['userfile']); echo "<br>";
           
            if (!$this->upload->do_upload('images[]')){
                
                $m=2;
            }
            else{
                $this->pacientes_model->doUplaod($id, $name );
                      
                $this->notificaciones_model->notificationWithIdPaciente($this->data['data']['idUsuario'], $id,
                   "Nuevo archivo de historial Medico", "index.php/perfilMedico/index", "icon-file");
                
                $m=1;
            } 
           
        }
         redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$id."/".$m);


        


    }
*/  
    
    public function uploadSuper($id){
        
        $nameO = $_FILES['userfile']['name']; // get file name from form
        $fileNameParts   = explode( '.', $nameO ); // explode file name to two part
        $fileExtension   = end( $fileNameParts ); // give extension
        
        
        $name = $this->data['data']['idUsuario'].$this->data['data']['nombreUsuario'].date('Y-m-d-H-i-s').".".$fileExtension;
        //echo $name;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|gif|jpg|png';
        $config['max_size'] = '100000';
        $config['file_name'] = $name;

        $this->load->library('upload', $config);
        //var_dump($_FILES); echo "<br>";
        //var_dump($_FILES['userfile']); echo "<br>";
       if (!$this->upload->do_upload()){
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$id."/2");
        }else{
            $this->pacientes_model->doUplaod($id, $name );
            
            
            $this->notificaciones_model->notificationWithIdPaciente($this->data['data']['idUsuario'], $id,
                   "Nuevo archivo de historial Medico", "index.php/perfilMedico/index", "icon-file");
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$id."/1");
        }  
        
    }
    
    
    public function borrarArchivo($id, $idArchivo){
        
        $this->pacientes_model->borrarArchivo($idArchivo);
        redirect(base_url()."index.php/pacientes/showProfile/".$id."/1");
        
    }
    public function borrarArchivoSuper($id, $idArchivo){
        
        $this->pacientes_model->borrarArchivo($idArchivo);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$id."/1");
        
    }
    
    function reformularTratamiento($idTratamiento, $idPaciente){
        
        switch ($this->input->post("form-field-radio")){
            case "dias" : 
                $this->pacientes_model->reformularTratamientoDias($idTratamiento, Array(
                    "lunes" => $this->input->post("lunes") == "on" ? 1 : 0,
                    "martes" => $this->input->post("martes") == "on" ? 1 : 0,
                    "miercoles" => $this->input->post("miercoles") == "on" ? 1 : 0,
                    "jueves" => $this->input->post("jueves") == "on" ? 1 : 0,
                    "viernes" => $this->input->post("viernes") == "on" ? 1 : 0,
                    "sabado" => $this->input->post("sabado") == "on" ? 1 : 0,
                    "domingo" => $this->input->post("domingo") == "on" ? 1 : 0
                ), $this->input->post("startingDay"),$this->input->post("startingHour"));
                break;
            case "horas" : 
                $this->pacientes_model->reformularTratamientoHoras($idTratamiento, $this->input->post("horas")
                        , $this->input->post("startingDay"),$this->input->post("startingHour"));
                break;
        }
        
        $this->notificaciones_model->notificationWithIdPaciente($this->data['data']['idUsuario'], $idPaciente,
                   "Tratamiento Reformulado", "index.php/perfilMedico/index", "icon-calendar");
        
        redirect(base_url()."index.php/pacientes/showProfile/".$idPaciente);
        
    }
    
    
    function nuevaReceta($id){
        
        $this->pacientes_model->nuevaReceta(
                $id,
                $this->input->post("cantidadUI"),
                $this->input->post("descripcion"),
                $this->input->post("fecha"),
                $this->input->post("hora")
                );
        
        $this->notificaciones_model->notificationWithIdPaciente($this->data['data']['idUsuario'], $id,
                   "Nueva receta formulada", "index.php/prescripcionesPaciente/index", "icon-list-alt");
        
        redirect(base_url()."index.php/pacientes/showProfile/".$id);
    }
    
    public function cargarAdherencia($id){
        $this->pacientes_model->cargarAdherencia(
                $id,
                $this->input->post("respuesta1"),
                $this->input->post("respuesta2"),
                $this->input->post("respuesta3"),
                $this->input->post("respuesta4"),
                $this->input->post("respuesta5")
        );
        redirect(base_url()."index.php/pacientes/showProfile/".$id);
    }
    
    public function cargarScoreClinico($id){
        $this->pacientes_model->cargarScoreClinico($id);
        redirect(base_url()."index.php/pacientes/showProfile/".$id);
    }

    public function editarPacienteInfo($id){
        $this->pacientes_model->editarPacienteInfo($id);
        redirect(base_url()."index.php/pacientes/showProfile/".$id);
    }

    public function setLote($id){

        $month = $this->input->post("month");
        $year = $this->input->post("year");
        $lote = $this->input->post("lote");

        $this->pacientes_model->setLote($month, $year, $lote, $id);

        redirect(base_url()."index.php/pacientes/showProfile/".$id);
    }

    public function setLoteO($id){

        $month = $this->input->post("month");
        $year = $this->input->post("year");
        $lote = $this->input->post("lote");

        $this->pacientes_model->setLote($month, $year, $lote, $id);

        redirect(base_url()."index.php/pacientesObrasocial/particular/".$id);
    }

}