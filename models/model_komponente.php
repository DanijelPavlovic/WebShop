<?php

class Model_komponente extends CI_Model
{
	
	public function get_all_components()
	{
		$query = $this->db->get('komponente');
		$komponente = $query->result_array();

		/*
		echo '<pre>';
		print_r($komponente);
		echo '</pre>';
		*/

		if($query->num_rows() > 0 )
		{
			return $komponente;
		}
		else
		{
			return false;
		}
		
	}
	
	public function get_products_by_komponent_id($komp_id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id_komponenta_fk = '.$komp_id.' AND stock > 0');
		//$this->db->where('stock' > 0);
		$query = $this->db->get();

		$products = $query->result_array();

		/*
		echo '<pre>';
		print_r($komp_id);
		echo '</pre>';
		*/

		if($query->num_rows() > 0 )
		{
			return $products;
		}
		else
		{
			return false;
		}
	}
	


	public function get_product_by_id($p_id)
	{
		//znaci kad izaberem neki product da otvorni njega u drugoj stranici i da napravi njegov opis
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id_products ='.$p_id);
		$this->db->join('proizvodac','id_proizvodac_fk = id_proizvodac');
		$this->db->join('komponente','id_komponenta_fk = id_komponente');
		$query = $this->db->get();
		$product = $query->result_array();

		if($query->num_rows() > 0 )
		{
			return $product[0];
		}
		else
		{
			return false;
		}
	}





	//proizvodi koji su na akciji 
	public function get_products_on_sale()
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('on_sale','id_product_fk = id_products');
		$query = $this->db->get();

		$products = $query->result_array();

		if($query->num_rows() > 0 )
		{
			return $products;
		}
		else
		{
			return false;
		}
	}
	
}