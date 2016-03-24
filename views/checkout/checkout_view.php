<section>
	<div class="container">
		<div class="row">
			<!-- Checkout title -->
			<div class="col-sm-5 padding-left">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-left">Please enter your information </h2>
					
					<?php

					// Ispis forme u HTML
						//otvaranje HTML div-a za formu
						echo'<div class="container">';
							echo'<div class="row">';
								echo'<div class="col-sm-4 col-sm-offset 0">';
									echo'<div class="login-form">';
									

									echo form_open('Checkout/save_order');
									
									echo validation_errors();
									
									echo 'Name: ';
									echo form_input('name');
									
									echo 'Last name: ';
									echo form_input('last_name');
									
									echo 'Adress: ';
									echo form_input('adress');

									echo 'City: ';
									echo form_input('city');

									echo 'Phone: ';
									echo form_input('phone');

									echo 'Postal code: ';
									echo form_input('post_number');


									echo form_submit('', 'Purchase');
									
									echo form_close();
									
									echo '</div>';	
								echo '</div>';
							echo '</div>';
						echo '</div>';
					//zatvaranje HTML div-a za formu
		
					?>
				</div>
			</div><!--col-sm-9-->
		</div>
	</div>
</section>





