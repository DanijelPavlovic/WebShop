<?php
	// Ispis forme u HTML
		//otvaranje HTML div-a za formu
		echo'<div class="container">';
			echo'<div class="row">';
				echo'<div class="col-sm-4 col-sm-offset-1">';
					echo'<div class="login-form">';
					//otvaranje forme
					echo form_open('Admin/login_validation');
					// greške prilikom validacije
					echo validation_errors();
					//username input
					echo 'Username: ';
					echo form_input('username');
					//password input
					echo 'Password: ';
					echo form_password('password');
					//submit button
					echo form_submit('', 'Login');
					// zatvaranje forme
					echo form_close();
					
					echo '</div>';	
				echo '</div>';
			echo '</div>';
		echo '</div>';
	//zatvaranje HTML div-a za formu
	
	
	
?>