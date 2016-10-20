<?php


class utils extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function checkUserNameExist(){
        
        $userName = $this->input->post("userName");
        
        $this->load->model("utils_model");
        
        echo $this->utils_model->checkUserNameExist($userName);
        
    }
    
    public function setViewed(){
        $this->load->model("utils_model");
        $this->utils_model->setViewed();
    }
    
}


?>
