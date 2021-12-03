<html> 

	<head> 
	
	  <title> Geocoding An Address </title>
	
	</head>
	
	 <body> 
	 
	 
	 </body>
	 
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	 
	   <script type="text/javascript">
	 
	    var position = {};
		
	     $.ajax({
            url:"https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCd6l6sFFq0bBngQTv_zZ4qj49xSTNxr2k",
           
		   type:"GET",
            
			success: function (data){
               
			   $.each(data["results"][0]["address_components"],function(key, value) {
				   
				   if(value["types"][0] == "country") {
					   
					  alert(value["short_name"]); 
					      
				    }
				  
				   
			      })
        			 
			   }
			 
			})

	   </script>


</html>