<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('food_database');
	}
	
	public function index(){
			$data = $this->session->userdata ; 
			
			
			
			
			if (isset($data['logged_in'])) {
	
				$result = $this->food_database->get_menu();
				
				//print_r($result);
				//return;
				
				if($result){
					
					$data['items'] = $result ;
			
						
				}else{
					
					$data['items'] = FALSE ;
					
				}	
	
				$this->load->view('template/header');
				$this->load->view('template/navigation');
				$this->load->view('home_page.php',$data);
				$this->load->view('template/footer');
			}
			else{
				
				header("location: login");
				
			}
	}
}
