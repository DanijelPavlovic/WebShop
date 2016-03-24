<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('model_komponente');
	}
	
	
	
	public function index()
	{
		$this->shop_template();
	}
	
	
	
	
	//template od početne stranice
	public function shop_template()
	{	
		$header['title'] = 'Danijel\'s Web Shop';
	
		$this->load->view('header', $header);
		$this->load->view('slider');
		$this->on_sale();
		$this->load->view('pocetna');
		$this->load->view('footer');
	}
	
	
	
	// Shop Template
	public function shop_page()
	{
		$header['title'] = 'Danijel\'s Web Shop';
			
			$this->load->view('header', $header);
			$this->load->view('shop');
			$this->load->view('footer');
	}
	
	public function on_sale()
	{
			$data['products'] = $this->model_komponente->get_products_on_sale();
			$this->load->view('proizvodi_na_akciji', $data);
	}
}
