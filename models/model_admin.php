<?php

class Model_admin extends CI_Model{
	
	public function can_log_in()
	{	
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('admin');
		
		if($query->num_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}


	//----------------------------------------------------------------
	// GET / INSERT / UPDATE 
	//----------------------------------------------------------------

	

	// get all components to display them in list 
	public function get_all_components()
		{
			$query = $this->db->get('komponente');
			$komponente = $query->result_array();

			if($query->num_rows() > 0 )
			{
				return $komponente;
			}
			else
			{
				return false;
			}
			
		}



	// get all manufacturers
		public function get_all_manufacturers()
		{
			$query = $this->db->get('proizvodac');
			$manufacturers = $query->result_array();

	
			if($query->num_rows() > 0 )
			{
				return $manufacturers;
			}
			else
			{
				return false;
			}
			
		}


	//get all products
		public function get_all_products()
		{
			$this->db->select('*');
			$this->db->from('products');
			$this->db->join('komponente','id_komponente = id_komponenta_fk');
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


	//get all customers
		public function get_all_customers()
		{
			$query = $this->db->get('customer');
			$customers = $query->result_array();

	
			if($query->num_rows() > 0 )
			{
				return $customers;
			}
			else
			{
				return false;
			}
		}


		//get all orders
		public function get_all_orders()
		{
			$this->db->select("id_orders, order_date,CONCAT(name ,' ', last_name) AS customer");
			$this->db->from('orders');
			$this->db->join('customer','id_customer = id_customer_fk');
			$query = $this->db->get();
			$orders = $query->result_array();

			if($query->num_rows() > 0 )
			{
				return $orders;
			}
			else
			{
				return false;
			}
		}

		// order detail view	
		public function get_order_details($ord_id)
		{
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->where('id_orders ='.$ord_id);
			$this->db->join('customer', 'id_customer = id_customer_fk');

			$query = $this->db->get();
			if($query->num_rows() > 0)
			{
				$order_details = $query->result_array()[0];

				$this->db->select('*');
				$this->db->from('order_products');
				$this->db->where('id_order_fk ='.$ord_id);
				$this->db->join('products', 'id_products = id_product_fk');
				$this->db->join('proizvodac', 'id_proizvodac = id_proizvodac_fk');

				$query2 = $this->db->get();
				if($query2->num_rows() > 0)
				{
					$order_details['products'] = $query2->result_array();
				}
				else
				{
					$order_details['products'] = NULL;
				}
				return $order_details;
			}
			else
			{
				return false;
			}
			
		}



		//update manufacturer
		public function update_manufacturer($id, $data)
		{	
			$this->db->where('id_proizvodac',$id);
			$this->db->update('proizvodac', $data);

			
			
		}

		//update component
		public function update_component($id, $data)
		{
			
			$this->db->where('id_komponente', $id);
			$this->db->update('komponente', $data);
			
		}



		function get_manufacturer()
		{
		    $manufacturer[''] = 'please select manufacturer';
		    $query  = $this->db->get('proizvodac');
		    foreach($query->result_array() as $row){
		        $manufacturer[$row['id_proizvodac']] = $row['vendor_name'];
		    }
		    return $manufacturer;


		}

		function get_component()
		{
		    $component[''] = 'please select component';
		    $query  = $this->db->get('komponente');
		    foreach($query->result_array() as $row){
		        $component[$row['id_komponente']] = $row['component_name'];
		    }
		    return $component;
		    
		}


	//----------------------------------------------------------------
	//----------------------------------------------------------------


	//----------------------------------------------------------------
		//DELETE 
	//----------------------------------------------------------------

	//delete component item
	public function delete_component($id)
	{
		$this->db->where('id_komponente', $id);
		$this->db->delete('komponente');
	}	



	//delete manufacturer item
	public function delete_manufacturer($id)
	{
		$this->db->where('id_proizvodac', $id);
		$this->db->delete('proizvodac');
	}	


	//delete manufacturer item
	public function delete_product($id)
	{
		$this->db->where('id_products', $id);
		$this->db->delete('products');
	}	

	//delete customer
	public function delete_customer($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete('customer');
	}	


	//----------------------------------------------------------------


	//----------------------------------------------------------------
	// ADD PRODUCT FORM
	//----------------------------------------------------------------
	//add a product to database
	function add_product($data)
	{	
		$this->db->insert('products', $data);
	}
	




	// Add manufacturer
	function add_manufacturer()
	{	
		$id_proizvodac= $this->input->post('id');
            $manufacturer_name = $this->input->post('vendor_name');
     
            $data = array(
                   'vendor_name'=> $manufacturer_name,
                   
                    );
            
            $this->db->insert('proizvodac',$data);    
			redirect('Admin/manufacturer_list_view');
		
	}


	// Add component
	public function add_component()
	{	
		$id_komponente= $this->input->post('id_komponente');
            $component_name = $this->input->post('component_name');
     
            $data = array(
                   'component_name'=> $component_name,
                   
                    );
            
            $this->db->insert('komponente',$data);    
			redirect('Admin/components_list_view');
		
	}

	//----------------------------------------------------------------
	//----------------------------------------------------------------



}