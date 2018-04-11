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
		$this->db->select('*');
		$this->db->from('promotion');
		$this->db->where('promotion.coupon_code', $couponcode);
		$this->db->where('promotion.is_active', 1);
		$this->db->where('promotion.from_date <=', $currentdata);
		$this->db->where('promotion.to_date >=', $currentdata);

		$query = $this->db->get();		 
		$data=$query->first_row('array');
		if($data['use_per_customer']==1)
		{
			$this->db->select('*');
			$this->db->from('sales_quote');
			$this->db->where('sales_quote.coupon_code', $couponcode);
			$this->db->where('sales_quote.customer_id', $customer_id);
			$query_check_cust = $this->db->get();	
			$rowcount = $query_check_cust->num_rows();
			 if(!$rowcount){
			 	if($this->updateamountcoupondiscount($data['discount_price'],$couponcode)){
			 	return $data['discount_price'];
			 	}else{
		 		return false;
			 	}
			 }else{
			 	return false;
			 }
		}else{
			$rowcount = $query->num_rows();	
			 if($rowcount){
			 	if($this->updateamountcoupondiscount($data['discount_price'],$couponcode)){
			 	return $data['discount_price'];
			 	}else{
		 		return false;
			 	}
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

	function addproduct($data)
	{
		 if($this->checkqty($data['vendor_id'],$data['product_id'],$data['qty']) && $this->session->userdata("user") )
	{
		if(!$this->session->userdata("quote")){

     	     $insertdata['vendor_id']=$data['vendor_id'];
		 	 $insertdata['is_active']=1;
		 	 $insertdata['customer_id']=$this->session->userdata("user")['user_id'];
		  	 
		 	 $this->db->select('entity_id');
			 $this->db->from('sales_quote');
			 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
			 $this->db->where('sales_quote.is_active', 1);
			 $quotefetchquerysession = $this->db->get();
			 $quotedatasession=$quotefetchquerysession->first_row('array');
			 if($quotedatasession){
			 $quoteid=$quotedatasession['entity_id'];	 
			 $this->session->set_userdata('quote', array(
									    'quote_id'  =>$quoteid
									));
			 $this->updateproduct($data);
			 }else{
			 $query = $this->db->insert('sales_quote',$insertdata);	
			 $quote_id=$this->db->insert_id();
			 }
			 if($quote_id){
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

function updateamountcoupondiscount($amount,$couponcode)
{


	$quote_id=$this->session->userdata("quote")['quote_id'];
	if($quote_id){		
	 $this->db->select('grant_total');
				 $this->db->from('sales_quote');
				 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
				 $this->db->where('sales_quote.is_active', 1);
	$quotefetchquery = $this->db->get();
	$quotedata=$quotefetchquery->first_row('array');	
	if($quotedata){	 	
	$discountdata['discount']=$amount;
	$discountdata['coupon_code']= $couponcode;
	$discountdata['grant_total']=$quotedata['grant_total']-$amount;
	$this->db->where('entity_id', $quote_id);

	$updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$discountdata);
	$updatequotetotal_affected_rows = $this->db->affected_rows();
	return true;
}else{
	return false;
}
	}else{
		return false;
	}


}

function deleteamountcoupondiscount($couponcode)
{


	$quote_id=$this->session->userdata("quote")['quote_id'];
	$currentdata=date('Y-m-d H:i:s');
	$this->db->select('*');
	$this->db->from('promotion');
	$this->db->where('promotion.coupon_code', $couponcode);
	$this->db->where('promotion.is_active', 1);
	$this->db->where('promotion.from_date <=', $currentdata);
	$this->db->where('promotion.to_date >=', $currentdata);
	$query = $this->db->get();		 
	$data=$query->first_row('array');
	if($data){
		if($quote_id){		
		 $this->db->select('*');
					 $this->db->from('sales_quote');
					 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
					 $this->db->where('sales_quote.coupon_code', $couponcode);
					 $this->db->where('sales_quote.is_active', 1);
		$quotefetchquery = $this->db->get();
		$quotedata=$quotefetchquery->first_row('array');			 	
		if($quotedata){
		$discountdata['discount']='';
		$discountdata['coupon_code']= '';
		$discountdata['grant_total']=$quotedata['grant_total']+$data['discount_price'];
		$this->db->where('entity_id', $quotedata['entity_id']);
		$updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$discountdata);
		$updatequotetotal_affected_rows = $this->db->affected_rows();
		return true;
		}else{
			return false;
		}

	}else{
		return false;
	}

	}
}
	
function getquoteproduct(){

	if($this->session->userdata("user")){
			$this->db->select('sales_quote_item.*,catalog_product.product_name,catalog_product.image_gallery,vendor.display_name,sales_quote.coupon_code,sales_quote.discount,sales_quote.delivery_charge,sales_quote.sub_total,sales_quote.grant_total,sales_quote.items_count')
			         ->from('sales_quote_item')
			         ->join('sales_quote', 'sales_quote_item.quote_id = sales_quote.entity_id')
			         ->join('catalog_product', 'sales_quote_item.product_id = catalog_product.entity_id')
			         ->join('vendor', 'sales_quote_item.vendor_id = vendor.entity_id');
			$this->db->where('sales_quote.entity_id',$this->session->userdata("quote")['quote_id']);
			$itemfetchquery = $this->db->get();
			$itemdata=$itemfetchquery->result('array');
			return $itemdata;

	}else{
		return false;
	}
}

function placeorder($data){
	if($this->session->userdata("user")){
		 $this->db->from('sales_quote');
		 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
		 $this->db->where('sales_quote.is_active', 1);
		 $this->db->where('sales_quote.entity_id', $this->session->userdata("quote")['quote_id']);	
		 $orderitemfetchquery = $this->db->get();
	     $orderitemdata=$orderitemfetchquery->first_row('array');
	     $orderitemdata['payment_method']=$data['payment_method'];
	     $orderitemdata['shipment_method']=$data['shipment_method'];
	     $orderitemdata['status']='processing';
	     unset($orderitemdata['entity_id']);
	     unset($orderitemdata['is_active']);
	     $orderitemquery = $this->db->insert('sales_order',$orderitemdata);
	     $orderid=$this->db->insert_id();
	     $orderitemquery_affected_rows = $this->db->affected_rows();
	     if($orderitemquery_affected_rows){
	     $this->db->select('vendor_id,quote_id,product_id,qty,price,row_total');
	     $this->db->from('sales_quote_item');
		 $this->db->where('sales_quote_item.quote_id', $this->session->userdata("quote")['quote_id']);
	 	 $itemfetchquery = $this->db->get();
		 $itemdata=$itemfetchquery->result('array');
		 
		 foreach ($itemdata as $itemdatakey => $itemdatavalue) {
		 	unset($itemdatavalue['item_id']);
		 	$itemdatavalue['order_id']=$orderid;		 	
		 	$bulkiteminsert=$this->db->insert('sales_order_item', $itemdatavalue);
		 }
	     $orderitemsquery_affected_rows = $this->db->affected_rows();
		     if($orderitemsquery_affected_rows){
		      	$this->db->where('entity_id', $this->session->userdata("quote")['quote_id']);	
		      	$quotedisable['is_active']=0;  
			    $updatequotetotalupdatequotetotal_query = $this->db->update('sales_quote',$quotedisable);
			    $updatequotetotalupdatequotetotal_query_affected_rows = $this->db->affected_rows();
			    if($updatequotetotalupdatequotetotal_query_affected_rows){
					$this->session->unset_userdata('quote');
					return true ;
			    }else{
			 	return false ;   	
			    }

		     }else{
		     return false ;	
		     }
	     }else{
	     	return false ;
	     }
	      
	}else{
		return false;
}
}


}


?> 

