<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('model_checkout');
		$this->header['title'] = 'Danijel\'s Web Shop';
	}
	
	
	
	public function index()
	{	
		$this->checkout_template();	
	}
	

	// Main billing site
	public function checkout_template()
	{
		$this->load->view('header', $this->header);
		$this->load->view('checkout/checkout_view');
		$this->load->view('cart/cart_display');
		$this->load->view('footer');
	}
	
	// success page
	public function checkout_success_template($ord_id)
	{
		$data['order_id'] = $ord_id;
		$this->load->view('header', $this->header);
		$this->load->view('checkout/checkout_success', $data);
		$this->load->view('footer');
	}




	public function save_order()
	{
		// This will store all values which inserted  from user.
		$customer = array(
			'name' 			=> $this->input->post('name'),
			'last_name' 	=> $this->input->post('last_name'),
			'adress' 		=> $this->input->post('adress'),
			'city' 			=> $this->input->post('city'),
			'phone' 		=> $this->input->post('phone'),
			'post_number'	=> $this->input->post('post_number')
		);	

		 // And customer imformation in database.
		$cust_id = $this->model_checkout->insert_customer($customer);


		$order = array(
			'id_customer_fk' 	=> $cust_id,
			'order_date' 	=> date('Y-m-d')
		);		

		$ord_id = $this->model_checkout->insert_order($order);



		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'id_order_fk' 		=> $ord_id,
					'id_product_fk' 	=> $item['id'],
					'quantity' 		=> $item['qty']
					
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                
		         $cust_id = $this->model_checkout->insert_order_detail($order_detail);
			endforeach;
		endif;
				$this->cart->destroy();
                // After storing all imformation in database load "checkout_success_template".
                $this->checkout_success_template($ord_id);
	}





}
