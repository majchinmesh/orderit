<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	public function index(){
			$data = $this->session->userdata ; 
			//print_r($data);
			
			if (isset($data['logged_in'])) {
				
				if( $data['logged_in']['admin'] == 1 ){
					
					$this->load->view('template/header');
					$this->load->view('template/navigation');
					$this->load->view('admin_page.php');
					$this->load->view('template/footer');

				}
				else{
					
					// if non admin, but user tries to login to admin, he goes to user page	
					//$this->load->view('home_page.php');
					header("location: home");
				}
			}
			else{
				
				header("location: login");
				
			}
	}
}
