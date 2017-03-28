
	
		<?php 
		
			if(isset($items)){
				
				echo form_open('form_help/place_order');
				
						foreach($items as $item ) {
		   			 		$food_id = $item->id ; 
		   			 		$food_title = $item->title ;
							$food_image_link = $item->photo_link ;
							$food_ingredients = $item->ingredients ;
							$food_price = $item->price ;
							$food_veg = $item->veg ;
							
		   			 		?>
		   			 		<div class="row">
		   			 		  <div class="col-md-2"></div>
							  <div class="col-md-1"><?php echo $food_id ?></div>
							  <div class="col-md-1"><?php echo $food_title ?></div>
							  <div class="col-md-2"><?php echo '<img class="food_icon" src ="'.$food_image_link.'">' ?></div>
							  <div class="col-md-1"><?php echo $food_ingredients ?></div>
							  <div class="col-md-1"><?php echo $food_veg ?></div>
							  <div class="col-md-1"><?php echo $food_price ?></div>
							  <div class="col-md-1">
							  		
							  		<?php
														
										$data = array(
										        'name'          => 'order[]',
										        'id'            => $item->id,
										        'value'         => $item->id,
										        'checked'       => FALSE,
										        'style'         => 'margin:10px'
										);
										
										echo form_checkbox($data);
										
										?>
							  	
							  </div>
							  <div class="col-md-2"></div>
							</div>
		   			 		
		   			 		
							<?php
							echo'<br />';
							echo'<br />';
						}
						
				echo"<br/>";
				echo"<br/>";
						
							
				echo form_submit('submit', 'Place Order');
					
				echo form_close();
						
			}
			else if(isset($order_confirm_message)){
				
				echo "<h2>".$order_confirm_message."</h2>"	;
				echo '<h3><a href="'.base_url().'home">Click </a> to go back home</h3>';
				
			}
			else if (isset($order_failed)){
				
				echo "<h2>".$order_failed."</h2>"	;
				
			}
		
		
		?>
	
<!--
	</body>
</html>
-->