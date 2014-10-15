<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
        function __construct() { 
            // Call the constructor 
            parent::__construct();
        }

	public function index()
	{
            $this->load->model('Portfolio', '', TRUE);
            $this->load->model('Member', '', TRUE);
            $data['title']      = "Home";
            $data['portfolio']  = $this->Portfolio->load_portfolio();
            $this->load->view('templates/header',$data);
            $this->load->view('home',$data);
            $this->load->view('templates/footer',$data);
	}
        
}

?>