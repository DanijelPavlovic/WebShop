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
			
		<?php
					
					$sub_total = 0;
					echo '<div class="features_items">';
					echo '<div class="col-sm-9">';
						echo '<div class="product-image-wrapper">';
							echo '<div class="single-products">';
									echo '<div class="productinfo text-left">';
										echo '<p><h2>ORDER</h2></p>';
										echo '<p><h5>Order # '.$orders['id_orders'].'</h5></p>';
										echo '<p><h5>Order date: '.$orders['order_date'].'</h5></p>';
										echo '<p><h2>CUSTOMER</h2></p>';
										echo '<p><b>Name:</b> '.$orders['name'].' '.$orders['last_name'].'</p>';
										echo '<p><b>Adress:</b> '.$orders['adress'].'</p>';
										echo '<p><b>Postal code:</b> '.$orders['post_number'].'</p>';
										echo '<p><b>City:</b> '.$orders['city'].'</p>';
										echo '<p><b>Phone:</b> '.$orders['phone'].'</p>';

										echo '<p><h2>PRODUCTS</h2></p>';
										
											$this->load->library('table');
											$this->table->set_heading('Manufacturer', 'Product name', 'Price', 'Quantity');
											$sum=0;
											foreach($orders['products'] as $order['products'])
											{
											
											$this->table->add_row($order['products']['vendor_name'], $order['products']['product_name'], $order['products']['price'].' HRK', $order['products']['quantity']);
											$this->table->set_template(array('table_open' => '<table border="1" cellpadding="4" cellspacing="3" >'));

											$sum+=$order['products']['price'];
											}
											echo $this->table->generate();
											echo '<h2>Total Order Price</h2>'.'<b>'.$sum.'.00 HRK</b>';
										
											
											
									echo'</div>';
								echo'</div>';
							echo'</div>';
						echo'</div>';
					echo'</div>';
					
				
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