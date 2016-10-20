<?php


class principal_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
    }
    
    function addVideo(){
        $_USER_DATA = $this->session->all_userdata();
        $cadena = $this->crearIframe($this->input->post("url"));
        $this->db->insert('videos', array(
            "nombre" => $this->input->post("nombre"),
            "url" => $this->input->post("url"),
             "code" => $cadena,
            "idEspecialista" => $_USER_DATA['idEspecialista']
        ));
        
    }
    function crearIframe($cadena)
    {
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe src=\"//www.youtube.com/embed/$1\/?showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>",$cadena);
           
    }
    
    function getJson(){
      return $this->db->query("SELECT * FROM videos")->result();
    }
    
}



?>