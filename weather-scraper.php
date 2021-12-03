<?php

$weather = "";
$error = "";

if ($_GET['city']) {
	

    $urlContents =    
    file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",&appid=344d6641b1dc0ff54c5df0e32182f3a2");
	
  $weatherArray = json_decode($urlContents, true);
  

  
        if ($weatherArray['cod'] == 200) {
	
		$weather = "The weather in ".$_GET['city']." is currently
		'".$weatherArray['weather'][0]['description']."'. ";
	
		$tempInCelsius = intval($weatherArray['main']['temp'] - 273);
	
		$weather .= " The temperature is ".$tempInCelsius."&deg;C and 
		the wind speed is ".$weatherArray['wind']['speed']."m/s.";
	
		} else {
			
			$error = "Could not find city - please try again later!";
			
	   }
	   
   }	   

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Weather Scraper!</title>
	
	<style type="text/css"> 
	
	html { 
		background: url(background-.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		
		body {
			background:none;	
		     }
			 
		.container {
			     text-align:center;
				 margin-top:125px;
				 width:450px;
			    	}	
        h1 {
			color:#F5F5F5;
		   }	

        label {
			color:#F5F5F5;
			font-size:20px;
		   }	

       input {
		     margin:20px 0;
	         }	

       #weather {
	          margin-top: 15px;
	           }			 

	</style>
	
  </head>
  
  <body>
  
  
   <div class="container">  
	<h1>What's The Weather?</h1>

	
	<form>
  <div class="form-group">
    <label for="city">Enter the name of a City.</label>
    <input type="text" name="city" class="form-control" id="city" placeholder="e.g London, Tokyo" value="<?php 
	  if(array_key_exists('city', $_GET)) {
	    echo $_GET['city'];
	     }
		 ?>">
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

 <div id="weather">
 
  <?php
  
   if ($weather) {
	   
	  echo '<div class="alert alert-success" role="alert">'.$weather.'</div>'; 
	      
   } else if ($error) {
	   
	  echo '<div class="alert alert-danger" role="alert">'.$error.'</div>'; 
	      
      }   

  ?> 
 
 </div>
	
	</div>

   
  </body>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

 </html>