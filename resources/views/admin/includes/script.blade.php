
<script>
    var area_full='s';
  var area_short='df';
  var city_full= 'dfd';
  var city_short= 'fg';
  var state_full='fg';
  var state_short='fg';
  var country_full='fgf';
  var country_short='ff';
  var lat='fgf';
  var long='ffgf'
  var formatted_address='fgfgf';
  new google.maps.event.addDomListener(window, 'load', function () {
      var input = document.getElementById('address');

      var autocomplete = new google.maps.places.Autocomplete(input);
 
      autocomplete.addListener('place_changed', function() {
          formatted_address='';
          var place = autocomplete.getPlace();
          var len=place.address_components.length;
          area_full=(len > 0) ? place.address_components[0].long_name:"";
          area_short=(len > 0) ? place.address_components[0].short_name:"";
          
          city_full=  (len > 1) ? place.address_components[1].long_name:"";
          city_short= (len > 1) ? place.address_components[1].short_name:"";
          
          state_full=(len > 2) ? place.address_components[2].long_name:"";
          state_short=(len > 2) ? place.address_components[2].short_name:"";
          
          country_full=(len > 3) ? place.address_components[3].long_name:"";
          country_short=(len > 3) ? place.address_components[3].short_name:"";
          
          lat=place.geometry.location.lat();
          long=place.geometry.location.lng();
          formatted_address=place.formatted_address;
          $("#latititude").val(lat);
          $("#lognitiude").val(long);
      });
  });

    function chnageClassType(){
        var select = document.querySelector('input[name="typeClass"]:checked').value;
        
        if(select == 'Home') { 
            document.getElementById('classTypeAddress').style.display = "block";
        }
        else { 
            document.getElementById('classTypeAddress').style.display = "none"; 
        }
    }
    
    function addAddressDiv(){
        console.log('here');
    }
    
    function image_preview(event){
		

		var reader = new FileReader();
         reader.onload = function()
         {
			var nextSib = document.getElementById(event.target.id+'_preview').nextElementSibling;
			var ref = document.getElementById(event.target.id+'_preview');
			
			if(nextSib != '')
			{
				$('#'+event.target.id+'_preview').next('img').remove();
				$('#'+event.target.id+'_preview').next('i').remove();
			}
			//-- Creating Image tag --//
			var output = document.createElement('img'); 
			//--- Creating close button ---//
			var close_btn = document.createElement('i');      
			close_btn.className ="fa fa-remove text-danger";
			$(output).insertAfter(ref);	
			$(close_btn).insertAfter(output);	
			
			close_btn.addEventListener("click", function(){
				document.getElementById(event.target.id).value = "";
				$('#'+event.target.id+'_preview').next('img').remove();
				close_btn.remove();
			});

					
			output.src = reader.result;
			output.style.height = "100px";
			output.style.width = "100px";

        }
		
         reader.readAsDataURL(event.target.files[0]);
	}
</script>