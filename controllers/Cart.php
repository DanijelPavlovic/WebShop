<?php


class Cart extends CI_Controller {


	
	public function __construct()
	{
		parent::__construct();
		//load Title and model
		$this->header['title'] = 'Danijel\'s Web Shop';
		$this->load->model('model_cart');
		$this->load->library('table');
	}



	public function index()
	{	
		
		$data['listProducts'] = $this->model_cart->findAll();

		$this->load->view('header', $this->header);
		$this->load->view('cart/cart_view', $data);
		$this->load->view('footer');
	}


	
	
	
}
