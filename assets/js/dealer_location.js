jQuery(document).ready(function () {


function getLocation(){
  if (navigator.geolocation) {

  var options = {
  enableHighAccuracy: true,
  timeout: 10000,
  maximumAge: 0
};

function success(position) {
  var crd = position.coords;
           var lat = position.coords.latitude;
           var lng = position.coords.longitude;
           var latlng = new google.maps.LatLng(lat, lng);
           var geocoder = new google.maps.Geocoder();
           var $city;
           var $state;
           geocoder.geocode({
               'latLng': latlng
           }, function(results, status) {
               if (status == google.maps.GeocoderStatus.OK) {
                   if (results[1]) {
                      console.log(results[1]);
                       jQuery.each(results[1].address_components, function(key, $address) {
                           $types = $address.types;
                           if ($types == "locality,political") {
                               $city = $address.long_name;
                               console.log($city);
                           }
                        });
                       if($city !== undefined && lat && lng){
                              getData($city,lat,lng);
                              Mage.Cookies.set('vendor-location-name', $city);
                              Mage.Cookies.set('vendor-location-lat', lat);
                              Mage.Cookies.set('vendor-location-lng', lng);
                              jQuery('#dealerlocation').val('Current Location');
                              jQuery('#reset').show();

                              getVendors($city,lat,lng);
                              var selected_vendor = jQuery("#vendors").val();
                              jQuery("#vendors").customselect('destroy');
                              setTimeout(function(){
                                jQuery("#vendors").customselect();
                                if(jQuery("#vendors option[value='"+selected_vendor+"']").length > 0){
                                  jQuery("#vendors").customselect("select",selected_vendor);
                                }
                              }, 2000);
                       }
                   }
               }
           });



};

function error(err) {
  jQuery('#dealerlocation').focus();
  console.warn(`ERROR(${err.code}): ${err.message}`);
};

navigator.geolocation.getCurrentPosition(success, error, options);

}

}

if(window.geolocationFound != "true")
{
    getLocation();
}



function initialize() {
     options = {
        language: 'en-GB',
        types: ['geocode'],
        componentRestrictions: { country: "in" }
    }
    var input = document.getElementById('dealerlocation');
    var autocomplete = new google.maps.places.Autocomplete(input,options);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
         var place = autocomplete.getPlace();
          if (!place.place_id) { return; }
         if(place){
         getData(place.geometry.location.lat(),place.geometry.location.lng());
           //Mage.Cookies.set('vendor-location-name', place.name);
           //Mage.Cookies.set('vendor-location-lat', place.geometry.location.lat());
           //Mage.Cookies.set('vendor-location-lng', place.geometry.location.lng());
           //getVendors(place.name,place.geometry.location.lat(),place.geometry.location.lng());

           // /var selected_vendor = jQuery("#vendors").val();
           //jQuery("#vendors").customselect('destroy');
           // setTimeout(function(){
           //    jQuery("#vendors").customselect();
           //    if(jQuery("#vendors option[value='"+selected_vendor+"']").length > 0){
           //      jQuery("#vendors").customselect("select",selected_vendor);
           //    }
           //  }, 2000);
         }else{
           //Mage.Cookies.clear("vendor-location-name");
           //Mage.Cookies.clear("vendor-location-lat");
           //Mage.Cookies.clear("vendor-location-lng");
         }

    });
}
google.maps.event.addDomListener(window, 'load', initialize);

function getData(lat,lng){
  jQuery('.loader_container').show();
  jQuery.ajax({
            url: URL + "vendors",
            type: "POST",
            data: {'lat':lat,'lng':lng},
            success: function(transport) {
              jQuery('.loader_container').hide();
                  var response = jQuery.parseJSON(transport);
                   jQuery('#dealerul > li').remove();
                   jQuery('#dealerul').append(response.results);
                    jQuery('#dealerul > li').hide();
                    size_li = jQuery("#dealerul li").size();
                    x=6;
                    jQuery('#dealerul li:lt('+x+')').css('display', 'inline-block');
                    if(x==size_li || size_li <= 6){
                        jQuery('#loadMore').hide();
                    }else{
                        jQuery('#loadMore').show();
                    }
            }
            });
}
jQuery('#loadMore').on('click', function(){
    x= (x+6 <= size_li) ? x+6 : size_li;
    jQuery('#dealerul li:lt('+x+')').css('display', 'inline-block');
    if(x==size_li || size_li <= 6){
     jQuery('#loadMore').hide();
    }
});

jQuery('#geoloc').on('click', function(){
     getLocation();
});

jQuery('#reset').on('click',function(){
  jQuery('#dealerlocation').val('');
  jQuery('#reset').hide();
  // Mage.Cookies.clear("vendor-location-name");
  // Mage.Cookies.clear("vendor-location-lat");
  // Mage.Cookies.clear("vendor-location-lng");
});

var input = document.getElementById('dealerlocation');
 google.maps.event.addDomListener(input, 'keydown', function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
    }
  });

jQuery("#dealerlocation").keyup(function(){
  if(this.value.length > 0) {
  jQuery('#reset').show();
  }else{
  jQuery('#reset').hide();
  }
});

jQuery("#vendors").change(function(){
  jQuery('.loader_container').show();
  if(jQuery("#dealerlocation").val() != ""){
    name = Mage.Cookies.get('vendor-location-name');
    lat = Mage.Cookies.get('vendor-location-lat');
    lng = Mage.Cookies.get('vendor-location-lng');
  }else{
    name = "";
    lat = "";
    lng = "";
  }
  vendor = jQuery('#vendors').val();
  jQuery.ajax({
    url: URL + "dealerlocator/index/ajaxdealercompany",
    type: "POST",
    data: {'place':name,'lat':lat,'lng':lng,'company':vendor},
    success: function(transport) {
        jQuery('.loader_container').hide();
        var response = jQuery.parseJSON(transport);
        jQuery('#dealerul > li').remove();
        jQuery('#dealerul').append(response.results);
        jQuery('#dealerul > li').hide();
        size_li = jQuery("#dealerul li").size();
        x=6;
        jQuery('#dealerul li:lt('+x+')').css('display', 'inline-block');
        if(x==size_li || size_li <= 6){
        jQuery('#loadMore').hide();
        }else{
        jQuery('#loadMore').show();
        }
    }
  });
});

function getVendors(place,lat,lng){
  jQuery('.loader_container').show();
  jQuery.ajax({
    url: URL + "dealerlocator/index/getVendors",
    type: "POST",
    data: {'place':place,'lat':lat,'lng':lng},
    success: function(transport) {
    jQuery('.loader_container').hide();
    jQuery("#vendors option").remove();
    jQuery(".select-container").find("li").remove();
    data = jQuery.parseJSON(transport);
    console.log(data);
    jQuery.each(data, function(index, value) {
      jQuery('#vendors').append(jQuery('<option>').text(value).attr('value', value));
      jQuery(".select-container").find("ul").append('<li class="active" data-value="'+value+'"> '+value+' </li>');
    });
    }
    });
  }

});
