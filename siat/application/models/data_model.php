<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }

    function getMessages($f, $t, $lastId){
        return  $this->db->query("select * from mensajes where id > ".$lastId." and ( id_from = ".$f." and id_to = ".$t." or id_from = ".$t." and id_to = ".$f.") ")->result();       
    }

    function setMessage($f, $t, $m){
    	echo $f;
        $data = array(
           'id_from' => $f ,
           'id_to' => $t ,
           'mensaje' => $m
        );
        $this->db->insert('mensajes', $data); 
    }
}
?>