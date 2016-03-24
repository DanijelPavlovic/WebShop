<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shoppingcart extends CI_Controller {
    
   
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_cart');
		$this->header['title'] = 'Danijel\'s Web Shop';

		
	}


	public function cart_template()
	{
		$this->load->view('header', $this->header);
		$this->load->view('cart/cart');
		$this->load->view('footer');
	}


	public function buy()
	{	

		$product = $this->model_cart->find($_POST['id']);
		$data = array(
				'id' => $product->id_products,
				'qty' => 1,
				'price' => $product->price,
				'name' => $product->product_name

			); 
		$this->cart->insert($data);
		$this->cart_template();
		
		
	}



	function delete($rowid)
	{
		$this->cart->update(array('rowid' => $rowid, 'qty' =>0));
		$this->cart_template();
	}



	function update()
	{
		$i = 1;

		// provjeri preko modela koliko je quanitty u db ako je tamo 
		foreach($this->cart->contents() as $items)
		{
			$this->cart->update(array('rowid' => $items['rowid'], 'qty' => $_POST['qty'.$i]));
			$i++;
		}
		$this->cart_template();
	}





       
}