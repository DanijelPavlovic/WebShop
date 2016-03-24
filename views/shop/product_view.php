<section>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="left-sidebar">
				<h2>Komponente</h2>
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

		<!-- Product Display -->
		<div class="col-sm-9 padding-right">
			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">Product details</h2>
				
				<!-- Product image -->
				<div class="col-sm-6">
						<div class="single-products">
							<div class=" text-center">
								<img class="product_img" src="<?=base_url().$product['image'] ?>" alt=""  width="400"/>
							</div>
						</div>
					</div>

				<!-- Product info -->
				<div class="col-sm-6">
						<div class="single-products" >
								<h2>Manafacturer: <?= $product['vendor_name'] ?> </h2>
								<br>
								<p><b>Name: </b><?= $product['product_name'] ?></p>
								<br>
								<p><b>Price:</b> <?= $product['price'] ?> HRK</p>
								<br>
								<p><b>Stock:</b> <?= $product['stock'] ?></p>
								<br>
								<?php
                        
				                        // Create form and send values in 'shopping/add' function.
				                        echo form_open('shoppingcart/buy/');
				                        echo form_hidden('id', $product['id_products']);
				                        echo form_hidden('name', $product['product_name']);
				                        echo form_hidden('price', $product['price']);
				                        echo form_hidden('vendor', $product['vendor_name']);
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


				<!-- Product Description -->
				<div class="features_items">
					<div class="col-sm-12">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class=" text-center">
								<br>
								<h2 class="title text-center">Description</h2>
								<p class=" text-left"><pre>	<?= $product['details'] ?></pre></p>
							</div>
						</div>
					</div>
				</div>
			</div><!--features_items-->
		</div>
	</div><!--col-sm-9-->
</div>
</section>
