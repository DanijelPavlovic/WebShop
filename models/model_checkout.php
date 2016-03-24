<?php

class Model_checkout extends CI_Model{
	
	// Insert customer details in "customer" table in database.
	public function insert_customer($data)
	{
		$this->db->insert('customer', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;		
	}
	


	// Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		
		$this->db->insert('orders', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
		
	}


	// Insert ordered product detail in "order_product" table in database.
	public function insert_order_detail($data)
	{	
		
		$this->db->insert('order_products', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;

	}
}