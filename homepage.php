<?php 
session_start();   

if( $_SESSION['name']== ""){
  header("Location:login-form.php");
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>My profile | Twitcher</title>
    
  </head>
  <body>
  <div class="bar">
    <div class="bar-text">
      <a style='text-decoration:none' href="index.php">Twitcher</a>
    <a href="logout.php" style="float:right">Logout</a>
    </div>
  </div>
  
  <div class="profile-header">
    <div class="profile-headerImage">
      <img src="images/birdss.jpg" style="width:100%; height:100%" />
      <?php 
       include_once("connection.php");
       $id = $_SESSION['id'];

       $query = mysqli_query($conn,"Select * from login where userid = '$id'")  ;
     
         while($row= mysqli_fetch_array($query)){
           if( $row['profile_pic']){
             $filepath = $row['profile_pic'];
             echo "<img id='profile-pic' src='uploads/$filepath'/>";
             }
       }
      ?>
      <br>
      <a style='text-decoration:none' href="editProfile.php">change profile pic</a>
      <div class="header-text"><?php echo $_SESSION['name'] . " ".$_SESSION['lname']?></div>
      <br>
      <div id="menu-buttons"><a style='text-decoration:none' href="index.php"> Timeline </a></div> 
      <div id="menu-buttons">About</div>
      <div id="menu-buttons">Photos</div>
      <hr>
    </div>
  </div>
 

 <div class="whats-happening">
  <form action="textpost.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <!-- <input type="text" class="form-control" id="userpost" placeholder="what's Happening?" name="userpost"> -->
      <textarea name="textpost" placeholder="what's Happening?"></textarea>
      <input type="text" class="form-control" id="latitude" name="latitude" hidden>
      <input type="text" class="form-control" id="longitude" name="longitude" hidden>

    </div>
    <input type="file" name="mypicture">
    <button id= "post-button" type="submit" class="btn btn-primary">Post</button>
  </form>
  </div>
  <div class="posts" style='padding:10px'>
  <h2>My Posts</h2>
  <hr>
  <?php 
  include_once("connection.php");
  
  $id = $_SESSION['id'];
 
 

  $query = mysqli_query($conn,"Select * from userpost where userid = '$id' order by id desc")  ;

		while($row= mysqli_fetch_array($query)){
      echo "<p style='color:blue'><strong>" .$_SESSION['name'] . " ".$_SESSION['lname'] ."</strong></p>";
      echo "<p>". $row['textpost'] . "</p>";
      if( $row['imagePath']){
        $filepath = $row['imagePath'];
        echo "<img src='images/$filepath'  style='width:100%;'/>";
        
        }
      echo "<span style='color:#D3D3D3'>". $row['date'] . "</span>";
      echo "<span style='color:#D3D3D3; float:right;'><a style= 'text-decoration:none;' href='editPost-form.php?id=". $row['postid']."'> Edit</a>.<a style= 'text-decoration:none;' href='delete-form.php?id= ". $row['postid']. "'> delete</a> </span>";
      echo "<hr>";
  }

    
  
  ?>
  
  </div>


<script>

	var latitude;
  var longitude;

function myFunction(position){

  latitude= position.coords.latitude;
  longitude=position.coords.longitude;

	document.getElementById('latitude').value = latitude;
  document.getElementById('longitude').value = longitude;

 
} 

if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(myFunction);
}

</script> 


  </body>

</html>