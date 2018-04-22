<?php 

class Productassignment extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/admin_productassignment');
        $this->load->helper('url_helper');
           $this->load->model('Admin/admin_product');
    }

    public function addproductassignment()
    {

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('vendor_id', 'Vendor Id', 'required');
        $this->form_validation->set_rules('product_id', 'Product Id', 'required');
        $this->form_validation->set_rules('qty', 'Qty', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->admin_productassignment->addproductassignment($data))
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

    public function editcatalogproductfetch($value=''){
		$productdata=$this->uri->segment(4);	
		$productdatafetch=$this->admin_productassignment->editcatalogproductfetch($productdata);
		if($productdatafetch)
		{
		$data['editproduct']=$productdatafetch;	
		$data['product_id']=$this->admin_product->catalogproductfetch();
    	$data['vendor_id']=	$this->admin_product->vendorfetch();
		 $this->load->view('admin/header');
    	 $this->load->view('admin/edit/editproductassignment',$data);
    	 $this->load->view('admin/footer');	 
		}else{
			redirect('/');
		}

	}


    public function updateproductassignment()
    {

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('vendor_id', 'Vendor Id', 'required');
        $this->form_validation->set_rules('product_id', 'Product Id', 'required');
        $this->form_validation->set_rules('qty', 'Qty', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->admin_productassignment->updateproductassignment($data))
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


    function deleteproductassignment()
    {


	  $data=$this->uri->segment(4);
	  if(!empty($data))
	  {

    	  	if($this->admin_productassignment->deleteproductassignment($data))
		  	{
		  	redirect('backend/vendorcatalog');
		  	}
		  	else
		  	{
		 		redirect('/');
		  	}
	
	  }	
	  else
	  {
	  	redirect('/');
	  }	
	    
	

	
    }

}

?>   
