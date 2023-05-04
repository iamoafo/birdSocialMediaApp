<?php 
include_once("connection.php");
session_start();   

if( $_SESSION['name']== ""){
  header("Location:login-form.php");
}


       $id = addslashes( $_SESSION['id']);
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
            <div id="menu-buttons"><a style='text-decoration:none' href="About.php">About</a></div>
            <div id="menu-buttons">Photos</div>
            <hr>
      </div>

      <div style="display:flex;">
        <div class="about" style="flex:1;min-height:400px">
        <?php 
                         $query = mysqli_query($conn,"Select * from login where userid = '$id'")  ;
                         while($row= mysqli_fetch_array($query)){
                              echo "<strong>Bio</strong><br/>";
                              echo htmlspecialchars($row['Bio']). "<br/><br/>";
                              echo "<strong>Telephone Number</strong><br/>";
                              echo $row['phone_numb']. "<br/>";
                              echo "<strong>Address</strong><br/>";
                              echo $row['address']. "<br/>";
                              echo $row['address2']. "<br/>";
                              echo $row['city']. "<br/>";
                              echo $row['postcode']. "<br/>";
                               
                                 }
                        
                        ?>
        <div>
       </div>

    </div>

    




    </body>

</html>

