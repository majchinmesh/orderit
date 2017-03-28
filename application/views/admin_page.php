<?php 
	
	if (isset($food_inserted)) {
		echo '<h2>'.$message_display.'</h2>'  ; 
	}

?>


<div id="main">
			<div id="login">
				<h2>Food Insert Form</h2>
			
				<hr/>
			
				<?php
					echo "<div class='error_msg'>";
						echo validation_errors();
					echo "</div>";
					
					echo "<div class='error_msg'>"; // is set in the Form_help/new_food_insert()
							if (isset($message_display)) {
								echo $message_display;
							}
					echo "</div>";
						
					
					echo form_open('form_help/new_food_insert');
					
						echo form_label('Food Title : ');
						echo"<br/>";
						echo form_input('title');
						
						echo"<br/>";
						
						echo form_label('Picture URL : ');
						echo"<br/>";
						echo form_input('picture_url');
						
						echo"<br/>";

						
						echo"<br/>";
						
						echo form_label('Ingredients : ');
						echo"<br/>";
						echo form_input('ingredients');
						
						echo"<br/>";
						
						
						echo"<br/>";
						
						echo form_label('Price : ');
						echo"<br/>";
						echo form_input('price');
						
						echo"<br/>";
						
						
						
						echo"<br/>";
						
						echo form_label('Veg/Non-veg : ');
						echo"<br/>";
						//echo form_input('');
						$options = array(
						        0         => 'Non-veg',
						        1           => 'Veg',
						);
						
						echo form_dropdown('veg', $options, 0);
						
						echo"<br/>";
						echo"<br/>";
						
							
						echo form_submit('submit', 'Add it');
					
					echo form_close();
				?>
			</div><!-- div login end-->
		</div><!-- div main end-->




