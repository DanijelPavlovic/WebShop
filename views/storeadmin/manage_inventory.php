<?php
	// Ispis forme u HTML
		//otvaranje HTML div-a za formu
		echo'<div class="container">';
			echo'<h2>Unesite novi proizvod</h2>';
			echo'<div class="row">';
				echo'<div class="col-sm-4 col-sm-offset-1">';
					echo'<div class="login-form">';

					//otvaranje forme
					echo form_open();

					// greške prilikom validacije
					echo validation_errors();

					//Product name input
					echo 'Product name: ';
					echo form_input('product_name');

					//Price input
					echo 'Price: ';
					echo form_input('price');

					//Details input
					echo 'Details: ';
					echo form_input('details');

					//Komponent dropdown
					echo' Komponente: ';
					$komponente = array (
							'maticne_ploce' => 'Matične ploče',
							'cpu' => 'Procesori',
							'ddr' => 'Memorije',
							'ssd' => 'Solid state diskovi',
							'hdd'=> 'Tvrdi diskovi',
							'gpu' => 'Grafičke kartice',
							'kuc' => 'Kučišta',
							'psu' => 'Napajanja',
							'cool' => 'Hladnjaci'
						);

					echo form_dropdown('komponente',$komponente);


					//Manafacturer dropdown
					echo 'Manafacturer: ';
					
					$proizvodac = array (
							'intel' => 'Intel',
							'amd' => 'AMD',
							'asrock' => 'ASROCK',
							'asus' => 'ASUS',
							'msi'=> 'MSI',
							'biostar' => 'BIOSTAR',
							'gigabyte' => 'Gigabyte',
							'ripjaws' => 'Ripjaws',
							'corsair' => 'Corsair',
							'kingston' => 'Kingston',
							'samsung' => 'Samsung',
							'wd' => 'western_dig'
						);

					echo form_dropdown('komponente',$proizvodac);

				
					//Date added input
					echo 'Date added: ';
					echo form_input('date_added');

					//Stock input
					echo 'Stock: ';
					echo form_input('stock');

					//Image input
					echo 'Image: ';
					echo form_input('image');

					//submit button
					echo form_submit('login_submit', 'Upload');

					// zatvaranje forme
					echo form_close();
					
					echo '</div>';	
				echo '</div>';
			echo '</div>';
		echo '</div>';
	//zatvaranje HTML div-a za formu
	
	
	
?>