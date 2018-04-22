<?php 

class Product extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/admin_product');
        $this->load->helper('url_helper');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
    }

    
		
    function addproductview()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/addcatalog');
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
    }

     function addproductassigment()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
    	$data['product_id']=$this->admin_product->catalogproductfetch();
    	$data['vendor_id']=	$this->admin_product->vendorfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/productassigment',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
    }



    function addproduct()
    {
    	$data=$this->input->post();
    if($_FILES['image_gallery']['name']){ 
       $config = array(
		'upload_path' => "./assets/images/",
		'allowed_types' => "gif|jpg|png|jpeg",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
		);
       $this->upload->initialize($config);		
	  if(!$this->upload->do_upload('image_gallery'))  
	        {  
	            $result['status']=$this->upload->display_errors(); 
	            echo json_encode($result);
  				exit; 
	        }  
	        else  
	        {  
	             $postdata = $this->upload->data();
		         $data['image_gallery']=$postdata["file_name"];
	        }  	

	   }		  
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('sku', 'Sku', 'required|is_unique[catalog_product.sku]');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('product_desc', 'Product Desc', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');


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

    public function editproduct($value=''){
		$productdata=$this->uri->segment(4);	
		$productdatafetch=$this->admin_product->editcatalogproductfetch($productdata);
		if($productdatafetch)
		{
		$data['editproduct']=$productdatafetch;	
		 $this->load->view('admin/header');
    	 $this->load->view('admin/edit/editcatalog',$data);
    	 $this->load->view('admin/footer');	 
		}else{
			redirect('/');
		}

	}

    function updateproduct()
    {


	  $data=$this->input->post();
	  if($_FILES['image_gallery']['name']){ 
       $config = array(
		'upload_path' => "./assets/images/",
		'allowed_types' => "gif|jpg|png|jpeg",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
		);
       $this->upload->initialize($config);		
	  if(!$this->upload->do_upload('image_gallery'))  
	        {  
	            $result['status']=$this->upload->display_errors(); 
	            echo json_encode($result);
  				exit; 
	        }  
	        else  
	        {  
	             $postdata = $this->upload->data();
		         $data['image_gallery']=$postdata["file_name"];
	        }  	

	   }		  
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('product_desc', 'Product Desc', 'required');
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');


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


	  $data=$this->uri->segment(4);
	  $result=array();
	  if(!empty($data))
	  {

    	  	if($this->admin_product->deleteproduct($data))
		  	{
		  		redirect('backend/catalog');

		  	}
		  	else
		  	{
		  		redirect('/');
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