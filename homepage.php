<?php 
include_once("connection.php");
session_start();   

if( $_SESSION['name']== ""){
  header("Location:login-form.php");
}


       $id = $_SESSION['id'];
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
      <!-- <img src="images/birdss.jpg" style="width:100%; height:100%" /> -->
      <?php 

       $query = mysqli_query($conn,"Select * from login where userid = '$id'")  ;
     
         while($row= mysqli_fetch_array($query)){
           if( $row['cover_image']){
             $filepath = $row['cover_image'];
             echo "<img style='width:100%; height:100%' src='uploads/$filepath'/>";
             }
             else{
              echo "<img src='uploads/grey.jpg'/>";
             }
       }
      ?>
      <?php 
       

       $query = mysqli_query($conn,"Select * from login where userid = '$id'")  ;
     
         while($row= mysqli_fetch_array($query)){
           if( $row['profile_pic']){
             $filepath = $row['profile_pic'];
             echo "<img id='profile-pic' src='uploads/$filepath'/>";
             }
             else{
              echo "<img id='profile-pic' src='uploads/placeholderimage.jpeg'/>";
             }
       }
      ?>
      <br>
      <a style='text-decoration:none' href="editProfile.php">Edit Your profile</a>
      <div class="header-text"><?php echo $_SESSION['name'] . " ".$_SESSION['lname']?></div>
      <br>
      <div id="menu-buttons"><a style='text-decoration:none' href="index.php"> Timeline </a></div> 
      <div id="menu-buttons">About</div>
      <div id="menu-buttons">Photos</div>
      <hr>
    </div>
  
      <!-- Below cover area -->
      <div style="display:flex;">
              <!-- Bio -->
              <div class="bio-bar" style="flex:1;">
                    <div >
                    Your Bio

                    <div class="bio"></div>
                    </div>
                    
              </div>
              <!-- what's happening -->
                 <div style="min-height: 400px;flex:2;padding:10px">
                      <div style="border:solid thin #aaa;padding:10px;background-color:lightcyan">
                      <form action="textpost.php" method="POST" enctype="multipart/form-data">
                            <textarea name="textpost" placeholder="what's Happening?"></textarea>
                            <input type="text" class="form-control" id="latitude" name="latitude" hidden>
                            <input type="text" class="form-control" id="longitude" name="longitude" hidden>
                            <input type="file" name="mypicture" style="float:left;">
                            <input id= "post-button" type="submit" class="btn btn-primary" value="Post"/><br>
                        </form>
                      </div>

                        <!-- posts -->
                        <div class="post-bar">
                                <h2>My Posts</h2>
                                  <hr>
                                  <div class='actual-post'>
                                        <div class='image'>
                                           
                                        <img style='width:75px;margin-right:4px'; src='uploads/mk.jpeg'/>

                                        </div>
                                            
                                  <?php 
                                  $query = mysqli_query($conn,"Select * from userpost where userid = '$id' order by id desc")  ;
                                  while($row= mysqli_fetch_array($query)){
                                         
                                          echo "<div style='text-align:left;'>";
                                          echo "<div style='font-weight:bold;color:#405d9b'>" .$_SESSION['name'] . " ".$_SESSION['lname'] ."</div>";
                                          echo $row['textpost'];
                                          if( $row['imagePath']){
                                            $filepath = $row['imagePath'];
                                        echo "<img style='width:100%;' src='uploads/$filepath'/>";
                                       }
                                          echo "<br/>";
                                          echo "<span style='color:#D3D3D3'>". $row['date'] . "</span>";
                                          echo "<span style='color:#D3D3D3; float:right;'><a style= 'text-decoration:none;' href='editPost-form.php?id=". $row['postid']."'> Edit</a>.<a style= 'text-decoration:none;' href='delete-form.php?id= ". $row['postid']. "'> delete</a> </span>";
                                          echo "<hr>";

                                          }
                                    ?>
                                    </div>
                                  </div>
                        </div>
            
                  </div>
             
        </div>
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