<?php
	// Ispis forme u HTML
		//otvaranje HTML div-a za formu
		echo'<div class="container">';
			echo'<div class="row">';
				echo'<div class="col-sm-4 col-sm-offset-1">';
					echo'<div class="login-form">';
					//otvaranje forme
					echo form_open('Admin/update_manufacturer');
					// greške prilikom validacije
					echo validation_errors();
					//username input
					
					$id = $this->uri->segment(3);
					echo form_hidden('id_proizvodac', $id);

					echo 'Manufacturer Name: ';
					echo form_input('vendor_name');
					
					echo form_submit('submit', 'Update');
					// zatvaranje forme
					echo form_close();
					
					echo '</div>';	
				echo '</div>';
			echo '</div>';
		echo '</div>';
	//zatvaranje HTML div-a za formu
	
	
	
?>