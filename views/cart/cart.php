<section>
        <div class="container">
                <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                                <h2 class="title text-center">Cart Items</h2>
                                        <?php echo form_open('shoppingcart/update'); ?>

                                        <table cellpadding="12" cellspacing="1"  border="1">
                                        <?php echo anchor('Shop','Continue Shopping', array('class' => 'btn btn-default add-to-cart'));  ?>
                                                <tr>
                                                        <th>Item ID</th>
                                                        <th>Item Description</th>
                                                        <th style="text-align:right">Item Price</th>
                                                        <th>Quantity</th>
                                                        <th style="text-align:right">Sub-Total</th>
                                                        <th align="center">Remove</th>  
                                                </tr>

                                                <?php $i = 1; ?>

                                                <?php foreach ($this->cart->contents() as $items): ?>

                                                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                                                <tr>    
                                                        <!-- Display Item ID -->
                                                        <td><?php echo $items['id']; ?></td>

                                                        <!-- Display Item Description -->
                                                         <td>
                                                                <?php echo $items['name']; ?>

                                                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                                                        <p>
                                                                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                                                <?php endforeach; ?>
                                                                        </p>

                                                                <?php endif; ?>
                                                        </td>
                                                        <!-- Display Item Price -->
                                                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>

                                                        <!-- Display Item Quantity -->
                                                        <td><?php echo form_input(array('name' => 'qty'.$i, 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>

                                                        <!-- Display Item Sub-Total -->
                                                        <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>

                                                        <!-- Remove item-->
                                                        <td><?php echo anchor('shoppingcart/delete/'.$items['rowid'], 'Remove product'); ?></td>    
                                                </tr>


                                                <?php $i++; ?>

                                                <?php endforeach; ?>

                                                <tr>
                                                        <td colspan="3"> </td>
                                                        <td class="right"><strong>Total</strong></td>
                                                        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                                        <td></td>
                                                </tr>
                                        </table>
                                        <?php form_close(); ?>
                                        <br>
                                        <p>
                                            <?php echo form_submit('', 'Update your Cart', array('class' => 'btn btn-default add-to-cart')); ?> 
                                            <?php echo anchor('Checkout','Place Order', array('class' => 'btn btn-default add-to-cart')); ?>
                                        </p>

                        </div>
                </div><!--col-sm-9-->
        </div>
</section>




