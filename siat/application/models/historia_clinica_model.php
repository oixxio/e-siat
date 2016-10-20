<?php

class historia_clinica_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }

    //regex_replace('[a-zA-Z: \-]', '', log.message) as message,

    public function getPrincipal($idPaciente){
        return $this->db->query("SELECT * FROM historia_clinica WHERE idPaciente = $idPaciente")->row();
    }
    public function getObservaciones($idPaciente){
        return $this->db->query("SELECT * FROM historia_clinica_observaciones WHERE idPaciente = $idPaciente")->result();
    }
    public function getEvolucion($idPaciente){
		return $this->db->query("SELECT * FROM historia_clinica_evolucion WHERE idPaciente = $idPaciente")->result();
    }
    public function getExamen($idPaciente){
        return $this->db->query("SELECT * FROM historia_clinica_examen WHERE idPaciente = $idPaciente")->result();
    }
    public function setPrincipal($idPaciente, $obraSocial, $plan, $nroAfiliado, $valido, $nombrePaciente, $fechaNac, $nacionalidad, $edad, $sexo, $estadoCivil, $direccion, $barrio, $codigoPostal, $ciudad, $provincia, $telefono1, $telefono2, $emailPaciente, $patologia, $medicoCabecera, $telefonoMedico, $factor, $cantidadUI, $compuesto, $tipo1, $tipo2){
        $this->db->query("INSERT INTO historia_clinica 
            (idPaciente, obraSocial, plan, nroAfiliado, validoHasta, nombre, fechaNacimiento, nacionalidad, edad, sexo, estadoCivil, direccion, barrio, codigoPostal, ciudad, provincia, telefono1, telefono2, email, patologia, medico, telefonoMedico, factor, cantidadUI, compuesto, tipo1, tipo2) 
            VALUES($idPaciente, '$obraSocial', '$plan', '$nroAfiliado', '$valido', '$nombrePaciente', '$fechaNac', '$nacionalidad', '$edad', '$sexo', '$estadoCivil', '$direccion', '$barrio', '$codigoPostal', '$ciudad', '$provincia', '$telefono1', '$telefono2', '$emailPaciente', '$patologia', '$medicoCabecera', '$telefonoMedico', '$factor', '$cantidadUI', '$compuesto', '$tipo1', '$tipo2') 
            ON DUPLICATE KEY UPDATE obraSocial=VALUES(obraSocial), plan=VALUES(plan), nroAfiliado=VALUES(nroAfiliado), validoHasta=VALUES(validoHasta), nombre=VALUES(nombre), fechaNacimiento=VALUES(fechaNacimiento), nacionalidad=VALUES(nacionalidad), edad=VALUES(edad), sexo=VALUES(sexo), estadoCivil=VALUES(estadoCivil), direccion=VALUES(direccion), barrio=VALUES(barrio), codigoPostal=VALUES(codigoPostal), ciudad=VALUES(ciudad), provincia=VALUES(provincia), telefono1=VALUES(telefono1), telefono2=VALUES(telefono2), email=VALUES(email), patologia=VALUES(patologia), medico=VALUES(medico), telefonoMedico=VALUES(telefonoMedico), factor=VALUES(factor), cantidadUI=VALUES(cantidadUI), compuesto=VALUES(compuesto), tipo1=VALUES(tipo1), tipo2=VALUES(tipo2)");
    }
    public function setHistorico($idPaciente, $historia_medica_txt, $nro_consulta, $alergiasRadio, $alergiaDesc, $diabetesRadio, $diabetesDesc, $respiratoriosRadio, $respiratoriosDesc, $circulatoriosRadio, $circulatoriosDes, $cirugiasRadio, $cirugiasDes, $medicamentosRadio, $medicamentosDes){
        $this->db->query("INSERT INTO historia_clinica 
            (idPaciente, historiaMedica, consultaRealizada, alergia, alergiaDesc, diabetes, diabetesDesc, respiratorios, respiratoriosDesc, circulatorios, circulatoriosDes, cirugias, cirugiasDes, medicamentos, medicamentosDes)
            VALUES($idPaciente, '$historia_medica_txt', '$nro_consulta', '$alergiasRadio', '$alergiaDesc', '$diabetesRadio', '$diabetesDesc', '$respiratoriosRadio', '$respiratoriosDesc', '$circulatoriosRadio', '$circulatoriosDes', '$cirugiasRadio', '$cirugiasDes', '$medicamentosRadio', '$medicamentosDes')
            ON DUPLICATE KEY UPDATE historiaMedica=VALUES(historiaMedica), consultaRealizada=VALUES(consultaRealizada), alergia=VALUES(alergia), alergiaDesc=VALUES(alergiaDesc), diabetes=VALUES(diabetes), diabetesDesc=VALUES(diabetesDesc), respiratorios=VALUES(respiratorios), respiratoriosDesc=VALUES(respiratoriosDesc), circulatorios=VALUES(circulatorios), circulatoriosDes=VALUES(circulatoriosDes), cirugias=VALUES(cirugias), cirugiasDes=VALUES(cirugiasDes), medicamentos=VALUES(medicamentos), medicamentosDes=VALUES(medicamentosDes)");
    }
    public function setObservaciones($idPaciente, $obs_txt, $referencias_txt, $altura, $peso, $peso_normal){
        $last = $this->db->query("SELECT MAX(secuencia) as max FROM historia_clinica_observaciones WHERE idPaciente = $idPaciente")->row();
        $last = $last->max;
        $last = $last+1;
        $this->db->query("INSERT INTO historia_clinica_observaciones (idPaciente, secuencia, observaciones, referencias, altura, peso, pesoNormal) VALUES ($idPaciente, $last, '$obs_txt', '$referencias_txt', '$altura', '$peso', '$peso_normal')");   
    }
    public function setEvolucion($idPaciente, $dolencia_txt, $historico_enfermedad_txt){
        $last = $this->db->query("SELECT MAX(secuencia) as max FROM historia_clinica_evolucion WHERE idPaciente = $idPaciente")->row();
        $last = $last->max;
        $last = $last+1;
        $this->db->query("INSERT INTO historia_clinica_evolucion (idPaciente, secuencia, dolencia, historicoEnfermedad) VALUES ($idPaciente, $last, '$dolencia_txt', '$historico_enfermedad_txt')");   
    }

    public function setExamen($idPaciente, $tipo_examen, $dolencia_txt, $url)
    {
        $last = $this->db->query("SELECT MAX(secuencia) as max FROM historia_clinica_examen WHERE idPaciente = $idPaciente")->row();
        $last = $last->max;
        $last = $last+1;
        $this->db->query("INSERT INTO historia_clinica_examen (idPaciente, secuencia, tipo, resultado, archivo) VALUES ($idPaciente, $last, '$tipo_examen', '$dolencia_txt', '$url')");       
    }



    //archivos

    public function setArchivo($tipo, $idPaciente, $observaciones, $url, $original_name)
    {
        $this->db->query("INSERT INTO archivos (tipo, id_paciente, url, observaciones, original_name) VALUES ($tipo, $idPaciente, '$url', '$observaciones', '$original_name')");       
    }

    public function setFactura($idPaciente, $nro, $url, $original_name)
    {
        $this->db->query("UPDATE reintegro SET url_factura = '$url', original_name_factura = '$original_name' WHERE id_paciente = $idPaciente AND nro = $nro");       
    }

    public function getArchivos($idPaciente)
    {
        return $this->db->query("SELECT * FROM archivos WHERE id_paciente = $idPaciente")->result();       
    }

    public function getReintegros($idPaciente)
    {
        return $this->db->query("SELECT * FROM reintegro WHERE id_paciente = $idPaciente ORDER BY fecha")->result();       
    }

}
?>