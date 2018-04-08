<?php

class Checkout_cart extends CI_Model
{
	function checkqty($vendorid,$proudctid,$qty)
	{

		$this->db->select('entity_id');
		$this->db->from('vendor_product');
		$this->db->where('vendor_product.vendor_id', $vendorid);
		$this->db->where('vendor_product.product_id', $proudctid);
		$this->db->where('vendor_product.qty >=', $qty);
		$query = $this->db->get();		 
		$rowcount = $query->num_rows();	
		 if($rowcount){
		 	return true;
		 }else{
		 	return false;
		 }
	}

	function checkcouponcode($couponcode){
		$currentdata=date('Y-m-d H:i:s');
		$customer_id=$this->session->userdata("user")['user_id'];
		$this->db->select('entity_id');
		$this->db->from('promotion');
		$this->db->where('promotion.coupon_code', $couponcode);
		$this->db->where('promotion.is_active', 1);
		$this->db->where('promotion.from_date >=', $currentdata);
		$this->db->where('promotion.to_date <=', $currentdata);
		$query = $this->db->get();		 
		$data=$query->first_row('array');
		if($data['use_per_customer']==1)
		{
			$this->db->select('*');
			$this->db->from('sales_order');
			$this->db->where('sales_order.coupon_code', $couponcode);
			$this->db->where('sales_order.customer_id', $customer_id);
			$query_check_cust = $this->db->get();	
			$rowcount = $query_check_cust->num_rows();	
			 if($rowcount){
			 	return $data['discount_price'];
			 }else{
			 	return false;
			 }
		}else{
			$rowcount = $query->num_rows();	
			 if($rowcount){
			 	return $data['discount_price'];
			 }else{
			 	return false;
			 }	
		}

			
	}

	function getproductprice($proudctid,$vendorid){
		$this->db->select('*');
		$this->db->from('vendor_product');
		$this->db->where('vendor_product.product_id', $proudctid);
		$this->db->where('vendor_product.vendor_id', $vendorid);
		$query = $this->db->get();		 
		$data=$query->first_row('array');
		if($data){
		 	return $data['price'];
		 }else{
		 	return false;
		 }
	}

	function updateqty($proudctid,$vendorid,$qty,$symbol){
		$data=array();
		$this->db->select('*');
		$this->db->from('vendor_product');
		$this->db->where('vendor_product.product_id', $proudctid);
		$this->db->where('vendor_product.vendor_id', $vendorid);
		$itemfetchquery = $this->db->get();
		$itemdata=$itemfetchquery->first_row('array');
		if($itemdata){
			$data['product_id']=$proudctid;
			$data['vendor_id']=$vendorid;
			if($symbol =='-'){
				$data['qty']=$itemdata['qty']-$qty;
			}elseif ($symbol =='+') {
				$data['qty']=$itemdata['qty']+$qty;
			}
			$this->db->where('product_id', $proudctid);		  
			$this->db->where('vendor_id', $vendorid);
			$reduceqty = $this->db->update('vendor_product',$data);
			$reduceqty_affected_rows = $this->db->affected_rows();
			if($reduceqty_affected_rows)
			{
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
			
	}

	 // $couponcodeamt=0;
		//  	 if(!empty($data['coupon_code']))
		//  	 {
		//  	 	$couponcodeamt=$this->checkcouponcode();
		// 	 	 	if(!empty($couponcodeamt)){
		// 	 	 		$insertdata['coupon_code']=$data['coupon_code'];
		// 	 	 		$insertdata['discount']=$couponcodeamt;
		// 	 	 	}
		//      }

	function addproduct($data)
	{
		 if($this->checkqty($data['vendor_id'],$data['product_id'],$data['qty']) && $this->session->userdata("user") )
	{
		if(!$this->session->userdata("quote")){

     	     $insertdata['vendor_id']=$data['vendor_id'];
		 	 $insertdata['is_active']=1;
		 	 $insertdata['customer_id']=$this->session->userdata("user")['user_id'];
		 	
		     $query = $this->db->insert('sales_quote',$insertdata);
			 $affected_rows = $this->db->affected_rows();
				if($affected_rows){
					$quote_id=$this->db->insert_id();
					$insertitemdata['quote_id']=$quote_id;
					$insertitemdata['vendor_id']=$data['vendor_id'];
					$insertitemdata['product_id']=$data['product_id'];
					$insertitemdata['qty']=$data['qty'];
					$insertitemdata['price']=$this->getproductprice($data['product_id'],$data['vendor_id']);
					$insertitemdata['row_total']=$insertitemdata['price']*$data['qty'];
					$itemquery = $this->db->insert('sales_quote_item',$insertitemdata);
			 		$itemquery_affected_rows = $this->db->affected_rows();
			 		if($itemquery_affected_rows)
			 		{
			 			$this->updateqty($data['product_id'],$data['vendor_id'],$data['qty'],'-');
			 			$this->db->select('*');
						$this->db->from('sales_quote_item');
						$this->db->where('sales_quote_item.quote_id', $quote_id);
						$itemfetchquery = $this->db->get();
						$itemdata=$itemfetchquery->result('array');
						$subtotal=0;
						$itemcount=0;
						foreach ($itemdata as $itemdatakey => $itemdatavalue) 
						{
							$subtotal=$subtotal+$itemdatavalue['row_total'];		
							$itemcount=$itemcount+1;

					    }		 
					    $updatequotetotal['sub_total']=$subtotal;
					    $updatequotetotal['items_count']=$itemcount;
					     	if($subtotal <= 500){
					     	$updatequotetotal['delivery_charge']=50;	
					     	}else{
					     	$updatequotetotal['delivery_charge']=0;	
					     	}
					    $updatequotetotal['grant_total']=$subtotal+$updatequotetotal['delivery_charge']; 	
					    $this->db->where('entity_id', $quote_id);		  
					    $updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$updatequotetotal);
					    $updatequotetotal_affected_rows = $this->db->affected_rows();
					    if($updatequotetotal_affected_rows){
					    	$this->session->set_userdata('quote', array(
							    'quote_id'  =>$quote_id ,
							    'items_count' => $itemcount,	
							));
							return true;
						}
						else
						{
						 	return false;
						}

			 		}
			 		else{
			 			return false;
			 		}
				}
				else
				{
				 	return false;
				}

		}
		else
		{
			if($this->updateproduct($data))
				{
					return true;
				}
				else
				{
					return false;
				}
		}		
	}
}

		function updateproduct($data){
			 if($this->checkqty($data['vendor_id'],$data['product_id'],$data['qty']) && $this->session->userdata("user") )
			{
				$rowtotal=0;
				$quote_id=$this->session->userdata("quote")['quote_id'];

				$this->db->select('*');
				$this->db->from('sales_quote');
				$this->db->where('sales_quote.entity_id', $quote_id);
				$this->db->where('sales_quote.is_active', 1);
				$quotefetchquery = $this->db->get();
				$quotedata=$quotefetchquery->first_row('array');
				if($quotedata){
				if(!empty($quote_id)){
					$this->db->select('*');
					$this->db->from('sales_quote_item');
					$this->db->where('sales_quote_item.quote_id', $quote_id);
					$this->db->where('sales_quote_item.product_id', $data['product_id']);
					$this->db->where('sales_quote_item.vendor_id', $data['vendor_id']);
					$itemfetchquery = $this->db->get();
					$itemdata=$itemfetchquery->first_row('array');
					if($itemdata){
						$insertitemdata['qty']=$data['qty']+$itemdata['qty'] ;
						$insertitemdata['row_total']=$itemdata['price']*$insertitemdata['qty'];
						$this->db->where('item_id', $itemdata['item_id']);		  
			    	    $query = $this->db->update('sales_quote_item',$insertitemdata);
			    	    $affected_rows = $this->db->affected_rows();
						if($affected_rows){
								$this->updateqty($data['product_id'],$data['vendor_id'],$data['qty'],'-');
					 			$this->db->select('*');
								$this->db->from('sales_quote_item');
								$this->db->where('sales_quote_item.quote_id', $quote_id);
								$itemfetchquery = $this->db->get();
								$itemdata=$itemfetchquery->result('array');
								$subtotal=0;
								$itemcount=0;
								foreach ($itemdata as $itemdatakey => $itemdatavalue) 
								{
									$subtotal=$subtotal+$itemdatavalue['row_total'];		
									$itemcount=$itemcount+1;

							    }		

							    $updatequotetotal['sub_total']=$subtotal;
							    $updatequotetotal['items_count']=$itemcount;
							     	if($subtotal <= 500){
							     	$updatequotetotal['delivery_charge']=50;	
							     	}else{
							     	$updatequotetotal['delivery_charge']=0;	
							     	}
							    $updatequotetotal['grant_total']=$subtotal+$updatequotetotal['delivery_charge'];
							    $this->db->where('entity_id', $quote_id);		  
							    $updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$updatequotetotal);
							    $updatequotetotal_affected_rows = $this->db->affected_rows();
							    if($updatequotetotal_affected_rows){
							    	$this->session->set_userdata('quote', array(
									    'quote_id'  =>$quote_id ,
									    'items_count' => $itemcount,	
									));
									return true;
								}
								else
								{
								 	return false;
								}

					 		
						}
						else
						{
						 	return false;
						}	
					}else{
						$insertitemdata['quote_id']=$quote_id;
						$insertitemdata['vendor_id']=$data['vendor_id'];
						$insertitemdata['product_id']=$data['product_id'];
						$insertitemdata['qty']=$data['qty'];
						$insertitemdata['price']=$this->getproductprice($data['product_id'],$data['vendor_id']);
						$insertitemdata['row_total']=$insertitemdata['price']*$data['qty'];	
			    	    $query = $this->db->insert('sales_quote_item',$insertitemdata);
			    	    $affected_rows = $this->db->affected_rows();
						if($affected_rows){
						$this->updateqty($data['product_id'],$data['vendor_id'],$data['qty'],'-');	     
					 			$this->db->select('*');
								$this->db->from('sales_quote_item');
								$this->db->where('sales_quote_item.quote_id', $quote_id);
								$itemfetchquery = $this->db->get();
								$itemdata=$itemfetchquery->result('array');
								$subtotal=0;
								$itemcount=0;
								foreach ($itemdata as $itemdatakey => $itemdatavalue) 
								{
									$subtotal=$subtotal+$itemdatavalue['row_total'];		
									$itemcount=$itemcount+1;

							    }		 
							    $updatequotetotal['sub_total']=$subtotal;
							    $updatequotetotal['items_count']=$itemcount;
							    $updatequotetotal['grant_total']=$subtotal;
							     	if($subtotal <= 500){
							     	$updatequotetotal['delivery_charge']=50;	
							     	}else{
							     	$updatequotetotal['delivery_charge']=0;	
							     	}
							     $updatequotetotal['grant_total']=$subtotal+$updatequotetotal['delivery_charge'];	

							    $this->db->where('entity_id', $quote_id);	  
							    $updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$updatequotetotal);
							    $updatequotetotal_affected_rows = $this->db->affected_rows();
							    if($updatequotetotal_affected_rows){
							    	$this->session->set_userdata('quote', array(
									    'quote_id'  =>$quote_id ,
									    'items_count' => $itemcount,	
									));
									return true;
								}
								else
								{
								 	return false;
								}

					 		
						}
						else
						{
						 	return false;
						}	


					}
				}
			}else{
				return false;
			}	
		}
}

function deleteproduct($data)
{
	$quote_id=$this->session->userdata("quote")['quote_id'];
			 $this->db->select('*');
			 $this->db->from('sales_quote');
			 $this->db->where('sales_quote.entity_id', $quote_id);
			 $itemfetchquery = $this->db->get();
			 $itemdata=$itemfetchquery->first_row('array');
			 if($itemdata){
			 if($data['flag']==1)
			 {
			 $this->db->select('*');
			 $this->db->from('sales_quote_item');
			 $this->db->where('sales_quote_item.product_id', $data['product_id']);
			 $this->db->where('sales_quote_item.vendor_id', $data['vendor_id']);
			 $this->db->where('sales_quote_item.quote_id', $quote_id);
			 $itemfetchquery = $this->db->get();
			 $itemdata=$itemfetchquery->first_row('array');	
			 $deleteproduct['qty']=$itemdata['qty']-$data['qty'];
			 $deleteproduct['row_total']=$itemdata['row_total']-($itemdata['price']*$data['qty']);	
			 $this->db->where('item_id', $itemdata['item_id']);	  
			 if($deleteproduct['qty']==0){
			 	$query = $this->db->delete('sales_quote_item');
			 }else{
			 $deleteproduct_query = $this->db->update('sales_quote_item',$deleteproduct);	
			 }
		     
		     $deleteproduct_affected_rows = $this->db->affected_rows();
			     if($deleteproduct_affected_rows)
			     {

							$this->updateqty($data['product_id'],$data['vendor_id'],$data['qty'],'+');	     
						 			$this->db->select('*');
									$this->db->from('sales_quote_item');
									$this->db->where('sales_quote_item.quote_id', $quote_id);
									$itemfetchquery = $this->db->get();
									$itemdata=$itemfetchquery->result('array');
									$subtotal=0;
									$itemcount=0;
									foreach ($itemdata as $itemdatakey => $itemdatavalue) 
									{
										$subtotal=$subtotal+$itemdatavalue['row_total'];		
										$itemcount=$itemcount+1;

								    }		 
								    $updatequotetotal['sub_total']=$subtotal;
								    $updatequotetotal['items_count']=$itemcount;
								    $updatequotetotal['grant_total']=$subtotal;
								     	if($subtotal <= 500 && $subtotal >=1){
								     	$updatequotetotal['delivery_charge']=50;	
								     	}else{
								     	$updatequotetotal['delivery_charge']=0;	
								     	}
								     $updatequotetotal['grant_total']=$subtotal+$updatequotetotal['delivery_charge'];	

								    $this->db->where('entity_id', $quote_id);	  
								    $updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$updatequotetotal);
								    $updatequotetotal_affected_rows = $this->db->affected_rows();
								    if($updatequotetotal_affected_rows){
								    	$this->session->set_userdata('quote', array(
										    'quote_id'  =>$quote_id ,
										    'items_count' => $itemcount,	
										));
										return true;
									}
									else
									{
									 	return false;
									}
				      }
			 }else{
			 	$this->db->select('*');
				$this->db->from('sales_quote_item');
				$this->db->where('sales_quote_item.product_id', $data['product_id']);
				$this->db->where('sales_quote_item.vendor_id', $data['vendor_id']);
				$this->db->where('sales_quote_item.quote_id', $quote_id);
				$itemfetchquery = $this->db->get();
				$itemdata=$itemfetchquery->first_row('array');	
			 	$this->db->where('item_id', $itemdata['item_id']);
				$query = $this->db->delete('sales_quote_item');
			    $affected_rows = $this->db->affected_rows();
					if($affected_rows){

							$this->updateqty($data['product_id'],$data['vendor_id'],$data['qty'],'+');	     
						 			$this->db->select('*');
									$this->db->from('sales_quote_item');
									$this->db->where('sales_quote_item.quote_id', $quote_id);
									$itemfetchquery = $this->db->get();
									$itemdata=$itemfetchquery->result('array');
									$subtotal=0;
									$itemcount=0;
									foreach ($itemdata as $itemdatakey => $itemdatavalue) 
									{
										$subtotal=$subtotal+$itemdatavalue['row_total'];		
										$itemcount=$itemcount+1;

								    }		 
								    $updatequotetotal['sub_total']=$subtotal;
								    $updatequotetotal['items_count']=$itemcount;
								    $updatequotetotal['grant_total']=$subtotal;
								     	if($subtotal <= 500 && $subtotal >=1){
								     	$updatequotetotal['delivery_charge']=50;	
								     	}else{
								     	$updatequotetotal['delivery_charge']=0;	
								     	}
								     $updatequotetotal['grant_total']=$subtotal+$updatequotetotal['delivery_charge'];	

								    $this->db->where('entity_id', $quote_id);	  
								    $updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$updatequotetotal);
								    $updatequotetotal_affected_rows = $this->db->affected_rows();
								    if($updatequotetotal_affected_rows){
								    	$this->session->set_userdata('quote', array(
										    'quote_id'  =>$quote_id ,
										    'items_count' => $itemcount,	
										));
										return true;
									}
									else
									{
									 	return false;
									}
				      
						return true;
					}
					else
					{
					 	return false;
					}


			 }	

	}		 
}


}
?> 


