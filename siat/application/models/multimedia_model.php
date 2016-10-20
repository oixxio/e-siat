<?php


class multimedia_model extends CI_Model{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getVideos(){
        return $this->db->query("SELECT * FROM videos")->result();
    }

    public function getPdf(){
        return $this->db->query("SELECT * FROM pdf")->result();   
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

    function addPDF($url, $desc){
        $this->db->insert('pdf', array(
            "desc" => $desc,
            "url" => $url
        ));
    }
    
    
    function crearIframe($cadena){
        return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe src=\"//www.youtube.com/embed/$1\/?showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>",$cadena);
    }
    
}


?>
