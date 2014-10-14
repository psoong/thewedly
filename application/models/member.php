<?php

class Member extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function load($id){
        $this->db->join('categories', 'categories.id = members.category');
        $query = $this->db->get_where('members', array('members.id' => $id));
        return ($query->num_rows() === 1)? $query->row() : false;
    }
}

?>