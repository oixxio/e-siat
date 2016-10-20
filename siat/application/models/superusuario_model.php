<?php


class superusuario_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }

    //regex_replace('[a-zA-Z: \-]', '', log.message) as message,

    public function getPacientes($dFilter = NULL, $patologia = 1){

		$data = Array();
		
		$dFilter = $dFilter == "NULL" ? NULL : $dFilter;
		
        if($patologia == 1 ){
        $result = $this->db->query("SELECT 
            p.*, osC.descripcion, u.*, t.*, t.idTratamiento as id_tratamiento, dosis.fechaHoraPrevisto , espP.nombre as nombreEspecialista, espP.apellido as apellidoEspecialista,
            TIMESTAMPDIFF(HOUR, dosis.fechaHoraPrevisto, NOW()) as desvio_last_dosis,
            TIMESTAMPDIFF(DAY, timeTo.fechaHoraPrevisto, NOW()) as time_to_end, u.active as isActive, DATE_FORMAT(per.created, '%d.%m.%Y') as fecha_alta, per.imagen_perfil as imagen_perfil
			
            FROM paciente p 
                LEFT JOIN usuario u ON u.idUsuario = p.idUsuario
                LEFT JOIN especialista e ON e.idEspecialista = p.idEspecialista
                LEFT JOIN perfiles per ON per.id_usuario = u.idUsuario
                LEFT JOIN perfiles espP ON espP.id_usuario = e.idUsuario
                LEFT JOIN tratamiento t ON t.idPaciente = p.idPaciente
                LEFT JOIN obrasocial osC ON p.idObraSocial = osC.idObraSocial
                LEFT JOIN log ON log.id=(SELECT MAX(id) FROM log WHERE idUsuario=u.idUsuario AND message LIKE '%VERSION%' LIMIT 1)
                LEFT JOIN dosis ON  
                	dosis.idDosis=
                	(SELECT MIN(d.idDosis) FROM dosis d WHERE d.aplicada=0 AND d.tipo=1 AND d.idTratamiento=t.idTratamiento AND d.activa=1)
                LEFT JOIN dosis timeTo ON timeTo.idDosis=(SELECT MAX(d1.idDosis) FROM dosis d1 WHERE d1.idTratamiento=t.idTratamiento) 
                WHERE idPatologia = 1
                ORDER BY u.active DESC, u.idUsuario ASC
            ")->result();
        }
        else{
            if($patologia == 0) $comp = "<> 1";
            else $comp = "= ".$patologia;

            $result = $this->db->query("SELECT 
            p.*, osC.descripcion, u.*, t.*, t.idTratamiento as id_tratamiento, dosis.fechaHoraPrevisto , espP.nombre as nombreEspecialista, espP.apellido as apellidoEspecialista,
            TIMESTAMPDIFF(HOUR, dosis.fechaHoraPrevisto, NOW()) as desvio_last_dosis,
            TIMESTAMPDIFF(DAY, timeTo.fechaHoraPrevisto, NOW()) as time_to_end, u.active as isActive, DATE_FORMAT(per.created, '%d.%m.%Y') as fecha_alta, per.imagen_perfil as imagen_perfil
            
            FROM paciente p 
                LEFT JOIN usuario u ON u.idUsuario = p.idUsuario
                LEFT JOIN especialista e ON e.idEspecialista = p.idEspecialista
                LEFT JOIN perfiles per ON per.id_usuario = u.idUsuario
                LEFT JOIN perfiles espP ON espP.id_usuario = e.idUsuario
                LEFT JOIN tratamiento t ON t.idPaciente = p.idPaciente
                LEFT JOIN obrasocial osC ON p.idObraSocial = osC.idObraSocial
                LEFT JOIN log ON log.id=(SELECT MAX(id) FROM log WHERE idUsuario=u.idUsuario AND message LIKE '%VERSION%' LIMIT 1)
                LEFT JOIN dosis ON  
                    dosis.idDosis=
                    (SELECT MIN(d.idDosis) FROM dosis d WHERE d.aplicada=0 AND d.tipo=1 AND d.idTratamiento=t.idTratamiento AND d.activa=1)
                LEFT JOIN dosis timeTo ON timeTo.idDosis=(SELECT MAX(d1.idDosis) FROM dosis d1 WHERE d1.idTratamiento=t.idTratamiento) 
                WHERE idPatologia $comp
                ORDER BY u.active DESC, u.idUsuario ASC
            ")->result();
        }  

		foreach ($result as $k => $r) {
			$data [$k] = $r;
			
			$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$r->idPaciente.
				($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" )
			." AND aplicada=1 AND tipo=1  AND activa=1 ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
						
			$data[$k]->totalprofilaxis = $dosis->num_rows();
			
			$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$r->idPaciente.
				($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" )
			." AND aplicada=1 AND tipo=2  AND activa=1 ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
			$data [$k]->totaldemanda = $dosis->num_rows();
			
			$dosis = $this->db->query("SELECT * FROM dosis WHERE idTratamiento=".$r->idPaciente.
				($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" )
			." AND aplicada=1 AND tipo=1  AND activa=1 AND
								DATE_ADD(fechaHoraPrevisto, INTERVAL 30 MINUTE) < fechaHoraReal ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
			
			$data [$k]->retrasada = $dosis->num_rows();
	
			$dosis = $this->db->query("SELECT MAX(TIMESTAMPDIFF(HOUR, fechaHoraPrevisto, fechaHoraReal)) as max FROM dosis WHERE idTratamiento=".$r->idPaciente.
				($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" )
			." AND aplicada=1 AND tipo=1 AND activa=1 LIMIT 1");
			$max = $dosis->row();
	
			$data [$k]->maxDesvio = $max->max;
			
		}
		
		return $data;

    }

    public function desactivar($idUsuario){
        $this->db->query("UPDATE usuario SET active=0 WHERE idUsuario=$idUsuario");
    }
	
	public function getEspecialistas(){
		return $this->db->query("SELECT *, u.active as active FROM especialista e 
                LEFT JOIN usuario u ON u.idUsuario = e.idUsuario
				LEFT JOIN perfiles p ON p.id_usuario = u.idUsuario
                ORDER BY u.active DESC, u.idUsuario ASC
            ")->result(); 
	}

    public function activar($idUsuario){
        $this->db->query("UPDATE usuario SET active=1 WHERE idUsuario=$idUsuario");
    }

    public function eliminar($idUsuario){
        $paciente = $this->db->query("SELECT * FROM paciente WHERE idUsuario=$idUsuario LIMIT 1")->row();
        $tratamiento = $this->db->query("SELECT * FROM tratamiento WHERE idPaciente=$paciente->idPaciente LIMIT 1")->row();
        $prueba = $this->db->query("SELECT * FROM score WHERE idPaciente=$paciente->idPaciente LIMIT 1")->row();

        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM accidente WHERE id_paciente=$paciente->idPaciente");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM adherencia WHERE idPaciente=$paciente->idPaciente");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM archivos_historia WHERE idPaciente=$paciente->idPaciente");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM autotest WHERE id_paciente=$paciente->idPaciente");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM detalledosis WHERE idPaciente=$paciente->idPaciente");
        if(isset($tratamiento->idTratamiento)) $this->db->query("DELETE FROM detalletratamiento WHERE idTratamiento=$tratamiento->idTratamiento");
        if(isset($tratamiento->idTratamiento)) $this->db->query("DELETE FROM dosis WHERE idTratamiento=$tratamiento->idTratamiento");
        $this->db->query("DELETE FROM mensajes WHERE mensajes.from=$idUsuario OR mensajes.to=$idUsuario");
        $this->db->query("DELETE FROM notificaciones WHERE involvedB_idUsuario=$idUsuario OR involvedA_idUsuario=$idUsuario");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM prescripciones WHERE idPaciente=$paciente->idPaciente");
        if(isset($prueba->id)) $this->db->query("DELETE FROM valor WHERE idScore=$prueba->id");        
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM score WHERE idPaciente=$paciente->idPaciente");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM turno WHERE idPaciente=$paciente->idPaciente");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM tratamiento WHERE idPaciente=$paciente->idPaciente");
        $this->db->query("DELETE FROM perfiles WHERE id_usuario=$idUsuario");
        if(isset($paciente->idPaciente)) $this->db->query("DELETE FROM paciente WHERE idPaciente=$paciente->idPaciente");
        $this->db->query("DELETE FROM usuario WHERE idUsuario=$idUsuario");

    }

    function getPacientesJson(){

        $firstMatch = false;
        $query = "SELECT p.*, u.*, u.active as active, espP.nombre as nombreEspecialista, espP.apellido as apellidoEspecialista 
                    FROM paciente p 
                    LEFT JOIN usuario u ON u.idUsuario = p.idUsuario
                    LEFT JOIN especialista e ON e.idEspecialista = p.idEspecialista
                    LEFT JOIN perfiles per ON per.id_usuario = u.idUsuario
                    LEFT JOIN perfiles espP ON espP.id_usuario = e.idUsuario ";

        foreach($_POST as $key => $value){
            if($firstMatch){
                $query .= "WHERE $key = $value ";
                $firstMatch = false;
            }else{
                $query .= "AND $key = $value";
            }
        }

        return $this->db->query($query)->result();
    }
	
	public function changeEspecialista($idPaciente, $idEspecialista){
		$this->db->query("UPDATE paciente SET idEspecialista=$idEspecialista WHERE idUsuario=$idPaciente");
	}
	
	public function addEspecialista($args){
	    $salt = md5(uniqid(rand(), true));
        $hash = hash('sha512', $salt.$args['contrasenia']);
        $this->db->query("INSERT INTO usuario (`nombreUsuario`,`hash`, `salt` ,`tipoUsuario`) VALUES ('".$args['usuario']."', '$hash', '$salt' ,'especialista')");
        $resultado = $this->db->query("SELECT * FROM usuario WHERE SHA2(CONCAT(salt,'".$args['contrasenia']."'), 512) = hash AND nombreUsuario='".$args['usuario']."' LIMIT 1")->row();
	
        $this->db->query("INSERT INTO perfiles ( `correo_electronico`, `telefono_casa`, `telefono_oficina`, `telefono_personal`, `estado`, `ciudad`, `nombre`, `apellido`, `id_usuario`) 
			VALUES ('".$args['email']."', '".$args['tel_hogar']."', '".$args['tel_oficina']."', '".$args['tel_personal']."', '".$args['pais']."',
			'".$args['ciudad']."', '".$args['nombre']."', '".$args['apellido']."', $resultado->idUsuario)");
			
        $this->db->query("INSERT INTO especialista (`idUsuario`) VALUES ('$resultado->idUsuario')");
	}
	
	public function editarEspecialista($args, $id){
	   
        $this->db->query("UPDATE perfiles SET `correo_electronico`='".$args['email']."', `telefono_casa`='".$args['tel_hogar']."', `telefono_oficina`='".$args['tel_oficina']."',
				`telefono_personal`='".$args['tel_personal']."', `estado`='".$args['pais']."', `ciudad`='".$args['ciudad']."', `nombre`='".$args['nombre']."',
				`apellido`='".$args['apellido']."' WHERE id_usuario=$id");
		
	}
	
	public function get_especialista_json($id){
		$json = Array();
		$usuario = $this->db->query("SELECT * FROM usuario u LEFT JOIN perfiles p ON p.id_usuario = u.idUsuario WHERE idUsuario=$id LIMIT 1")->result();
		foreach($usuario as $key => $val){
			$json[$key] = $val;
		}
		return $json;
	}
	
	public function defaultPass($id, $pass){
		$salt = md5(uniqid(rand(), true));
        $hash = hash('sha512', $salt.$pass);
		$this->db->query("UPDATE usuario SET hash='$hash', salt='$salt' WHERE idUsuario=$id");
	}

    public function getObraSocial(){
        return $this->db->query("SELECT * FROM obrasocial LEFT JOIN usuario ON usuario.idUsuario = obrasocial.idUsuario")->result();
    }

    public function agregarObraSocial(){
        $p = $this->input->post("pass");
        $u = $this->input->post("user");
        $n = $this->input->post("name");
        $salt = md5(uniqid(rand(), true));
        $hash = hash('sha512', $salt.$p);
        $this->db->query("INSERT INTO usuario (nombreUsuario, hash, salt, tipoUsuario) VALUES ('$u', '$hash', '$salt', 'obrasocial')");
        $result = $this->db->query("SELECT * FROM usuario WHERE nombreUsuario='$u' AND hash='$hash' LIMIT 1")->row();
        $this->db->query("INSERT INTO obrasocial (nombre, descripcion, idUsuario) VALUES ('$n', '$n', $result->idUsuario) ");
        $this->db->query("INSERT INTO perfiles (id_usuario, imagen_perfil) VALUES ($result->idUsuario, 'default.png')");
    }

    public function eliminarObraSocial($id){
        $this->db->query("DELETE FROM obrasocial WHERE idUsuario=$id");
        $this->db->query("DELETE FROM usuario WHERE idUsuario=$id");
        $this->db->query("DELETE FROM perfiles WHERE id_usuario=$id");
    }

    public function doUpload($id, $nombre){
        $idUsuario = $this->db->select('idUsuario')->from("paciente")->where("idPaciente",$id)->get()->row();      
        $this->db->query("UPDATE perfiles SET imagen_perfil='$nombre' WHERE id_usuario=$idUsuario->idUsuario");
    }

    public function updatePass($usuario, $oldP, $newP, $idUsuario){
        
        $newP = $newP != "" ? $newP : $oldP;
        $salt = md5(uniqid(rand(), true));
        
        $result = $this->db->query("SELECT * FROM usuario WHERE SHA2(CONCAT(salt,'$oldP'), 512) = hash AND idUsuario='$idUsuario' LIMIT 1")->row();
        
        if(isset($result->idUsuario)){
            $this->db->query("UPDATE usuario SET nombreUsuario='$usuario', hash=SHA2(CONCAT('$salt','$newP'), 512) , salt='$salt' WHERE idUsuario='$result->idUsuario' ");
            return true;
        }
        
        return false;
        
    }

    public function get_all_patients(){
        return $this->db->get("paciente")->result();
    }

    public function get_logs($sString, $uId){
        $this->db->select("*")
                 ->from("log");
        if($sString != "" && $sString != 0){
            $this->db->like("desc", $sString);
        }
        if($uId != "" && $uId != 0){
            $this->db->where("idUsuario", $uId);
        }
        $this->db->order_by("fecha", "desc");
        $this->db->limit("500");
        return $this->db->get()->result();
    }

    function eliminarDosis($idPaciente){
        $id = $this->db->query("SELECT * FROM tratamiento WHERE idPaciente=$idPaciente")->row();
        $this->db->query("DELETE FROM dosis WHERE idTratamiento=$id->idTratamiento AND ((aplicada=0 AND activa=0) OR aplicada=0)");
    }

    public function getDroga($id){
        return $this->db->query("SELECT * FROM drogas WHERE id = (SELECT MAX(id) FROM drogas WHERE idTratamiento=$id AND activa=1 ) LIMIT 1")->row();
    }

    public function getAllDrugs($idPaciente = 0){
        if($idPaciente!=0){
            $tipo = $this->db->query("SELECT idPatologia FROM paciente WHERE idPaciente=$idPaciente")->row();
            if($tipo->idPatologia == 1)
                return json_encode($this->db->select("*")->from("drogas_info")->where("tipo",0)->get()->result());
            else
                return json_encode($this->db->select("*")->from("drogas_info")->where("tipo",1)->get()->result());
        }
        else 
            return json_encode($this->db->select("*")->from("drogas_info")->get()->result());
    }

    public function getObraSocials(){
        return $this->db->select("*")->from("obrasocial")->get()->result();
    }

    public function cambioObraSocial($idP, $idO){
        $this->db->where("idPaciente", $idP);
        $this->db->update("paciente", Array(
            "idObraSocial" => $idO
        ));
    }

    public function calcularDesvio($a, $b, $c){
        $dosis = $this->db->query("SELECT MAX(TIMESTAMPDIFF(HOUR, fechaHoraPrevisto, fechaHoraReal)) as max FROM dosis WHERE
             idTratamiento=".$c." 
             AND aplicada=1 
             AND tipo=1 
             AND DATE_FORMAT('$a', '%Y-%m-%d') < DATE_FORMAT(fechaHoraPrevisto, '%Y-%m-%d')
             AND DATE_FORMAT('$b', '%Y-%m-%d') > DATE_FORMAT(fechaHoraPrevisto, '%Y-%m-%d')
             LIMIT 1")->row();
        return $dosis->max;
    }

    function agregarSimpleDosis(
            $idPaciente,
            $fechaHoraPrevisto,
            $fechaHoraReal,
            $demanda,
            $aplicada
        ){

        $droga = $this->db->query("SELECT * FROM drogas WHERE id=(SELECT MAX(id) FROM drogas WHERE idTratamiento=$idPaciente AND activa=1) LIMIT 1")->row();

        $this->db->insert('dosis', Array(
            "fechaHoraPrevisto" => $fechaHoraPrevisto,
            "fechaHoraReal" => $aplicada == "on" ? $fechaHoraReal : "0",
            "idTratamiento" => $idPaciente,
            "aplicada" => $demanda == "on" ? 1 : $aplicada == "on" ? 1 : 0,
            "tipo" => $demanda == "on" ? 2 : 1,
            "idDroga" => $droga->id,
            "droga" => $droga->id
        ));

    }

    public function deleteOne($idDosis){
        $this->db->where('idDosis', $idDosis);
        $this->db->delete('dosis');
    }

    public function permission($sRole, $sModule){
        return $this->db->select("*")
                        ->from("modulos")
                        ->join("roles", "roles.name = '$sRole'", "LEFT", FALSE)
                        ->join("permisos", "permisos.role = roles.id AND modulos.id = permisos.module", "LEFT", FALSE)
                        ->where("modulos.modName", $sModule)
                        ->get()
                        ->row();
    }

    public function get_all_permisions($sRole){
        $result = Array();
        $perm = $this->db->select("*")
                        ->from("roles")
                        ->join("permisos", "permisos.role = roles.id", "LEFT", FALSE)
                        ->join("modulos", "permisos.module = modulos.id", "LEFT", FALSE)
                        ->where("roles.name", $sRole)
                        ->get()
                        ->result();
        foreach ($perm as $key => $value) {
            $result[$value->modName] = $value->perm;
        }
        return $result;
    }

    public function confirmarReceta($fecha, $hora, $cant, $lote, $idPresc){
        $this->db->where('id', $idPresc);
        $this->db->update('prescripciones', Array(
            "fechaEntregada" => $fecha." ".$hora,
            "cantidadEntregada" => $cant,
            "lote" => $lote,
            "entregada" => "1"
        )); 
    }
	
	public function getMetricasGenerales($dFilter = NULL){
	
		$metr = Array();
		
		$dFilter = $dFilter == "NULL" ? NULL : $dFilter;
		
		$dosis = $this->db->query("SELECT * FROM dosis WHERE aplicada=1 ".
		($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" ).
		" AND tipo=1  AND activa=1 ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
		
		$metr['profilaxis'] = $dosis->num_rows();
		
		$dosis = $this->db->query("SELECT * FROM dosis WHERE aplicada=1 ".
		($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" ).
		" AND tipo=2  AND activa=1 ORDER BY DATE_FORMAT(fechaHoraReal, '%Y-%m-%d') ASC");
		
		$metr['demanda'] = $dosis->num_rows();
		
		$metr['total'] = $metr['profilaxis'] + $metr['demanda'];
		 
		//SUM(CONVERT(drogas.dosis, UNSIGNED INTEGER)) as cant 
		
		$dosis = $this->db->query("SELECT CONCAT( TRUNCATE(SUM(CONVERT(drogas.dosis, UNSIGNED INTEGER)) / 100000, 2), 'M' ) as cant  FROM dosis
		LEFT JOIN drogas ON drogas.id = dosis.idDroga
		WHERE dosis.aplicada=1 ".
			($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" ).
		" AND dosis.activa=1")->row();
								
		$metr['uiaplicados'] = $dosis->cant;
		 
		$dosis = $this->db->query("SELECT *, TIMESTAMPDIFF(HOUR, fechaHoraPrevisto, NOW()) as dif FROM paciente LEFT JOIN dosis ON dosis.idDosis = 
			(SELECT MIN(idDosis) FROM dosis d WHERE d.activa=1 AND d.aplicada=0 AND d.idTratamiento=paciente.idPaciente) ORDER BY dif DESC LIMIT 3")->result();
		
		$metr['pacientesmorosos'] = $dosis;
		
		//, ' #percent % {y}'
		
		$dosis = $this->db->query("SELECT (SUM(CONVERT(drogas.dosis, UNSIGNED INTEGER)) / 100000) as y, CONCAT(proveedor) as label FROM dosis
			LEFT JOIN drogas ON drogas.id = dosis.idDroga
			WHERE dosis.aplicada=1 ".
		($dFilter != NULL ? " AND DATE_FORMAT(fechaHoraPrevisto, '%Y-%m')='".$dFilter."'" : "" ).
		" AND dosis.activa=1 AND proveedor <> '' GROUP BY proveedor")->result();
			
		$metr['proveedor']	= $dosis;
		
		$dosis = $this->db->query(
			"SELECT *, obrasocial.descripcion as nombreObraSocial, TIMESTAMPDIFF(DAY, fechaRecetada, NOW()) as dif, paciente.nombre as nombre
			 FROM prescripciones 
				LEFT JOIN paciente ON prescripciones.idPaciente = paciente.idPaciente 
				LEFT JOIN obrasocial ON obrasocial.idObraSocial = paciente.idObraSocial
			WHERE prescripciones.entregada = 0 ORDER BY fechaRecetada DESC	LIMIT 3
			"
		)->result();
		 
		$metr['retrasos']	= $dosis;
		
		return $metr;
		
	}
	
	public function last_tratamiento ($idPac) {
		return $this->db->query("SELECT * FROM drogas WHERE id=( SELECT idDroga FROM dosis WHERE idDosis=(SELECT MAX(idDosis) FROM dosis WHERE idTratamiento=$idPac AND aplicada=1 AND activa=1))")->row();	
	}

}