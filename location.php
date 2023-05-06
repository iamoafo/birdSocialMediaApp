<?php 
include_once("connection.php");
include_once("secrets.php");
session_start(); 

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
   
    <div id="map"></div>
    <script>
      function initMap() {
				
				getLocation();
				
        
      }
      
		function getLocation() {
				if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(showPosition);
				} else {
						alert("Geolocation is not supported by this browser.");
				}
		}
		function showPosition(position) {
			        <?php 
					
  if(isset($_GET['id'])){
	$postid = $_GET['id'];
  }
 
 

  $query = mysqli_query($conn,"Select * from userpost where postid = '$postid' order by id desc")  ;

		while($row= mysqli_fetch_array($query)){
        $latitude = $row['latitude'];
		$longitude = $row['longitude'];


		
  }

            
  
						
			//echo "<script> var uluru = {lat:". $latitude .", lng:". $longitude . "}; </script>";	

			mysqli_close($conn);
					?>
				    var uluru = {lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>};
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 8,
						center: uluru
					});
					var marker = new google.maps.Marker({
						position: uluru,
						map: map
					});
			
		}
    </script>
    <script async defer

    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $secret?>&callback=initMap">
    </script>

   <form action="location.php" method="POST">
   <button style="margin-right:20px"id= "post-button" type="submit" class="btn btn-primary" name="back-button">Back</button>

   </form>


   <?php 
 if(isset($_POST['back-button'])){
	header("Location:index.php");
 }  
   ?>

  </body>
</html>

