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
			<h2 class="title text-center">Products  List</h2>
		<?php
					
					$this->load->library('table');
					$this->table->set_heading('Product ID', 'Component', 'Product name', 'Quantity', ' Delete');
					foreach($products as $product)

					$this->table->add_row(	$product['id_products'],
										 	$product['component_name'],
										 	$product['product_name'],
										 	$product['stock'],
										 	'<a href="'.base_url().'Admin/delete_product/'.$product['id_products'].'">'.'<button class="btn btn-default add-to-cart">Delete</button>'
										 	);

					$this->table->set_template(array('table_open' => '<table border="0" cellpadding="5" cellspacing="5" >'));


					echo $this->table->generate();
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