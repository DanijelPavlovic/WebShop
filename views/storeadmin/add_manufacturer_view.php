<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Admin Panel</h2>
					<div class="panel-group category-products" id="accordian">
						
							<div class="panel panel-default">
								<div class="panel-heading">
								<<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Add to Database
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><h4 class="panel-title"><a href="<?php echo base_url();?>Admin/save_product">Add new product</a></h4>h4></li>
											<li><h4 class="panel-title"><a href="<?php echo base_url();?>Admin/add_manufacturer_view">Add Manufacturer</a></h4></li>
											<br>
											<li><h4 class="panel-title"><a href="<?php echo base_url();?>Admin/add_component_view">Add Component</a></h4></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											View List
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><h4><a href="<?php echo base_url();?>Admin/manufacturer_list_view">Manufacturer list</a></h4></li>
											<li><h4><a href="<?php echo base_url();?>Admin/components_list_view">Components list</a></h4></li>
											<li><h4><a href="<?php echo base_url();?>Admin/products_list_view">Products list</a></h4></li>
											<li><h4><a href="<?php echo base_url();?>Admin/customers_list_view">Customer list</a></h4></li>
											<li><h4><a href="<?php echo base_url();?>Admin/orders_list_view">Orders list</a></h4></li>
										</ul>
									</div>
								</div>
							</div>
							</div>
							</div>
						</div>
					</div>
				</div>

			
			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<h2 class="title text-center">Add new Manufacturer</h2>
						<div class="col-sm-6">
							<div class="single-products">
								<div class=" text-center">

									<?php

									$data = array(
										
										
										);


									// Begining of new product form 
									echo'<div class="container">';
										echo'<div class="row">';
											echo'<div class="col-sm-4 col-sm-offset-2">';
												echo'<div class="login-form">';

												//otvaranje forme
												echo form_open('Admin/add_manufacturer');

												// greške prilikom validacije
												echo validation_errors();

												//Product name input
												echo 'Manufacturer name: ';
												echo form_input('vendor_name');


												//submit button
												echo form_submit('submit', 'Add New Manufacturer');

												// zatvaranje forme
												echo form_close();
												
												echo '</div>';	
											echo '</div>';
										echo '</div>';
									echo '</div>';
								// end of form
								?>

								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>