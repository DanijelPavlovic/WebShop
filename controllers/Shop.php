<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('model_komponente');
		$this->data['komponente'] = $this->model_komponente->get_all_components();
		$this->header['title'] = 'Danijel\'s Web Shop';

	}
	
	
	
	public function index()
	{
		$this->shop_page();
	}
	
	
	
	
	// Shop Template
	public function shop_page()
	{
			
			
			$this->data['products'] = $this->model_komponente->get_products_on_sale();
			$this->load->view('header', $this->header);
			$this->load->view('shop/shop_view', $this->data);
			$this->load->view('footer');
	}
	
	
	public function komponenta($komp_id)
	{
			$this->data['products'] = $this->model_komponente->get_products_by_komponent_id($komp_id);
			$this->load->view('header', $this->header);
			$this->load->view('shop/shop_view', $this->data);
			$this->load->view('footer');
	}

	public function product_details($p_id)
	{
			$this->data['product'] = $this->model_komponente->get_product_by_id($p_id);
			$this->load->view('header', $this->header);
			$this->load->view('shop/product_view', $this->data);
			$this->load->view('footer');
	}
	
	
}
