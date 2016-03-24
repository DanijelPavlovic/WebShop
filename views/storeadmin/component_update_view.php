<?php
	// Ispis forme u HTML
		//otvaranje HTML div-a za formu
		echo'<div class="container">';
			echo'<div class="row">';
				echo'<div class="col-sm-4 col-sm-offset-1">';
					echo'<div class="login-form">';
					//otvaranje forme
					echo form_open('Admin/update_component');
					// greške prilikom validacije
					echo validation_errors();
					$id = $this->uri->segment(3);
					
					echo form_hidden('id_komponente', $id);
					//username input
					echo 'Component Name: ';
					echo form_input('component_name');
					
					echo form_submit('update', 'Update');
					// zatvaranje forme
					echo form_close();
					
					echo '</div>';	
				echo '</div>';
			echo '</div>';
		echo '</div>';
	//zatvaranje HTML div-a za formu
	
	
	
?>