<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_cart extends CI_Model {
    
    

	function __construct()
	{
		parent::__construct();
	}

	function findAll()
	{
		return $this->db->get('products')->result();
		
	}


	function find($id)
	{
		$this->db->where('id_products', $id);
		return $this->db->get('products')->row();
	}



	// Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		$this->db->insert('orders', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}


	// Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($data)
	{
		$this->db->insert('order_products', $data);
	}





       
}