<?php


class pacientes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }
    
    
    function addPaciente(){
        
        $_USER_DATA = $this->session->all_userdata();
        
        $this->db->insert('paciente', array(
            "nombre" => $this->input->post("name"),
            "apellido" => $this->input->post("surname"),
            "documento" => $this->input->post("dni"),
            "idEspecialista" => $_USER_DATA['idEspecialista']
        ));
        
        $this->db->insert('usuario', array(
            "nombreUsuario" => $this->input->post("surname"),
            "passUsuario" => $this->input->post("dni"),
            "tipoUsuario" => "paciente"
        ));
        
    }
    
    function delPaciente($id){
        $this->db->delete("paciente", array(
            "idPaciente" => $id
        ));
    }
    
    function getP(){
        
        $_USER_DATA = $this->session->all_userdata();
        
        $query = "SELECT * FROM paciente  
            LEFT JOIN usuario ON paciente.idUsuario = usuario.idUsuario 
            LEFT JOIN perfiles ON perfiles.id_usuario = paciente.idUsuario
            WHERE paciente.active=1 AND paciente.idEspecialista = '".$_USER_DATA['idEspecialista']. "'";
        $result = $this->db->query($query);
        $total = $result->num_rows();
        return $result->result();
        /*
        return array(
            "data" => $result->result(),
            "total" => $total,
            "total_filter" => $result->num_rows()
        );
        */        
    }
    
    function getJson($sSearch, $iDisplayBy, $iDisplayDir, $iDisplayOffset, $iDisplayLength ){
        
        $_USER_DATA = $this->session->all_userdata();
        
        $query = "SELECT * FROM paciente  
            LEFT JOIN usuario ON paciente.idUsuario = usuario.idUsuario 
            WHERE paciente.active=1 AND (nombre LIKE '%$sSearch%' OR apellido LIKE '%$sSearch%') AND paciente.idEspecialista = '".
                $_USER_DATA['idEspecialista']. "' 
                ORDER BY $iDisplayBy $iDisplayDir LIMIT $iDisplayOffset, $iDisplayLength";
        $result = $this->db->query($query);
        $total = $result->num_rows();
        
        if($iDisplayOffset > 0 || $iDisplayLength > 0){
            $_USER_DATA = $this->session->all_userdata();
            $query = "SELECT * FROM paciente as p
            LEFT JOIN usuario as u ON p.idUsuario = u.idUsuario 
            WHERE p.active=1 AND (nombre LIKE '%$sSearch%' OR apellido LIKE '%$sSearch%') AND p.idEspecialista = '".$_USER_DATA['idEspecialista']."' 
                ORDER BY $iDisplayBy $iDisplayDir LIMIT $iDisplayOffset, $iDisplayLength";
            $result = $this->db->query($query);
        }
        
        return array(
            "data" => $result->result(),
            "total" => $total,
            "total_filter" => $result->num_rows()
        );
        
    }
    
    function getJsonFrom_Id($id){
        $result = $this->db->query("SELECT * FROM paciente LEFT JOIN usuario 
            ON usuario.idUsuario = paciente.idUsuario WHERE paciente.idPaciente = $id")->result();
        return $result[0];
    }
    
    function editPaciente($id){
        $this->db->update("paciente", array(
            "nombre" => $this->input->post("name"),
            "apellido" => $this->input->post("surname"),
            "documento" => $this->input->post("dni")
        ), array(
            "idPaciente" => $id
        ));
    }
    
    function pacienteInfo($id){
        return $this->db->query("SELECT * FROM paciente p, perfiles pe WHERE p.idPaciente=$id AND p.idUsuario=pe.id_usuario")->row();
    }
    
    function pacienteTratamiento($idPac){
        $resultado = Array();
        $dosis_result = Array();
        
        $tratamiento = $this->db->query("
            SELECT * FROM paciente p
                LEFT JOIN tratamiento t ON t.idPaciente = p.idPaciente
                LEFT JOIN detalletratamiento dt ON dt.idTratamiento = t.idTratamiento 
                LEFT JOIN perfiles pr ON pr.id_usuario = p.idUsuario
                WHERE p.idPaciente = '$idPac'
        ")->row();

        $dosis = $this->db->query("
            SELECT *, DATE_FORMAT(fechaHoraPrevisto, '%H:%i %d.%m.%Y') as fechaHoraPrevisto,
                      DATE_FORMAT(fechaHoraReal, '%H:%iHs %d.%m.%Y') as fechaHoraReal, d.cantidad as cantidad,  dt.cantidad as cantidad_demanda
            FROM dosis d
            LEFT JOIN detalledosis dt ON DATE_FORMAT(dt.fecha, '%Y-%m-%d %H:%i') = DATE_FORMAT(fechaHoraReal, '%Y-%m-%d %H:%i')
                    AND dt.idPaciente = '".$idPac."'
            LEFT JOIN drogas do ON do.id = d.idDroga
            WHERE 
            d.idTratamiento = '".$tratamiento->idTratamiento."' AND d.activa='1' AND d.aplicada<> 2
                ORDER BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m-%d %H-%i') ASC
         ")->result();

        $dosisJson = $this->db->query("
            SELECT  *,
                    DATE_FORMAT(fechaHoraPrevisto, '%H:%i %d.%m.%Y') as fechaHoraPrevisto,
                    DATE_FORMAT(fechaHoraReal, '%H:%iHs %d.%m.%Y') as fechaHoraReal,
                    d.cantidad as cantidad,
                    dt.cantidad as cantidad_demanda,
                    DATE_FORMAT(fechaHoraReal, '%Y') as year,
                    DATE_FORMAT(fechaHoraReal, '%m') as month
            FROM dosis d
            LEFT JOIN detalledosis dt ON DATE_FORMAT(dt.fecha, '%Y-%m-%d %H:%i') = DATE_FORMAT(fechaHoraReal, '%Y-%m-%d %H:%i')
                    AND dt.idPaciente = '$idPac'
            LEFT JOIN drogas do ON do.id = d.idDroga
            WHERE 
            d.idTratamiento = '".$tratamiento->idTratamiento."' AND d.activa='1' AND d.aplicada<> 2
                ORDER BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m-%d %H-%i') ASC
        ")->result();
        
        foreach ($tratamiento as $key => $value) {
            $resultado[$key] = $value;
        }

        foreach($dosis as $dss){ 
            $dosis_result[]=$dss;
        }
        
        $resultado['dosis'] = $dosis_result;
        $resultado['dosisJson'] = json_encode($dosisJson);
        
        return $resultado;
    }

    //NO BORRAR ESTE CODIGO PUEDE llegar a USARSE
    /*
    (DATE_FORMAT(dt.fecha, '%Y-%m-%d %H') < DATE_ADD(DATE_FORMAT(fechaHoraReal, '%Y-%m-%d %H'), INTERVAL 2 MINUTE) AND
                                DATE_FORMAT(dt.fecha, '%Y-%m-%d %H') > DATE_SUB(DATE_FORMAT(fechaHoraReal, '%Y-%m-%d %H'), INTERVAL 2 MINUTE))
    */
    
    //IF(aplicada=0, DATE_FORMAT(fechaHoraPrevisto, '%Y-%m-%d'),IF(tipo=1, DATE_FORMAT(fechaHoraReal, '%Y-%m-%d'), DATE_FORMAT(fecha, '%Y-%m-%d')))  as start,

    function pacienteDosisJson($idPac){
        
        $tratamiento = $this->db->query("
           SELECT * FROM paciente p
               LEFT JOIN tratamiento t ON t.idPaciente = p.idPaciente
               LEFT JOIN detalletratamiento dt ON dt.idTratamiento = t.idTratamiento 
               LEFT JOIN perfiles pr ON pr.id_usuario = p.idUsuario
               WHERE p.idPaciente = '$idPac'
        ")->row();
        $dosis = $this->db->query("
            SELECT  
                      DATE_FORMAT(fechaHoraPrevisto, '%Y-%m-%d') as start,
                      IF(tipo=1, '', CONCAT('', articulacion)) as title,
                      aplicada, tipo, IF(DATE_ADD(fechaHoraPrevisto, INTERVAL 320 MINUTE) < fechaHoraReal, 0, 1) AS inTime, idTratamiento,
                IF(aplicada=0, 
                    DATE_FORMAT(fechaHoraPrevisto, '%H:%iHs %d.%m.%Y'), 
                    DATE_FORMAT(fechaHoraReal, '%H:%iHs %d.%m.%Y'))
                     as formatedDate ,
                     DATE_FORMAT(fechaHoraPrevisto, '%H:%iHs %d.%m.%Y') as fechaEstimada, DATE_FORMAT(fechaHoraReal, '%H:%iHs %d.%m.%Y') as fechaReal, 
                     IF(tipo=1, IF(aplicada=0, 'Sin aplicar', IF(aplicada=1, 'Aplicada', 'Omitida')) , 'Demanda') as titulo,
                     d.idDosis as id_dosis, fechaHoraPrevisto as fechaM
            FROM dosis d
            LEFT JOIN detalledosis dt ON 
            dt.id IN ( SELECT MAX(id) FROM detalledosis det WHERE DATE_FORMAT(det.fecha, '%Y-%m-%d %H:%i') =  DATE_FORMAT(d.fechaHoraReal, '%Y-%m-%d %H:%i'))
                    AND dt.idPaciente = '$idPac' AND tipo=2
            WHERE 
            idTratamiento = '".$tratamiento->idTratamiento."' AND activa='1' 
                ORDER BY DATE_FORMAT(start, '%Y-%m-%d %H-%i') DESC LIMIT 300
         ")->result();
        
        return json_encode($dosis); 
    }


    public function getGraficoBarrasMesCantDosis($idPac){

        $retorno = Array();

        $restult = $this->db->query(
            "SELECT 

                DATE_FORMAT(d.fechaHoraPrevisto, '%M %Y') as period,

                (SELECT COUNT(d1.idDosis) FROM dosis d1 WHERE d1.idTratamiento='$idPac' 
                    AND d1.aplicada=1 AND d1.tipo=1 AND d1.activa=1
                    AND DATE_ADD(d1.fechaHoraPrevisto, INTERVAL 320 MINUTE) > d1.fechaHoraReal
                    AND DATE_FORMAT(d1.fechaHoraPrevisto, '%Y-%m') = DATE_FORMAT(d.fechaHoraPrevisto, '%Y-%m')) as atiempo,

                (SELECT COUNT(d2.idDosis) FROM dosis d2 WHERE d2.idTratamiento='$idPac' 
                    AND d2.aplicada=1 AND d2.tipo=1 AND d2.activa=1
                    AND (DATE_ADD(d2.fechaHoraPrevisto, INTERVAL 320 MINUTE) < d2.fechaHoraReal)
                    AND DATE_FORMAT(d2.fechaHoraPrevisto, '%Y-%m') = DATE_FORMAT(d.fechaHoraPrevisto, '%Y-%m')) as retrasada,

                (SELECT COUNT(d3.idDosis) FROM dosis d3 WHERE d3.idTratamiento='$idPac' 
                    AND d3.aplicada=1 AND d3.tipo=2
                    AND DATE_FORMAT(d3.fechaHoraPrevisto, '%Y-%m') = DATE_FORMAT(d.fechaHoraPrevisto, '%Y-%m')) as demanda,

                (SELECT COUNT(d4.idDosis) FROM dosis d4 WHERE d4.idTratamiento='$idPac' 
                    AND d4.aplicada=2
                    AND DATE_FORMAT(d4.fechaHoraPrevisto, '%Y-%m') = DATE_FORMAT(d.fechaHoraPrevisto, '%Y-%m')) as omitida,

                (SELECT COUNT(d5.idDosis) FROM dosis d5 WHERE d5.idTratamiento='$idPac' 
                    AND d5.tipo=1 AND d5.aplicada=0 AND d5.activa=1
                    AND DATE_FORMAT(d5.fechaHoraPrevisto, '%Y-%m') = DATE_FORMAT(d.fechaHoraPrevisto, '%Y-%m')) as sinaplicar

            FROM dosis d WHERE d.idTratamiento='$idPac' GROUP BY DATE_FORMAT(d.fechaHoraPrevisto, '%Y-%m')"
        )->result();
        
        foreach ($restult as $key => $value) {
            $retorno[0]["dataPoints"][] = Array(
                "y" => intval($value->atiempo),
                "label" => $value->period
            );
            $retorno[1]["dataPoints"][] = Array(
                "y" => intval($value->retrasada),
                "label" => $value->period
            );

            $retorno[2]["dataPoints"][] = Array(
                "y" => intval($value->demanda),
                "label" => $value->period
            );
            $retorno[3]["dataPoints"][] = Array(
                "y" => intval($value->omitida),
                "label" => $value->period
            );
            $retorno[4]["dataPoints"][] = Array(
                "y" => intval($value->sinaplicar),
                "label" => $value->period
            );
        }
        
        $color[0] = "rgb(106,196,96)";
        $color[1] = "rgb(255,164,32)";
        $color[2] = "rgb(254,0,0)";
        $color[3] = "rgb(234,137,154)";
        $color[4] = "rgb(106,214,227)";

        foreach ($retorno as $key => $value) {
            $retorno[$key]["type"] = "stackedColumn";
            $retorno[$key]['color'] = $color[$key];
        }

        return $retorno;

        /*$iterator = $this->db->query("SELECT COUNT(idDosis) WHERE idTratamiento='$idPac' GROUP BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')");

        $result = Array();

        foreach ($variable as $key => $value) {
            # code...
        }

        $result['aplicadas'] = $this->db->query("
            SELECT DATE_FORMAT(fechaHoraPrevisto, '%M %Y') as month, COUNT(idDosis) as cant FROM dosis WHERE idTratamiento='$idPac' AND aplicada=1 AND activa=1
            AND DATE_SUB(fechaHoraPrevisto, INTERVAL 120 MINUTE) < fechaHoraReal AND DATE_ADD(fechaHoraPrevisto, INTERVAL 120 MINUTE) > fechaHoraReal
            GROUP BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')
        ")->result();

        $result['sinaplicar'] = $this->db->query("
            SELECT DATE_FORMAT(fechaHoraPrevisto, '%M %Y') as month, COUNT(idDosis) as cant FROM dosis WHERE idTratamiento='$idPac' AND aplicada=0 AND activa=1 GROUP BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')
        ")->result();

        $result['retrasada'] = $this->db->query("
            SELECT DATE_FORMAT(fechaHoraPrevisto, '%M %Y') as month, COUNT(idDosis) as cant FROM dosis WHERE idTratamiento='$idPac' AND aplicada=1 AND activa=1
            AND (DATE_SUB(fechaHoraPrevisto, INTERVAL 120 MINUTE) > fechaHoraReal OR DATE_ADD(fechaHoraPrevisto, INTERVAL 120 MINUTE) < fechaHoraReal)
            GROUP BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')
        ")->result();

         $result['omitida'] = $this->db->query("
            SELECT DATE_FORMAT(fechaHoraPrevisto, '%M %Y') as month, COUNT(idDosis) as cant FROM dosis WHERE idTratamiento='$idPac' AND aplicada=3 AND activa=1 GROUP BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')
        ")->result();

        $result['demanda'] = $this->db->query("
            SELECT DATE_FORMAT(fechaHoraPrevisto, '%M %Y') as month, COUNT(idDosis) as cant FROM dosis WHERE idTratamiento='$idPac' AND aplicada=1 AND activa=2 GROUP BY DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')
        ")->result();

        return $result;*/
    }

    public function addPacienteData($id){
        
        $image = "";

        $config['upload_path'] = './profilepicture/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10000';
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()){
            $image = "default.png";
        }else{
            $data = $this->upload->data();
            $image = $data['file_name'];
        }

        $tel_personal = $this->input->post("tel_personal");
        $tel_casa = $this->input->post("tel_casa");
        $tel_oficina = $this->input->post("tel_oficina");
        $genero = $this->input->post("genero");
        $fecha_nac = $this->input->post("fecha_nac");
        $lugar_nac = $this->input->post("lugar_nac");
        $titulo = $this->input->post("titulo");
        $codigo_postal = $this->input->post("codigo_postal");
        $nro_seguridad = $this->input->post("nro_seguridad");
        $edad = $this->input->post("edad");
        $correo = $this->input->post("correo");
        $pass = $this->input->post("pass");
        $usuario = $this->input->post("usuario");
        $detalle = $this->input->post("detalle");
        $fecha_inicio = $this->input->post("fecha_inicio");
        $intervalo = $this->input->post("horas");
        $provincia = $this->input->post("provincia");
        $direccion = $this->input->post("direccion");
        $estado = $this->input->post("estado");
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $dni = $this->input->post("dni");
        $obrasocial = $this->input->post("obrasocial");
        $tipo = $this->input->post("tipohemofilia");
        $hora = $this->input->post("hora");
        
        $salt = md5(uniqid(rand(), true));
        $hash = hash('sha512', $salt.$pass);
        
        $this->db->query("INSERT INTO `usuario`(`nombreUsuario`, `hash`, `salt` ,`tipoUsuario`) 
                           VALUES ('$usuario', '$hash', '$salt', 'paciente')");
        
        $result = $this->db->query("SELECT * FROM usuario WHERE SHA2(CONCAT(salt,'$pass'), 512) = hash AND nombreUsuario='$usuario' LIMIT 1")->row();
        
        $this->db->query("INSERT INTO `perfiles`(`id_usuario`, `direccion`, `active`, `nombre`, `apellido`,
            `ciudad`, `estado`, `telefono_personal`, 
            `telefono_casa`, `telefono_oficina`, `genero`, `lugar_nacimiento`, `fecha_nacimiento`, `titulo`, `codigo_postal`, 
            `nro_seguridad_social`, `edad`, `correo_electronico`, `imagen_perfil`) VALUES ('$result->idUsuario', '$direccion', '1', '$nombre', '$apellido', '$provincia',
                '$estado', '$tel_personal', '$tel_casa', '$tel_oficina', '$genero', '$lugar_nac', '$fecha_nac', '$titulo', '$codigo_postal',
                    '$nro_seguridad', '$edad', '$correo', '$image')");
        
        $this->db->query("INSERT INTO `paciente`(`idUsuario`, `nombre`, `apellido`, 
            `idEspecialista`, `fechaProxAutotest`, `documento`, `idObrasocial`, `tipo`) VALUES 
            ('$result->idUsuario', '$nombre', '$apellido', '$id', NOW(), '$dni', '$obrasocial', '$tipo')");
        
        $result_3 = $this->db->query("SELECT * FROM paciente WHERE idUsuario=$result->idUsuario")->row();
        
        $this->db->query("INSERT INTO `tratamiento`(`idEspecialista`, `idPaciente`) VALUES ($id, $result_3->idPaciente)");
        
        $result_2 = $this->db->query("SELECT * FROM tratamiento WHERE idEspecialista=$id AND idPaciente=$result_3->idPaciente")->row();

        /*$i = 0;
        $drogas = "";

        $idDroga = "";

        while($this->input->post($i."_droga") != ""){
            $this->db->query("INSERT INTO drogas (`idTratamiento`, `droga`, `dosis`, `proveedor`, `comercial` ) VALUES (
                '$result_2->idTratamiento',
                '".$this->input->post($i."_droga")."',
                '".$this->input->post($i."_cantidad")."',
                '".$this->input->post($i."_proveedor")."',
                '".$this->input->post($i++."_comercial")."'
            )");
        }

        $idDroga = $this->db->insert_id();*/
        
        $this->db->query("INSERT INTO `detalletratamiento`(`idTratamiento`, `detalle`, `fechaInicio`, `intervalo`, `droga`) 
                            VALUES ('$result_2->idTratamiento', '$detalle', ".  
                                ($fecha_inicio != "" ? "'".$fecha_inicio."'" : "NOW()")
                            .", '$intervalo', '')");
        
    
        /*switch ($this->input->post("form-field-radio")){
            case "dias" : 
                $dias = Array(
                    "lunes" => $this->input->post("lunes") == "on" ? 1 : 0,
                    "martes" => $this->input->post("martes") == "on" ? 1 : 0,
                    "miercoles" => $this->input->post("miercoles") == "on" ? 1 : 0,
                    "jueves" => $this->input->post("jueves") == "on" ? 1 : 0,
                    "viernes" => $this->input->post("viernes") == "on" ? 1 : 0,
                    "sabado" => $this->input->post("sabado") == "on" ? 1 : 0,
                    "domingo" => $this->input->post("domingo") == "on" ? 1 : 0
                );

                $fecha = $fecha_inicio;

                $indiceDias = 0;
        
                $indiceBusqueda = 0;
                
                $lastDay = 0;
                $day = "lunes";
                
                $startDay = date('D', strtotime($fecha));
                
                switch ($startDay){
                    case "Mon" : $startDay = "lunes"; break;
                    case "Tue" : $startDay = "martes"; break;
                    case "Wed" : $startDay = "miercoles"; break;
                    case "Thu" : $startDay = "jueves"; break;
                    case "Fri" : $startDay = "viernes"; break;
                    case "Sat" : $startDay = "sabado"; break;
                    case "Sun" : $startDay = "domingo"; break;
                }
                      
                $horas = array(
                    "lunes" => array("martes" => 24, "miercoles" => 48, "jueves" => 72, "viernes" => 96, "sabado" => 120, "domingo" => 144, "lunes" => 0 ),
                    "martes" => array("miercoles" => 24, "jueves" => 48, "viernes" => 72, "sabado" => 96, "domingo" => 120, "lunes" => 144, "martes" => 0 ),
                    "miercoles" => array("jueves" => 24, "viernes" => 48, "sabado" => 72, "domingo" => 96, "lunes" => 120, "martes" => 144, "miercoles" => 0 ),
                    "jueves" => array("viernes" => 24, "sabado" => 48, "domingo" => 72, "lunes" => 96, "martes" => 120, "miercoles" => 144, "jueves" => 0 ),
                    "viernes" => array("sabado" => 24, "domingo" => 48, "lunes" => 72, "martes" => 96, "miercoles" => 120, "jueves" => 144, "viernes" => 0 ),
                    "sabado" => array("domingo" => 24, "lunes" => 48, "martes" => 72, "miercoles" => 96, "jueves" => 120, "viernes" => 144, "sabado" => 0 ),
                    "domingo" => array("lunes" => 24, "martes" => 48, "miercoles" => 72, "jueves" => 96, "viernes" => 120, "sabado" => 144, "domingo" => 0 ));
                
                for($j=0 ; $j < 40; $j++){
                    

                    $index = 0;
                    
                    if(array_search($day, array_keys($dias)) + 1 == sizeof($dias)){
                        $indiceDias++;
                    }
                    
                    for($i= $indiceBusqueda ; $i < sizeof($dias); $i++){
                        if($i == sizeof($dias)-1){
                            $i=0;
                            $indiceDias++;
                        }
                        if($dias[$this->getKey($dias, $i)] == '1'){
                            $day = $this->getKey($dias, $i);
                            $indiceBusqueda = array_search($day, array_keys($dias)) + 1 < sizeof($dias) ? array_search($day, array_keys($dias)) + 1 : 0;
                           break;
                        }
                    }
                                
                    $query = "INSERT INTO `dosis`(`idTratamiento`, `fechaHoraPrevisto`, `activa`, `tipo` , `droga`, `idDroga`) 
                        VALUES ('$result_2->idTratamiento',";
                    
                    $query .= (($startDay == $day && $indiceDias > 0) || $startDay != $day) ? "DATE_ADD(DATE_FORMAT('$fecha' , '%Y-%m-%d %H:%i:%s') , 
                                            INTERVAL ".($horas[$startDay][$day] + 168 * $indiceDias)." HOUR)," : " DATE_FORMAT('$fecha' , '%Y-%m-%d %H:%i:%s'),";
                    
                    
                    $query .= "'1', '1', $idDroga, '$idDroga')";
                    
                    $this->db->query($query);
                }
                break;
            case "horas" : 
                for($i=0 ; $i < 50; $i++){
                    $this->db->query("INSERT INTO `dosis`(`idTratamiento`, `fechaHoraPrevisto`, `droga`
                        , `cantidad`, `activa`, `tipo`) VALUES ($result_2->idTratamiento, DATE_ADD(DATE_FORMAT('$fecha' , '%Y-%m-%d %H:%i:%s'), INTERVAL ".$intervalo * $i." HOUR)
                        , $idDroga  , '1500', '1', '1')");
                }       
                break;
            }*/


        $this->db->insert('turno', array(
            "idPaciente" => $result_3->idPaciente,
            "hora" => "0",
            "lugar" => "",
            "idEspecialista" => $id
        ));
    }
    
    function getHistorial($id){
        return $this->db->query("SELECT *, DATE_FORMAT(fecha, '%Y-%m-%d') as fecha FROM historialclinico WHERE idPaciente='$id'")->result();
    }
    
    function crearHistoria($id, $f, $o){
        $this->db->query("INSERT INTO `historialclinico`(`idPaciente`, `observacion`, `fecha`)
            VALUES ('$id', '$o', '$f')");
    }
    
    
    function doUplaod($id, $url){
        $this->db->query("INSERT INTO archivos_historia (`url`, `idPaciente`) VALUES ('$url', '$id')");
    }

    public function doUploadImage($id, $nombre){
           $idUsuario = $this->db->select('idUsuario')->from("paciente")->where("idPaciente",$id)->get()->row();   
        $this->db->query("UPDATE perfiles SET imagen_perfil='$nombre' WHERE id_usuario=$idUsuario->idUsuario");
    }

    function getFiles($id){
        return $this->db->query("SELECT * FROM archivos_historia WHERE idPaciente='$id' AND active='1'")->result();
    }
    
    function borrarArchivo($idArchivo){
        $this->db->query("UPDATE archivos_historia SET active='0' WHERE id='$idArchivo' ");
    }
    
    function reformularTratamientoHoras($id, $intervalo, $dia, $hora,  $delete = FALSE, $cant = 50){
        
        //$this->db->query("DELETE FROM dosis WHERE idTratamiento='$id' AND aplicada='0'");
        
        $i = 0;

        if($delete)
            $this->db->query("DELETE FROM dosis WHERE idTratamiento='$id' AND aplicada='0'");

        while($this->input->post($i."_droga") != ""){
            $this->db->query("INSERT INTO drogas (`idTratamiento`, `droga`, `dosis`, `proveedor`, `comercial` ) VALUES (
                '$id',
                '".$this->input->post($i."_droga")."',
                '".$this->input->post($i."_cantidad")."',
                '".$this->input->post($i."_proveedor")."',
                '".$this->input->post($i++."_comercial")."'
            )");
        }

        $idDroga = $this->db->insert_id();

        for($i=0 ; $i < $cant; $i++){
            $this->db->query("INSERT INTO `dosis`(`idTratamiento`, `fechaHoraPrevisto`, `activa`, `tipo`, `droga`, `idDroga`) 
                VALUES ('$id', DATE_ADD(DATE_FORMAT('$dia $hora' , '%Y-%m-%d %H:%i:%s') , INTERVAL ".$intervalo * $i." HOUR), '1', '1', '$idDroga', '$idDroga')");
        }

        return $idDroga;
    }
    
    function reformularTratamientoDias($id, $dias, $dia, $hora, $delete = FALSE, $cant = 50){
        

        $indiceDias = 0;
        
        $indiceBusqueda = 0;
        
        $lastDay = 0;
        $day = "lunes";


        //Obtengo una representación textual de un día, tres letras ---> Mon hasta Sun
        $startDay = date('D', strtotime($dia." ".$hora));
        
        //Seteo la variable $startDay con su dia correspondiente en castellano.       
        switch ($startDay){
            case "Mon" : $startDay = "lunes"; break;
            case "Tue" : $startDay = "martes"; break;
            case "Wed" : $startDay = "miercoles"; break;
            case "Thu" : $startDay = "jueves"; break;
            case "Fri" : $startDay = "viernes"; break;
            case "Sat" : $startDay = "sabado"; break;
            case "Sun" : $startDay = "domingo"; break;
        }

        //-----------------------------------------------------Utiliza para ir de a 24Horas--------------------------------------------------------
        $horas = array(
            "lunes"     => array("martes" => 24, "miercoles" => 48, "jueves" => 72, "viernes" => 96, "sabado" => 120, "domingo" => 144, "lunes" => 0 ),
            "martes"    => array("miercoles" => 24, "jueves" => 48, "viernes" => 72, "sabado" => 96, "domingo" => 120, "lunes" => 144, "martes" => 0 ),
            "miercoles" => array("jueves" => 24, "viernes" => 48, "sabado" => 72, "domingo" => 96, "lunes" => 120, "martes" => 144, "miercoles" => 0 ),
            "jueves"    => array("viernes" => 24, "sabado" => 48, "domingo" => 72, "lunes" => 96, "martes" => 120, "miercoles" => 144, "jueves" => 0 ),
            "viernes"   => array("sabado" => 24, "domingo" => 48, "lunes" => 72, "martes" => 96, "miercoles" => 120, "jueves" => 144, "viernes" => 0 ),
            "sabado"    => array("domingo" => 24, "lunes" => 48, "martes" => 72, "miercoles" => 96, "jueves" => 120, "viernes" => 144, "sabado" => 0 ),
            "domingo"   => array("lunes" => 24, "martes" => 48, "miercoles" => 72, "jueves" => 96, "viernes" => 120, "sabado" => 144, "domingo" => 0 )
            );
        //----------------------------------------------------------------------------------------------------------------------

        $i = 0;
        $drogas = "";

        $this->db->query("UPDATE drogas SET activa='0' WHERE idTratamiento='$id'");

        while($this->input->post($i."_droga") != ""){
            $this->db->query("INSERT INTO drogas (`idTratamiento`, `droga`, `dosis`, `proveedor`, `comercial` ) VALUES (
                '$id',
                '".$this->input->post($i."_droga")."',
                '".$this->input->post($i."_cantidad")."',
                '".$this->input->post($i."_proveedor")."',
                '".$this->input->post($i++."_comercial")."'
            )");
        }


        $idDroga = $this->db->insert_id();

        

        $this->db->query("UPDATE detalletratamiento SET droga='$drogas' WHERE idTratamiento='$id'");

        if($delete){
            $this->db->query("DELETE FROM dosis WHERE idTratamiento='$id' AND aplicada='0'");
        }
        
        for($j=0 ; $j < $cant; $j++){
            
            $index = 0;
            

            if(array_search($day, array_keys($dias)) + 1 == sizeof($dias)){
                $indiceDias++;
            }

    //FIX: al reformular el tratamiento de un paciente. Cuando le pongo intervalo de dias y selecciono el domingo no me lo toma despues al cambio.      
            for($i= $indiceBusqueda ; $i <= sizeof($dias); $i++){   // ----------> for($i= $indiceBusqueda ; $i < sizeof($dias); $i++){
                if($i == sizeof($dias)){                            // ----------> if($i == sizeof($dias)-1){
                    $i=0;
                    $indiceDias++;
                }
                if($dias[$this->getKey($dias, $i)] == '1'){
                    $day = $this->getKey($dias, $i);
                    $indiceBusqueda = array_search($day, array_keys($dias)) + 1 < sizeof($dias) ? array_search($day, array_keys($dias)) + 1 : 0;
                   break;
                }
            }

            $query = "INSERT INTO `dosis`(`idTratamiento`, `fechaHoraPrevisto`, `activa`, `tipo`, `droga`, `idDroga`) 
                VALUES ('$id',";
            
            $query .= (($startDay == $day && $indiceDias > 0) || $startDay != $day) ? "DATE_ADD(DATE_FORMAT('$dia $hora' , '%Y-%m-%d %H:%i:%s') ,
            INTERVAL ".($horas[$startDay][$day] + 168 * $indiceDias)." HOUR)," : " DATE_FORMAT('$dia $hora' , '%Y-%m-%d %H:%i:%s'),";
            
            
            $query .= "'1', '1', '$idDroga', '$idDroga')";
            
            $this->db->query($query);
        }

        return $idDroga;
    }
    
    //Devuelve el dia segun el indice que se le pase.
    function getKey($array, $index){
        $i = 0;
        foreach($array as $key => $value){
            if($index == $i){
                return $key;
            }
            $i++;
        }
    }
    
    
    function nuevaReceta($id, $cant, $desc, $fecha, $hora, $fecha_entrega, $hora_entrega){
        echo "$id: ".$id."  $cant: ".$cant."  $desc: ".$desc."  $fecha: ".$fecha."  $hora: ".$hora."  $fecha_entrega: ".$fecha_entrega."  $hora_entrega: ".$hora_entrega;
        echo $this->input->post("tipo_tratamiento");
        echo $this->input->post("0_cantidad");
        /*
        $this->db->trans_start();

        $droga = "";

        if($this->input->post("tipo_tratamiento") == "p"){

            $days = Array();

            if($this->input->post("domingo") == "on") $days[] = "Sun";
            if($this->input->post("lunes") == "on") $days[] = "Mon";
            if($this->input->post("martes") == "on") $days[] = "Tue";
            if($this->input->post("miercoles") == "on") $days[] = "Wed";
            if($this->input->post("jueves") == "on") $days[] = "Thu";
            if($this->input->post("viernes") == "on") $days[] = "Fri";
            if($this->input->post("sabado") == "on") $days[] = "Sat";

            if( $this->input->post("0_cantidad")<>0)
                $res = $this->input->post("cantidadUI") / $this->input->post("0_cantidad");
            else 
                $res = 0;
            switch ($this->input->post("form-field-radio")){
                case "dias" : 
                    $droga = $this->reformularTratamientoDias($id, Array(
                        "lunes" => $this->input->post("lunes") == "on" ? 1 : 0,
                        "martes" => $this->input->post("martes") == "on" ? 1 : 0,
                        "miercoles" => $this->input->post("miercoles") == "on" ? 1 : 0,
                        "jueves" => $this->input->post("jueves") == "on" ? 1 : 0,
                        "viernes" => $this->input->post("viernes") == "on" ? 1 : 0,
                        "sabado" => $this->input->post("sabado") == "on" ? 1 : 0,
                        "domingo" => $this->input->post("domingo") == "on" ? 1 : 0
                        ), $fecha, $hora, FALSE, $res
                    );
                    break;
                case "horas" : 
                    $droga = $this->reformularTratamientoHoras($id, $this->input->post("horas"),
                        $fecha, $hora, FALSE, $res);
                    break;
            }
        }
        else
        {
        }

        $this->db->query("INSERT INTO prescripciones (`idPaciente`, `cantidad`, `descripcion` ,`fechaRecetada`, `fechaEntregada`) VALUES ('$id', '$cant' ,'$desc', DATE_FORMAT('$fecha $hora', '%Y-%m-%d %H:%i:%s'), DATE_FORMAT('$fecha_entrega $hora_entrega', '%Y-%m-%d %H:%i:%s'))");

        $this->db->trans_complete();*/

    }
    
    function getPrescripciones($id){
        return $this->db->query("SELECT * FROM prescripciones WHERE idPaciente='$id'")->result();
    }
    
    function getObraSocial(){
        return $this->db->query("SELECT * FROM obrasocial")->result();
    }

    function getObraSocialPaciente($id){
        return $this->db->query("SELECT * FROM obrasocial WHERE idObrasocial='$id'")->row();   
    }
    
    function getPacientesObraSocial($id){
        return $this->db->query("SELECT * FROM paciente pa
                                    LEFT JOIN perfiles pe ON pa.idUsuario=pe.id_usuario
                                    LEFT JOIN usuario u ON u.idUsuario=pa.idUsuario WHERE
                                    pa.idObraSocial = $id")->result();
    }
    
    function getAdherencia($id){
        return $this->db->query("
            SELECT *, DATE_FORMAT(fecha, '%d.%m.%Y') as fecha FROM adherencia WHERE idPaciente='$id' AND fecha=(SELECT MAX(fecha) FROM adherencia) LIMIT 1
        ")->row();
    }
    
    
    function cargarAdherencia($id, $r1, $r2, $r3, $r4, $r5){
        $this->db->query("INSERT INTO adherencia (`idPaciente`, `pregunta_1`, `pregunta_2`, `pregunta_3`,
                            `pregunta_4`, `pregunta_5`) VALUES ('$id', '$r1', '$r2', '$r3', '$r4', '$r5') ");
    }
    

    function cargarScoreClinico($id){
        $articulaciones = $this->db->query("SELECT * FROM articulacion")->result();
        $prueba = $this->db->query("SELECT * FROM prueba")->result();

        $this->db->query("INSERT INTO score (`idPaciente`) VALUES ('$id')");
        $sc = $this->db->query("SELECT * FROM score WHERE id=(SELECT MAX(id) FROM score WHERE idPaciente=$id) LIMIT 1")->row();

        $query = "INSERT INTO valor (`idArticulacion`, `idPrueba`, `idScore`, `valor`) VALUES ";

        $tabla = Array();

        $flag = false;

        foreach($articulaciones as $ar){
            foreach ($prueba as $pr) {
                if(!$flag){
                    $query .= " ('$ar->id', '$pr->id', '$sc->id', '".
                        ($this->input->post($pr->id."_".$ar->id) != "" ? $this->input->post($pr->id."_".$ar->id) : "NE")
                    ."' )";
                    $flag = true;
                }else{
                    $query .= ", ('$ar->id', '$pr->id', '$sc->id', '".
                        ($this->input->post($pr->id."_".$ar->id) != "" ? $this->input->post($pr->id."_".$ar->id) : "NE")
                    ."' )";
                }
            }
        }

        $this->db->query($query);
    }

    function getPruebas(){
        $prueba = $this->db->query("SELECT * FROM prueba")->result();
        foreach ($prueba as $pr) {
            $tabla[$pr->id]['parametros'] = $this->db->query("SELECT * FROM parametros WHERE idPrueba='$pr->id' ")->result();
            $tabla[$pr->id]['descripcion'] = $pr->descripcion;
            $tabla[$pr->id]['id'] = $pr->id;
        }
        

        return $tabla;
    }

    function getScoreResult($id){
        $articulaciones = $this->db->query("SELECT * FROM articulacion")->result();
        $prueba = $this->db->query("SELECT * FROM prueba")->result();
        $sc = $this->db->query("SELECT *, DATE_FORMAT(fecha, '%d.%m.%Y') as fecha FROM score WHERE id=(SELECT MAX(id) FROM score WHERE idPaciente=$id) LIMIT 1")->row();
        if(isset($sc->id)){
            $resultados = Array();
            foreach($articulaciones as $ar){
                foreach ($prueba as $pr) {
                    $resultados[$ar->id][$pr->id] = $this->db->
                        query("SELECT valor FROM valor WHERE idArticulacion='$ar->id' AND idPrueba='$pr->id' AND idScore='$sc->id'")->row();
                }
            }
            $resultados['score'] = $sc;
            return $resultados;
        }else{
            return false;
        }

    }

    function eliminarPaciente($id){
        $this->db->query("UPDATE paciente INNER JOIN usuario ON usuario.idUsuario = paciente.idUsuario
            INNER JOIN perfiles ON usuario.idUsuario = perfiles.id_usuario
            SET paciente.active=0, usuario.active=0, perfiles.active=0 WHERE idPaciente=$id");
    }

    function editarPacienteInfo($id){
        
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $telefono_personal = $this->input->post("telefono_personal");
        $telefono_casa = $this->input->post("telefono_casa");
        $telefono_oficina = $this->input->post("telefono_oficina");
        $lugar_nacimiento = $this->input->post("lugar_nacimiento");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $genero = $this->input->post("genero");
        $titulo = $this->input->post("titulo");
        $codigo_postal = $this->input->post("codigo_postal");
        $direccion = $this->input->post("direccion");
        $ciudad = $this->input->post("ciudad");
        $pais = $this->input->post("pais");
        $nro_seguridad = $this->input->post("nro_seguridad_social");
        $correo_electronico = $this->input->post("correo_electronico");

        $pac = $this->db->query("SELECT * FROM paciente WHERE idPaciente='$id' LIMIT 1")->row();

        $this->db->query("UPDATE `perfiles` SET `direccion`='$direccion', `nombre`='$nombre', `apellido`='$apellido',
            `ciudad`='$ciudad', `estado`='$pais', `telefono_personal`='$telefono_personal', 
            `telefono_casa`='$telefono_casa', `telefono_oficina`='$telefono_oficina', `genero`='$genero', `lugar_nacimiento`='$lugar_nacimiento', `fecha_nacimiento`='$fecha_nacimiento', 
            `titulo`='$titulo', `codigo_postal`='$codigo_postal', 
            `nro_seguridad_social`='$nro_seguridad', `correo_electronico`='$correo_electronico' WHERE id_usuario='".$pac->idUsuario."'");
        
    }

    function get_articulaciones_diana($id){

        $ri = $this->db->query("SELECT COUNT(DISTINCT(id)) as cant FROM detalledosis WHERE idPaciente=$id AND articulacion LIKE '%Rodilla Izquierda%' GROUP BY articulacion")->row();
        $rd = $this->db->query("SELECT COUNT(DISTINCT(id)) as cant FROM detalledosis WHERE idPaciente=$id AND articulacion LIKE '%Rodilla Derecha%' GROUP BY articulacion")->row();

        $hi = $this->db->query("SELECT COUNT(DISTINCT(id)) as cant FROM detalledosis WHERE idPaciente=$id AND articulacion LIKE '%Tobillo Izquierdo%' GROUP BY articulacion")->row();
        $hd = $this->db->query("SELECT COUNT(DISTINCT(id)) as cant FROM detalledosis WHERE idPaciente=$id AND articulacion LIKE '%Tobillo Derecho%' GROUP BY articulacion")->row();

        $ci = $this->db->query("SELECT COUNT(DISTINCT(id)) as cant FROM detalledosis WHERE idPaciente=$id AND articulacion LIKE '%Codo Izquierdo%' GROUP BY articulacion")->row();
        $cd = $this->db->query("SELECT COUNT(DISTINCT(id)) as cant FROM detalledosis WHERE idPaciente=$id AND articulacion LIKE '%Codo Derecho%' GROUP BY articulacion")->row();

        return Array(
            gettype($ri) == "array" ? "0" : $ri->cant,
            gettype($rd) == "array" ? "0" : $rd->cant,
            gettype($hi) == "array" ? "0" : $hi->cant,
            gettype($hd) == "array" ? "0" : $hd->cant,
            gettype($ci) == "array" ? "0" : $ci->cant,
            gettype($cd) == "array" ? "0" : $cd->cant,
        );
    }

    public function setLote($month, $year, $lote, $id){
        $this->db->query("
            UPDATE dosis SET lote='$lote' WHERE DATE_FORMAT(fechaHoraReal, '%Y')='$year' AND DATE_FORMAT(fechaHoraReal, '%m')='$month' AND idTratamiento='$id'
        ");
    }   


    public function cantDosis($m, $y, $d){

        $days =  Array ("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");

        $first_day = date("D", mktime(0,0,0,$m,1,$y));

        $i = 0;
        $days_on_month = cal_days_in_month(CAL_GREGORIAN, 8, 2003);
        $dosis_days = 0;
        $index_of = array_search($first_day, $days);

        echo $first_day." ".$i." ".$days_on_month."</br>";



        do {

            echo $days[$index_of]." ".$this->key_exist ( $days[$index_of], $d )."</br>";

            if ( $this->key_exist ( $days[$index_of], $d ) ) $dosis_days ++;
            $index_of = $index_of == sizeof($days) - 1 ? 0 : $index_of + 1;

        } while( $i++ < $days_on_month );

        return $dosis_days;

    }

    public function keys_exists($a1, $a2){
        foreach ($a1 as $v) {
            
        }
    }

    public function key_exist($k, $a){
        foreach ($a as $v) {
            if ( $v == $k ) return TRUE;
        }
        return FALSE;
    }

    public function abm_dosis($query){
         $this->db->query($query);
    }

    public function abm_demanda($idPaciente, $fecha, $cantidad, $articulacion)
    {
        $this->db->query("INSERT INTO dosis (idTratamiento, fechaHoraPrevisto, fechaHoraReal, aplicada, tipo) VALUES ($idPaciente, '$fecha', '$fecha', 1, 2)");
        $this->db->query("INSERT INTO detalledosis (tiempo, idPaciente, articulacion, cantidad, fecha) VALUES ('1', $idPaciente, '$articulacion', $cantidad, '$fecha')");
    }

}