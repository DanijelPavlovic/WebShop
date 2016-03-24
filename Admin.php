<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('model_admin');
		$this->data['komponente'] = $this->model_admin->get_all_components();

	}
	
	
	
	public function index()
	{	
		//ako nijeje logiran
		if(!$this->session->userdata('is_loged_in'))
		{
			//print_r($this->session->all_userdata());
			$this->admin_login();	
		}
		//ako je logiran - admin_main
		else
		{
			$this->admin_main();
		}

		
	}
	
	//----------------------------------------------------------------
		//VIEWS
	//----------------------------------------------------------------

	
	

	//View all products 
	public function components_list_view()
	{
		if($this->session->userdata('is_loged_in'))
		{
			$header['title'] = 'Danijel\'s Web Shop';
			$data['komponente'] = $this->model_admin->get_all_components();
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/components_list', $data);
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}


	//View all manufacturers
	public function manufacturer_list_view()
	{
		if($this->session->userdata('is_loged_in'))
		{
			$header['title'] = 'Danijel\'s Web Shop';
			$data['manufacturers'] = $this->model_admin->get_all_manufacturers();
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/manufacturer_list', $data);
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}


	//View all products
	public function products_list_view()
	{
		if($this->session->userdata('is_loged_in'))
		{
			$header['title'] = 'Danijel\'s Web Shop';
			$data['products'] = $this->model_admin->get_all_products();
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/product_list', $data);
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}

	//View all customers from my shop
	public function customers_list_view()
	{
		if($this->session->userdata('is_loged_in'))
		{
			$header['title'] = 'Danijel\'s Web Shop';
			$data['customers'] = $this->model_admin->get_all_customers();
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/customer_list', $data);
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}


	//View all orders from my shop
	public function orders_list_view()
	{
		if($this->session->userdata('is_loged_in'))
		{
			$header['title'] = 'Danijel\'s Web Shop';
			$data['orders'] = $this->model_admin->get_all_orders();
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/orders_list', $data);
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}


	public function add_manufacturer_view()
	{
			if($this->session->userdata('is_loged_in'))
		{
			
			$header['title'] = 'Danijel\'s Web Shop';
			$this->load->model('model_admin');
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/add_manufacturer_view');
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}

	public function add_component_view()
	{
			if($this->session->userdata('is_loged_in'))
		{
			
			$header['title'] = 'Danijel\'s Web Shop';
			$this->load->model('model_admin');
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/add_component_view');
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}




	//View all order details from my shop
	public function order_detail_view($ord_id)
	{
		if($this->session->userdata('is_loged_in'))
		{
			$header['title'] = 'Danijel\'s Web Shop';
			$data['orders'] = $this->model_admin->get_order_details($ord_id);
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/order_details_view', $data);
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}
	//----------------------------------------------------------------
	//----------------------------------------------------------------


	//----------------------------------------------------------------
		//LOGIN
	//----------------------------------------------------------------


	// adming login page
	public function admin_login()
	{
		$header['title'] = 'Danijel\'s Web Shop';
		
		$this->load->view('storeadmin/admin_header', $header);
		$this->load->view('storeadmin/admin_login');
		$this->load->view('footer');
	}
	
	
	
	
	// admin main page after successfull login
	public function admin_main()
	{
		if($this->session->userdata('is_loged_in'))
		{
			$header['title'] = 'Danijel\'s Web Shop';
			
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/main_page');
			$this->load->view('footer');
		}
			else
			{
				redirect('Admin/login');
			}
	}

	//login form
	public function login()
	{
		$this->admin_login();
	}
	
	

	//form validation
	public function login_validation()
	{
	
		$this->load->library('form_validation');
		$this->load->library('session');

		
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules ('password', 'Password', 'required|md5');
		
		
		//ako postoji user , dodaj ga u session
		if($this->form_validation->run())
		{
			$data = array(
				'username' => $this->input->post('username'),
				'is_loged_in' => 1
			);
			
			$this->session->set_userdata($data);
			
			redirect('Admin/admin_main');
		}
		else
		{
			$header['title'] = 'Danijel\'s Web Shop';
			
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/admin_login');
			$this->load->view('footer');
		}
		
		
		 $this->input->post('username');
	}
	
	
	
	
	//check if admin exist and if can log in
	public function validate_credentials()
	{
		$this->load->model('model_admin');
		
		if($this->model_admin->can_log_in())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/password.');
			return false;
		}
	}
	
	
	
	//Logout 
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Admin/admin_login');
	}

	//----------------------------------------------------------------
	//----------------------------------------------------------------




	//----------------------------------------------------------------
	// GET / INSERT / UPDATE 
	//----------------------------------------------------------------

	


	public function add_manufacturer()
	{
		$this->load->model('model_admin');

		if($this->input->post('submit'))
		{
			$this->model_admin->add_manufacturer();
		}
	}


	public function add_component()
	{
		$this->load->model('model_admin');

		if($this->input->post('submit'))
		{
			$this->model_admin->add_component();
		}
	}


	//get all products and display them
	public function komponenta($komp_id)
	{
			$this->data['products'] = $this->model_komponente->get_products_by_komponent_id($komp_id);
			$this->load->view('header', $this->header);
			$this->load->view('shop/shop_view', $this->data);
			$this->load->view('footer');
	}


	//update manufacturer
	public function update_manufacturer()
	{	
		$header['title'] = 'Danijel\'s Web Shop';

		
		$id = $this->input->post('id_proizvodac');
		$data = array(
			'vendor_name' => $this->input->post('vendor_name')
		);
		$this->model_admin->update_manufacturer($id, $data);

		$this->load->view('header', $header);
		$this->load->view('storeadmin/manufacturer_update_view', $id);
		$this->load->view('footer');
	}


	//update component
	public function update_component()
	{	

		$header['title'] = 'Danijel\'s Web Shop';
		$id= $this->input->post('id_komponente');
		$data = array(
			'component_name' => $this->input->post('component_name')
		);
		$this->model_admin->update_component($id,$data);

			$this->load->view('header', $header);
			$this->load->view('storeadmin/component_update_view', $header);
			$this->load->view('footer');
	}


	//----------------------------------------------------------------
	//----------------------------------------------------------------









	//----------------------------------------------------------------
		//DELETE 
	//----------------------------------------------------------------


	
	// delete component from databaase
	public function delete_component()
	{
		$id = $this->uri->segment(3);
		$this->model_admin->delete_component($id);
		$this->components_list_view();
	}

	

	// delet manufacturer
	public function delete_manufacturer()
	{
		$id = $this->uri->segment(3);
		$this->model_admin->delete_manufacturer($id);
		$this->manufacturer_list_view();
	}


	// delet manufacturer
	public function delete_product()
	{
		$id = $this->uri->segment(3);
		$this->model_admin->delete_product($id);
		$this->products_list_view();
	}

	// delet manufacturer
	public function delete_customer()
	{
		$id = $this->uri->segment(3);
		$this->model_admin->delete_customer($id);
		$this->customers_list_view();
	}

	//----------------------------------------------------------------
	//----------------------------------------------------------------


	//----------------------------------------------------------------
	// ADD PRODUCT FORM
	//----------------------------------------------------------------

	// Stranice za dodavanje novih proizvoda
	public function save_product()
	{
			if($this->session->userdata('is_loged_in'))
		{
			
			$header['title'] = 'Danijel\'s Web Shop';
			$this->load->model('model_admin');

			$data['proizvodac'] = $this->model_admin->get_manufacturer();
			$data['komponente'] = $this->model_admin->get_component();
			$this->load->view('storeadmin/admin_header', $header);
			$this->load->view('storeadmin/add_product_view', $data);
			$this->load->view('footer');
			
		}
			else
			{
				redirect('Admin/login');
			}




			if($this->input->post('submit'))
			{	
				//image upload
		        $config['upload_path'] = 'assets/images_products/';
				$config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('userfile'))
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					$file = $this->upload->data();
				}
				
				
				$product_name = $this->input->post('product_name');
				$price = $this->input->post('price');
				$details =  $this->input->post('details');
				$id_proizvodac_fk = $this->input->post('id_proizvodac');
				$id_komponenta_fk = $this->input->post('komponente');
				$stock = $this->input->post('stock');
				$image = 'assets/images_products/'.$file['file_name'];

			$data = array (
				'product_name' => $product_name,
				'price' => $price,
				'details' => $details,
				'id_proizvodac_fk' => $id_proizvodac_fk,
				'id_komponenta_fk' => $id_komponenta_fk,
				'stock' => $stock,
				'image' => $image
				
			);

			
			//when product inserted load product list view
			$this->model_admin->add_product($data);
			
			}
	}



	


}
