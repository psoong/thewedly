<?php

class Portfolio extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function load_portfolio($offset=0){
        $this->db->order_by("id", "desc"); 
        return $this->db->get_where('portfolios', array('status'=>1,'admin_approval'=>1), 15, $offset);
    }
}

?>