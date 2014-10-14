<?php

class Common extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function vdump($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

?>