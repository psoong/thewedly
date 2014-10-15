<?php

class Portfolio extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function load_portfolio($offset=0){
        return $this->db->get_where('portfolios', array('pin_type' => 'image','status'=>1,'admin_approval'=>1), 10, $offset);
    }
}

?>