	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">! On sale !</h2>
						<?php
						// "$products" 
           			 	foreach ($products as $product) 
           			 	{
	                	$id = $product['id_products'];
	               		$name = $product['product_name'];
	               		$description = $product['details'];
	                	$price = $product['price'];
	              		
	                	?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url() . $product['image'] ?>" alt="" />
											<h2><?php echo $product['price'].' HRK'; ?></h2>
											 <?php	echo '<p><a href="'.base_url().'Shop/product_details/'.$product['id_products'].'">'.$product['product_name'].'</a></p>'; ?>
											<?php
                        
				                        // Create form and send values in 'shopping/add' function.
				                        echo form_open('shoppingcart/buy/'.$product['id_products']);
				                        echo form_hidden('id', $id);
				                        echo form_hidden('name', $name);
				                        echo form_hidden('price', $price);
				                        ?> 
				                    
				                        <?php
				                        $btn = array(
				                            'class' => 'btn btn-default add-to-cart',
				                            'value' => 'Add to Cart',
				                            'name' => 'action'
				                        );
				                        
				                        // Submit Button.
				                        echo form_submit($btn);
				                        echo form_close();
                      					?>
										</div>
								</div>
							</div>
						</div>
						
						<?php } ?>
						
						
					</div><!--features_items-->

				</div>
			</div>
		</div>
	</section>