<?php


class agenda extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("agenda_model");
        $this->load->helper("url");
        $this->load->library("session");
    }
    
    public function index(){
        
        $data['data'] = $this->session->all_userdata();
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
            "elements" => base_url()."assets/js/ace-elements.min.js",
            "ace" => base_url()."assets/js/ace.min.js"
        );
        
        $this->load->view("agenda/principal", $data);
        
    }
    
    
    public function getJson(){
        $iDisplayDir = $this->input->post("iSortDir_0");
        $columns = explode(",", $this->input->post("sColumns"));
        $iDisplayBy = $columns[$this->input->post("iSortCol_0")];
        $sSearch = $this->input->post("sSearch");
        $iDisplayOffset = $this->input->post("iDisplayStart");
        $iDisplayLength = $this->input->post("iDisplayLength");
        $_DATA = $this->agenda_model->getJson(
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
    
    
}


?>