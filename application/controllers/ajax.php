<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
    
        function __construct() { 
            // Call the constructor 
            parent::__construct();
        }

	public function load_browse($page)
	{
            $this->load->model('Portfolio', '', TRUE);
            $this->load->model('Member', '', TRUE);
            $data['portfolio']  = $portfolio = $this->Portfolio->load_portfolio(($page-1)*10);
            $response = ($portfolio->num_rows())? 1 : 0;
            $content = ($portfolio->num_rows())?  $this->load->view('ajax/load_browse',$data,true) : '';
            echo json_encode(array('response'=>$response,'content'=>$content));
	}
}

?>