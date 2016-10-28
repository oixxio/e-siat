<?php

class principalSuperAdmin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->model("superusuario_model");
		$this->load->model("multimedia_model");
        $this->load->model("notificaciones_model");
        $this->load->model("pacientes_model");

        $this->data['data'] = $this->session->all_userdata();

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
            "ace" => base_url()."assets/js/ace.min.js",
			"canvas" => base_url()."assets/js/canvasjs.min.js"
        );

        $this->data['permiso'] = $this->superusuario_model->permission(
            $this->data['data']['tipoUsuario'],
            $this->uri->segment(2)
        );

        if(!isset($this->data['data']['tipoUsuario'])){
            redirect(base_url()."index.php/login/index");
        }
        
        $this->data['all_permiso'] = $this->superusuario_model->get_all_permisions(
            $this->data['data']['tipoUsuario']
        );

    }

    public function index(){

        if(!isset($this->data['permiso']->perm) || $this->data['permiso']->perm == 0){
            redirect(base_url()."index.php/principalSuperAdmin/index");
        }
 
        
		$this->data["videos"] = $this->multimedia_model->getVideos();
    	$this->load->view("superusuario/principal", $this->data);
    }

    public function pdf(){

        if(!isset($this->data['permiso']->perm) || $this->data['permiso']->perm == 0){
            redirect(base_url()."index.php/principalSuperAdmin/index");
        }

		$this->data["pdf"] = $this->multimedia_model->getPdf();
    	$this->load->view("superusuario/pdf", $this->data);
    }

    public function listarPacientes($patologia = 1, $state = 0, $dFilter = NULL){

        if(!isset($this->data['permiso']->perm) || $this->data['permiso']->perm == 0){
            redirect(base_url()."index.php/principalSuperAdmin/index");
        }

    	$this->data['pacientes'] = $this->superusuario_model->getPacientes($dFilter, $patologia);
		$this->data['especialista'] = $this->superusuario_model->getEspecialistas();
        $this->data['obrasocial'] = $this->superusuario_model->getObraSocials();
		$this->data['metricas'] = $this->superusuario_model->getMetricasGenerales($dFilter);
        $this->data['state'] = $state;
        $this->data['iDate'] = $dFilter;		
		$this->data['patologia'] = $patologia;
    	$this->load->view("superusuario/pacientes", $this->data);
    }
	
	public function listarEspecialistas(){

        if(!isset($this->data['permiso']->perm) || $this->data['permiso']->perm == 0){
            redirect(base_url()."index.php/principalSuperAdmin/index");
        }

		$this->data['especialista'] = $this->superusuario_model->getEspecialistas();
    	$this->load->view("superusuario/especialistas", $this->data);
	}

    public function desactivar($idUsuario){
    	$this->superusuario_model->desactivar($idUsuario);
    	redirect(base_url()."index.php/principalSuperAdmin/listarPacientes/1");
    }

    public function activar($idUsuario){
    	$this->superusuario_model->activar($idUsuario);
    	redirect(base_url()."index.php/principalSuperAdmin/listarPacientes/1");
    }
	
	public function desactivarEspecialista($idUsuario){
    	$this->superusuario_model->desactivar($idUsuario);
    	redirect(base_url()."index.php/principalSuperAdmin/listarEspecialistas");
    }

    public function activarEspecialista($idUsuario){
    	$this->superusuario_model->activar($idUsuario);
    	redirect(base_url()."index.php/principalSuperAdmin/listarEspecialistas");
    }

    public function eliminar($idUsuario){
    	$this->superusuario_model->eliminar($idUsuario);
    	redirect(base_url()."index.php/principalSuperAdmin/listarPacientes/1");
    }
	
    public function getPacientesJson(){
    	echo json_encode($this->superusuario_model->getPacientesJson());
    }
	
	public function changeEspecialista($idPaciente){
		$this->superusuario_model->changeEspecialista(
			$idPaciente, 
			$this->input->post("especialista")
		);
		redirect(base_url()."index.php/principalSuperAdmin/listarPacientes");
	}
	
	public function addEspecialista(){
	
		$params = Array(
			"usuario" => $this->input->post("usuario"),
			"contrasenia" => $this->input->post("contrasenia"),
			"nombre" => $this->input->post("nombre"),
			"apellido" => $this->input->post("apellido"), 
			"ciudad" => $this->input->post("ciudad"),
			"pais" => $this->input->post("pais"),
			"tel_personal" => $this->input->post("tel_personal"),
			"tel_hogar" => $this->input->post("tel_hogar"),
			"tel_oficina" => $this->input->post("tel_oficina"),
			"cod_postal" => $this->input->post("cod_postal"),
			"email" => $this->input->post("email")
		);
		
		$this->superusuario_model->addEspecialista($params);
		
		redirect(base_url()."index.php/principalSuperAdmin/listarEspecialistas");
	
	}
	
	public function editarEspecialista($id){
		
		$params = Array(
			"usuario" => $this->input->post("usuario"),
			"nombre" => $this->input->post("nombre"),
			"apellido" => $this->input->post("apellido"), 
			"ciudad" => $this->input->post("ciudad"),
			"pais" => $this->input->post("pais"),
			"tel_personal" => $this->input->post("tel_personal"),
			"tel_hogar" => $this->input->post("tel_hogar"),
			"tel_oficina" => $this->input->post("tel_oficina"),
			"cod_postal" => $this->input->post("cod_postal"),
			"email" => $this->input->post("email")
		);
		
		$this->superusuario_model->editarEspecialista($params, $id);
		
		redirect(base_url()."index.php/principalSuperAdmin/listarEspecialistas");
		
	}
	
	public function get_especialista_json($id){
		echo json_encode($this->superusuario_model->get_especialista_json($id));
	}
	
	public function defaultPassE($id){
		$this->superusuario_model->defaultPass($id, "siat123");
		redirect(base_url()."index.php/principalSuperAdmin/listarEspecialistas");
	}
	
	public function defaultPassP($id){
		$this->superusuario_model->defaultPass($id, $this->input->post("newpassw"));
		redirect(base_url()."index.php/principalSuperAdmin/listarPacientes/1");
	}

	public function defaultPassO($id){
		$this->superusuario_model->defaultPass($id, "siat123");
		redirect(base_url()."index.php/principalSuperAdmin/obraSocial");
	}

	public function subirPDF(){
        
        $config['upload_path'] = './archivos/pdf/';
        $config['allowed_types'] = '*';
        $config['max_size']	= '10000';
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){
            redirect(base_url()."index.php/principalSuperAdmin/pdf/");
            echo  $this->upload->display_errors();
        }else{
            $data = $this->upload->data();
            $this->load->model("multimedia_model");
            $this->multimedia_model->addPDF( $data['file_name'], $this->input->post("name") );
            redirect(base_url()."index.php/principalSuperAdmin/pdf/");
        }
        
    }

    public function obraSocial(){
    	$this->data['obrasocial'] = $this->superusuario_model->getObraSocial();
    	$this->load->view("superusuario/obrasocial", $this->data);
    }

    public function agregarObraSocial(){
    	$this->superusuario_model->agregarObraSocial();
    	redirect(base_url()."index.php/principalSuperAdmin/obraSocial");
    }

    public function eliminarObraSocial($id){
    	$this->superusuario_model->eliminarObraSocial($id);
    	redirect(base_url()."index.php/principalSuperAdmin/obraSocial");
    }

    public function perfil(){
        $this->load->view("superusuario/perfil", $this->data);
    }

    public function cambiarImagenPerfil($idPaciente){
        
        $config['upload_path'] = './profilepicture/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10000';
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){
            //redirect(base_url()."index.php/principalSuperAdmin/perfil");
            echo  $this->upload->display_errors();
        }else{
            $data = $this->upload->data();
            
           $this->superusuario_model->doUpload($idPaciente, $data['file_name']);
           
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
        }
        
        
    }

    function updatePass(){
        
        $usuario = $this->input->post("nombreUsuario");
        $passViejo = $this->input->post("passAnterior");
        $passNuevo = $this->input->post("newPass");
        
        if($this->superusuario_model->updatePass($usuario, $passViejo, $passNuevo, $this->data['data']['idUsuario'])){
            redirect(base_url()."index.php/principalSuperAdmin/perfil");
        }
        
    }

    public function pacienteProfile($id, $state = "0"){

    	$this->load->model(Array(
    		"pacientes_model",
    		"tratamiento_model",
            "historia_clinica_model",

    	));

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
        $this->data['drogas'] = $this->superusuario_model->getAllDrugs($id);
        $this->data['cantMes'] = $this->pacientes_model->getGraficoBarrasMesCantDosis($this->data['tratamiento']['idTratamiento']);
		$this->data['last_month'] = $this->superusuario_model->last_tratamiento($this->data['tratamiento']['idTratamiento']);
        
        $this->data['historia_principal'] = $this->historia_clinica_model->getPrincipal($id);
        $this->data['historia_observaciones'] = $this->historia_clinica_model->getObservaciones($id);
        $this->data['historia_evolucion'] = $this->historia_clinica_model->getEvolucion($id);
        $this->data['historia_examen'] = $this->historia_clinica_model->getExamen($id);
        
        $this->data['archivos'] = $this->historia_clinica_model->getArchivos($id);
        $this->data['reintegros'] = $this->historia_clinica_model->getReintegros($id);

        $this->data['str'] = true;
    	$this->load->view("superusuario/pacienteInfo", $this->data);
    }


    public function logs(){
        
        if(!isset($this->data['permiso']->perm) || $this->data['permiso']->perm == 0){
            redirect(base_url()."index.php/principalSuperAdmin/index");
        }

        $desc = $this->input->post("desc");
        $usr = $this->input->post("usr");

        $pacientes = $this->superusuario_model->get_all_patients();

        $this->data['logs'] = $this->superusuario_model->get_logs($desc, $usr);

        $this->load->view('superusuario/logs', $this->data);

    }

    public function eliminarDosis($idPaciente){
        $this->superusuario_model->eliminarDosis($idPaciente);
        redirect(base_url()."index.php/principalSuperAdmin/listarPacientes/".$idPaciente);
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
        
        redirect(base_url()."index.php/principalSuperAdmin/listarPacientes/".$idPaciente);
        
    }

    public function editarPacienteInfo($id){
        $this->pacientes_model->editarPacienteInfo($id);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$id);
    }

    function setHistoriaPrincipal($idPaciente){
        $this->load->model("historia_clinica_model");
        $this->historia_clinica_model->setPrincipal(
                $idPaciente,
                $this->input->post("obraSocial"),
                $this->input->post("plan"),
                $this->input->post("nroAfiliado"),
                $this->input->post("valido"),
                $this->input->post("nombrePaciente"),
                $this->input->post("fechaNac"),
                $this->input->post("nacionalidad"),
                $this->input->post("edad"),
                $this->input->post("sexo"),
                $this->input->post("estadoCivil"),
                $this->input->post("direccion"),
                $this->input->post("barrio"),
                $this->input->post("codigoPostal"),
                $this->input->post("ciudad"),
                $this->input->post("provincia"),
                $this->input->post("telefono1"),
                $this->input->post("telefono2"),
                $this->input->post("emailPaciente"),
                $this->input->post("patologia"),
                $this->input->post("medicoCabecera"),
                $this->input->post("telefonoMedico"),
                $this->input->post("factor"),
                $this->input->post("cantidadUI"),
                $this->input->post("compuesto"),
                $this->input->post("tipo1"),
                $this->input->post("tipo2")
            );
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente); 
    }

    function setHistoriaObservaciones($idPaciente){
        $this->load->model("historia_clinica_model");
        $this->historia_clinica_model->setObservaciones(
                $idPaciente,
                $this->input->post("obs_txt"),
                $this->input->post("referencias_txt"),
                $this->input->post("altura"),
                $this->input->post("peso"),
                $this->input->post("peso_normal")
            );
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }
    function setHistorico($idPaciente){
        $this->load->model("historia_clinica_model");
        $this->historia_clinica_model->setHistorico(
            $idPaciente,
            $this->input->post("historia_medica_txt"),
            $this->input->post("nro_consulta"),
            $this->input->post("alergiasRadio"),
            $this->input->post("alergiaDesc"),
            $this->input->post("diabetesRadio"),
            $this->input->post("diabetesDesc"),
            $this->input->post("respiratoriosRadio"),
            $this->input->post("respiratoriosDesc"),
            $this->input->post("circulatoriosRadio"),
            $this->input->post("circulatoriosDes"),
            $this->input->post("cirugiasRadio"),
            $this->input->post("cirugiasDes"),
            $this->input->post("medicamentosRadio"),
            $this->input->post("medicamentosDes")
        );
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }
    function setHistoriaEvolucion($idPaciente){
        $this->load->model("historia_clinica_model");
        $this->historia_clinica_model->setEvolucion(
            $idPaciente,
            $this->input->post("dolencia_txt"),
            $this->input->post("historico_enfermedad_txt")
        );
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }
    function setHistoriaExamen($idPaciente){


        $config['upload_path'] = './uploads/examenes';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|txt';
        $config['max_size'] = '10000';
        $config['file_name'] = $idPaciente."-".$this->input->post("tipo_examen")."-" . date("d") . "-" . date("m") . "-" . date("Y");
     

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
           
            $this->load->model("historia_clinica_model");
            $this->historia_clinica_model->setExamen(
                $idPaciente,
                $this->input->post("tipo_examen"),
                $this->input->post("dolencia_txt"),
                ''
            );
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);      

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
           
           

            $this->load->model("historia_clinica_model");
            $this->historia_clinica_model->setExamen(
                $idPaciente,
                $this->input->post("tipo_examen"),
                $this->input->post("dolencia_txt"),
                $data["upload_data"]["file_name"]
            );
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);      
              
        }
    }


    function setArchivos($idPaciente, $tipo){

        $original_name = $_FILES["userfile"]['name'];
        $config['upload_path'] = './uploads/archivos';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|txt';
        $config['max_size'] = '10000';
        $config['file_name'] = $idPaciente."-".$tipo."-" . date("d") . "-" . date("m") . "-" . date("Y");
     

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
           
            $this->load->model("historia_clinica_model");
            $this->historia_clinica_model->setArchivo(
                $tipo,
                $idPaciente,
                $this->input->post("observaciones_txt"),
                '',
                ''                
            );
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);      

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
           
            $this->load->model("historia_clinica_model");
            $this->historia_clinica_model->setArchivo(
                $tipo,
                $idPaciente,
                $this->input->post("observaciones_txt"),
                $data["upload_data"]["file_name"],
                $original_name
            );
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);      
              
        }
    }

    function setFactura($idPaciente){

        $nro = $this->input->post("id_fac");

        $original_name = $_FILES["userfile"]['name'];
        $config['upload_path'] = './uploads/reintegro/facturas';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|txt';
        $config['max_size'] = '10000';
        $config['file_name'] = $idPaciente."-".$nro."-" . date("d") . "-" . date("m") . "-" . date("Y");
     

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
           
            $this->load->model("historia_clinica_model");
            $this->historia_clinica_model->setFactura(
                $idPaciente,
                $nro,
                '',
                ''                
            );
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);      

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
           
            $this->load->model("historia_clinica_model");
            $this->historia_clinica_model->setFactura(
                $idPaciente,
                $nro,
                $data["upload_data"]["file_name"],
                $original_name
            );
            redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);      
              
        }
    }

    function nuevaReceta($id){
        
        $this->pacientes_model->nuevaReceta(
                $id,
                $this->input->post("cantidadUI"),
                $this->input->post("descripcion"),
                $this->input->post("fecha"),
                $this->input->post("hora"),
                $this->input->post("fecha_entregar"),
                $this->input->post("hora_entregar")
                );
        
        $this->notificaciones_model->notificationWithIdPaciente($this->data['data']['idUsuario'], $id,
                   "Nueva receta formulada", "index.php/prescripcionesPaciente/index", "icon-list-alt");
        
       // redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$id);
    }

    function cambioObraSocial($id){
        $this->superusuario_model->cambioObraSocial($id, $this->input->post("obrasocial"));
        redirect(base_url()."index.php/principalSuperAdmin/listarPacientes/");
    }

    function calcularDesvio(){
        $from = $this->input->post("from");
        $to = $this->input->post("to");
        $idPaciente = $this->input->post("id_paciente");
        echo $this->superusuario_model->calcularDesvio($from, $to, $idPaciente);
    }

    function agregarSimpleDosis($idPaciente){

        $fechaReal = $this->input->post("fechareal");
        $horaReal = $this->input->post("horareal");
        $fechaPrevista = $this->input->post("fechareal");
        $horaPrevista = $this->input->post("horareal");
        $demanda = $this->input->post("demanda");
        $aplicada = $this->input->post("aplicada");

        $this->superusuario_model->agregarSimpleDosis(
            $idPaciente,
            $fechaPrevista." ".$horaPrevista,
            $fechaReal." ".$horaReal,
            $demanda,
            $aplicada
        );

        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);

    }

    function deleteDosis($idDosis, $idPaciente){
        $this->superusuario_model->deleteOne($idDosis);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }

    function confirmarReceta($idPac, $idRec){
        $fecha = $this->input->post("fechaentrega");
        $hora = $this->input->post("horaentrega");
        $cant = $this->input->post("cant_ui");
        $lote = $this->input->post("lote");

        $this->superusuario_model->confirmarReceta(
            $fecha,
            $hora, 
            $cant, 
            $lote,
            $idRec
        );

        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPac);

    }

    public function try_it (){

        $this->load->model("pacientes_model");

        echo $this->pacientes_model->cantDosis(10, 2014, Array(
            "Mon", "Wed", "Fri"
        ));

    }

    public function abmdosis_atiempo($idPaciente, $idDosis, $fecha)
    {
        $fecha = str_replace('%20', ' ', $fecha);
        $query = "UPDATE dosis SET aplicada = 1, fechaHoraReal = '$fecha' WHERE idTratamiento = $idPaciente AND idDosis = $idDosis";
        $this->load->model("pacientes_model");
        $this->pacientes_model->abm_dosis($query);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }

    public function abmdosis_omitir($idPaciente, $idDosis)
    {
        $query = "UPDATE dosis SET aplicada = 2 WHERE idTratamiento = $idPaciente AND idDosis = $idDosis";
        $this->load->model("pacientes_model");
        $this->pacientes_model->abm_dosis($query);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }

    public function abmdosis_eliminar($idPaciente, $idDosis)
    {
        $query = "UPDATE dosis SET activa = 0 WHERE idTratamiento = $idPaciente AND idDosis = $idDosis";
        $this->load->model("pacientes_model");
        $this->pacientes_model->abm_dosis($query);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }

    public function abmdosis_noapli($idPaciente, $idDosis)
    {
        echo "...";
        $query = "UPDATE dosis SET aplicada = 0 WHERE idTratamiento = $idPaciente AND idDosis = $idDosis";
        $this->load->model("pacientes_model");
        $this->pacientes_model->abm_dosis($query);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }

    public function abmdosis_demanda($idPaciente)
    {
        $fecha = $this->input->post("startingDay") ." ". $this->input->post("startingHour");
        $cantidad = $this->input->post("cantidad"); 
        $articulacion = $this->input->post("articulacion"); 
        
        $this->load->model("pacientes_model");
        $this->pacientes_model->abm_demanda($idPaciente, $fecha, $cantidad, $articulacion);
        redirect(base_url()."index.php/principalSuperAdmin/pacienteProfile/".$idPaciente);
    }

}

