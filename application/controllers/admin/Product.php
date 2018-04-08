<?php 

class Product extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/admin_product');
        $this->load->helper('url_helper');
    }

    function addproduct()
    {

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('sku', 'Sku', 'required|is_unique[catalog_product.sku]');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('product_desc', 'Product Desc', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('image_gallery','Image Gallery','required'); 

       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->admin_product->addproduct($data))
			  	{
			  		$result['status']=1;
			  	}
			  	else
			  	{
			  		$result['status']=0;
			  	}
		  }
		  else
  	 	 {
	  		$result['status']=validation_errors();
	     }
	  }	
	  else
	  {
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	
    	 
    }

    function updateproduct()
    {


	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('product_desc', 'Product Desc', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('image_gallery','Image Gallery','required'); 


       	if ($this->form_validation->run() == TRUE){
		  	  	if($this->admin_product->updateproduct($data))
			  	{
			  		$result['status']=1;
			  	}
			  	else
			  	{
			  		$result['status']=0;
			  	}
		}
	    else
  	 	{
	  		$result['status']=validation_errors();
	    }
	  }	
	  else
	  {
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	

	
    }

     function deleteproduct()
    {


	  $data=$this->uri->segment(5);
	  $result=array();
	  if(!empty($data))
	  {

    	  	if($this->admin_product->deleteproduct($data))
		  	{
		  		$result['status']=1;
		  	}
		  	else
		  	{
		  		$result['status']=0;
		  	}
	
	  }	
	  else
	  {
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	

	
    }


}

?>