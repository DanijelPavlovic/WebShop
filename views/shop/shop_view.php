<section>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left-sidebar">
				<h2>Components</h2>
				<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					<?php
					
					//foreach
					foreach($komponente as $komponenta)
					{
						/*<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Matične ploče</a></h4>
							</div>
						</div>*/

						echo '<div class="panel panel-default">';
							echo '<div class="panel-heading">';
								echo '<h4 class="panel-title"><a href="'.base_url().'Shop/komponenta/'.$komponenta['id_komponente'].'">'.$komponenta['component_name'].'</a></h4>';
							echo '</div>';
						echo '</div>';
					}	
					
					?>
					
					
				</div><!--/category-productsr-->
			</div>
		</div>
		
		
		<div class="col-sm-9 padding-right">
			

			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">Selected Items</h2>
					<?php
				// "$products" send from "shopping" controller,its stores all product which available in database. 
					$num_prod= 0;
           			 foreach ($products as $product) {
	                $id = $product['id_products'];
	                $name = $product['product_name'];
	                $description = $product['details'];
	                $price = $product['price'];

	                $num_prod++;
	                ?>
                <div class="col-sm-4" > 
                    <div class="product-image-wrapper" >
                    	<div class="single-products" >
                    		<div class="productinfo text-center" >
                       			 <img src="<?php echo base_url() . $product['image'] ?>" height="250"  />
                       			 <?php	echo '<h2><a href="'.base_url().'Shop/product_details/'.$product['id_products'].'">'.$product['product_name'].'</a></h2>'; ?>
                  			  			<p><?php /*echo $product['details']*/ echo 'Click on item name for more details'  ?></p>
                  			  			<?php
                        
				                        // Create form and send values in 'shopping/add' function.
				                        echo form_open('shoppingcart/buy/');
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

										<?php

										if($num_prod%3 == 0)
											echo '</div><div class="features_items">';
										 } 


										?>
				
			
			







			</div><!--features_items-->
				<ul class="pagination">
					<li class="active"><a href="">1</a></li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">&raquo;</a></li>
				</ul>
		</div>
	</div><!--col-sm-9-->
</div>
</section>
