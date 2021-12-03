<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Postcode Finder!</title>
  </head>
  
   <style type="text/css"> 
	
	html { 
		background: url(back-image.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		
		body {
			background:none;	
		     }
			 
			 
		 
		
		h1 {
			
			color:white;
		}
		
		p {
			
			color:white;
			
		}
		
		.form-label {
			
			color:white;
		}
			 
		</style>
  
  
  
  <body>
  
  <div class="container"> 
  
    <h1>Postcode Finder</h1>
	
	<p>Enter a partial address to get the postcode.</p>
	
	<div id="message"> </div>
	
	    <form>
		  <div class="mb-3">
			<label for="address" class="form-label">Address</label>
			<input type="text" class="form-control" id="address" placeholder="Enter partial address">
		  </div>
		 
		  <button  class="btn btn-primary" id="find-postcode">Submit</button>
		</form>

     </div>
   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	 <script type="text/javascript"> 
	 
      	$("#find-postcode").click(function(e) {
			
		 e.preventDefault();
		
	    $.ajax({
			
		 url:"https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=AIzaSyCZ2fRagUba38OzvsTkiLfh5F-acVYhP_Q",
              type: "GET",
              success: function (data) {
				  
				  console.log(data);
				  
				  if(data["status"] != "OK") {
					  
					 $("#message").html('<div class="alert alert-warning" role="alert">Postcode could not be found - please try again.</div>');   
					  
				  } else {
				  
				 $.each(data["results"][0]["address_components"], function (key, value) {
					 
					 if (value["types"][0] == "postal_code") {
						 
						 $("#message").html('<div class="alert alert-success" role="alert">Postcode found! The postcode is '+ value["long_name"] + '.</div>');
						 
						 
					    }
					 
				     })
					 
				   }
				 				 
		    	 }	  
			
		   })
	 
		})
	 
	 </script>
	
	
  </body>
</html>