<?php

class Rest_controller extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function get_fissi()
    {
        $fissi=$this->Sys_model->get_fissi('aziende', '00000000000000000000000001068977');
        echo json_encode($fissi);
    }
}
?>