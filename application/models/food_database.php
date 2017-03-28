<?php

Class Food_Database extends CI_Model {

	// Insert registration data in database
	public function food_insert($data) {
	
		// Query to check whether food item already exist or not
		$condition = "title =" . "'" . $data['title'] . "'";
		$this->db->select('*');
		$this->db->from('food_items');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			
			// Query to insert data in database
			$this->db->insert('food_items', $data);
			
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			
		} else {
			return false;
		}
	
	}
	
	public function foods_from_food_ids($food_ids){
		
		$condition = "" ;
		
		foreach ($food_ids as $key => $value) {
				
			//print_r();	
			$condition = $condition . "( id = ".$value->food_id." ) OR " ;
			
		}
		$condition = $condition . "FALSE";
		#print_r($condition);
		
		$this->db->select('*');
		$this->db->from('food_items');	
		$this->db->where($condition);

		$query = $this->db->get();
	
		if ($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return false;
		}
		
		
	}
	
	
	
	
	// Read data from database to show data in admin page
	public function get_menu() {
	
	
	$this->db->select('*');
	$this->db->from('food_items');
	
	
	$query = $this->db->get();
	
	
		if ($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return false;
		}
	}
	
}

?>