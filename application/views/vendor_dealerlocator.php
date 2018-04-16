<link href="<?php echo asset_url('css/dealer_location.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo asset_url('css/jquery-customselect.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo asset_url('css/common.css');?>" rel="stylesheet" type="text/css" media="all" />

<script src="<?php echo asset_url('js/dealer_location.js');?>"></script>
<script src="<?php echo asset_url('js/jquery-customselect.js');?>"></script>  
<style type="text/css">

.pac-container:after{
    content:none !important;
}
.pac-icon {
  width: 0px;
  height: 0px;
}
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDDOCDJHYz9UJAWhI2xtIyv5OP52cJibA&libraries=places" type="text/javascript"></script>

      <div class="container">
         <div class="main_dealer">
            <div class="dealer_title">
               <h1>Locate a Local Store Near You</h1>
               <br>
                <form name="dealerlocator" id='dealerlocator' class="clearfix">
                <div class="loc_srch">
                  <input name='dealerlocation' id='dealerlocation' type="text" placeholder="Enter your location">
                  <a href="javascript:void(0)" id='reset' oncontextmenu="return false;" class="reset rmv_cart_prd" style='display:none'></a>
                  <a href="javascript:void(0)" id='geoloc' oncontextmenu="return false;" class="curnt_locn"></a>
                </div>
                  <select id="vendors" name="vendors" class="required-entry select custom-select">
                   </select>
                  <button type='button' id='dlsubmit' name='dlsubmit'></button>
               </form>
               <br>
               <br>
            </div>
            <div class="dealer_inner">
               <ul id='dealerul' class="clearfix list-inline">
  

               </ul>
                <div class="reg_loadblock loader_container" style="display: none;">
                  <div class="loader_block" ><div class="loader-circle"></div><div class="loader-line-mask"><div class="loader-line"></div></div></div>
                </div>
               <div class="show_mre_block" >
                  <a href="javascript:void(0)" id='loadMore' style='display:none' class='btn btn_show'>Show More +</a>
               </div>               
            </div>
         </div>
      </div>

