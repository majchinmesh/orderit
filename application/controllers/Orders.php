<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Orders extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		// Load database
		$this->load->model('order_database');
		$this->load->model('food_database');
	}
	
	public function index(){
			$data = $this->session->userdata ; 
			
			if (isset($data['logged_in'])) {
	
				if($data['logged_in']['admin'] == 2 ){
					
					$orders = $this->order_database->get_all_pending_orders();
					
					if($orders){
					
						foreach ($orders as $key => $order) {
							
								
								$food_ids = $this->order_database->food_ids_from_order_id($order->id) ; 
								 /*
								//print_r($order);
								print_r ($order->id) ;
								
								foreach ($food_ids as $key => $value) {
									
									print_r ($value) ;
									
								}
								echo "<br /><br /><br />";
								continue ;
								*/
								
								if ($food_ids){
								
									$foods = $this->food_database->foods_from_food_ids($food_ids) ;
							
									if($foods){
									
										$data['foods'] = $foods ;
									
										$data['order_details'] = $order ;		
									
										$DATA[$key] = $data ;
									}	
									else{	
										# will be taken care later
										$data['error_message'] = "Non of the food in ".$food_ids." were present in the foods table ... " ;
										$this->load->view('orders_page.php',$data);
									}
						
								}else{
									
									# will be taken care later
									$data['error_message'] = "Order with order id ".$order->id." had no food in it ... " ;
									$this->load->view('orders_page.php',$data);	
												
								}
						}
					
					}else{
						
						$data['error_message'] = "No pending Orders... " ;
						$this->load->view('orders_page.php',$data);	
						
					}
					
					$D['orders'] = $DATA ;
					
					//print_r($D);
					
					//return ;
	
					
					$this->load->view('template/header');
					$this->load->view('template/navigation');
					$this->load->view('orders_page.php',$D);
					$this->load->view('template/footer');
					
					
						
				}else{
					
					header("location: login");
					
				}	
	
				
				
			}
			else{
				
				header("location: login");
				
			}
	}
}
