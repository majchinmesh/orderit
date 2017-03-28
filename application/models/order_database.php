<?php

Class Order_Database extends CI_Model {

	// Insert registration data in database
	public function order_insert($user_id) {
	
		$data = array(
			'user_id' => $user_id	
		);
		
		$this->db->insert('orders', $data);
	
		if ($this->db->affected_rows() > 0) {
				return true ;
		}
		
			
		return false ;
			
		
	}
	

	// Read data from database to show data in admin page
	public function get_last_order_id() {
	
		$this->db->select_max('id');
    	$this->db->from('orders');
	 	$result= $this->db->get()->row_array();
     	return $result['id'];
	
	}
	
	public function order_food_insert($order_id,$food_ids ){
		
		foreach ($food_ids as $key => $food_id ) {
    		
			$data = array(
				'order_id' => $order_id,
				'food_id' => $food_id
			);
			
			$this->db->insert('orders_to_foods', $data);
			
			if ($this->db->affected_rows() <= 0) {
				return false ;
			}
		}
		
		return true ;
		
	}

	public function food_ids_from_order_id($order_id){
		
		$this->db->select('food_id');
		$this->db->from('orders_to_foods');
		$condition = "order_id = '".$order_id."'";
		$this->db->where($condition);
	 	$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return false;
		}
		
	}


	public function get_all_pending_orders(){
		
		$this->db->select('*');
		$this->db->from('orders');
		$condition = "pending = 1";
	 	$query = $this->db->get();
		
		if ($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return false;
		}
		
	}


	
}

?>