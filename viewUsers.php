<?php 
include_once("connection.php");
session_start();   

if( $_SESSION['name']== ""){
  header("Location:login-form.php");
}


if(isset($_GET['id'])){
	$id = $_GET['id'];
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
             $fname = $row['FirstName'];
             $lname= $row['LastName'];
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
      
      <div class="header-text"><?php echo $fname . " ".$lname?></div>
      <br>

        <div id="menu-buttons"><a style='text-decoration:none' href="viewUsers.php?id= <?php echo $id ?>">Profile</a></div>
      <div id="menu-buttons"><a style='text-decoration:none' href="index.php"> Timeline </a></div> 
      <div id="menu-buttons"><a style='text-decoration:none' href="About.php?id= <?php echo $id ?>">About</a></div>
      <hr>
    </div>
  
      <!-- Below cover area -->
      <div style="display:flex;">
              <!-- Bio -->
              <div class="bio-bar" style="flex:1;">
                    <div >
                        Your Bio
                        <hr>

                      <div class="bio">
                            <?php 
                            $query = mysqli_query($conn,"Select Bio from login where userid = '$id'")  ;
                                while($row= mysqli_fetch_array($query)){
                                    echo htmlspecialchars($row['Bio']);

                                        }
                                        ?>
                      </div>
                      <div class="bio">
                        <h3>Address</h3>
                        <?php 
                         $query = mysqli_query($conn,"Select * from login where userid = '$id'")  ;
                         while($row= mysqli_fetch_array($query)){
                              echo $row['address']. "<br/>";
                              echo $row['address2']. "<br/>";
                              echo $row['city']. "<br/>";
                              echo $row['postcode']. "<br/>";
                               
                                 }
                        
                        ?>
                      </div>
                    </div>
                    
              </div>

                        <!-- posts -->
                        <div class="post-bar">
                                <h2>My Posts</h2>
                                  <hr>
                                  <div class='actual-post'>
                                    
                                  <?php 
                                    $query = mysqli_query($conn,"select FirstName,LastName,textpost,imagePath,profile_pic,userpost.date,postid,userpost.userid from userpost join login on userpost.userid=login.userId where userpost.userid ='$id' order by userpost.id desc")  ;
                                  while($row= mysqli_fetch_array($query)){
                                          echo "<div class='image'>";
                                          if( $row['profile_pic']){
                                            $filepath = $row['profile_pic'];
                                          echo "<img style='width:75px;margin-right:4px;float:left;' src='uploads/$filepath'/>";
                                          }
                                          echo "</div>";
                                          echo "<div style='text-align:left;'>";
                                          echo "<div style='font-weight:bold;color:#405d9b'>" .$row['FirstName'] . " ".$row['LastName'] ."</div>";
                                          echo htmlspecialchars($row['textpost']);
                                          if( $row['imagePath']){
                                            $filepath = $row['imagePath'];
                                        echo "<img style='width:100%;' src='images/$filepath'/>";
                                       }
                                          echo "<br/>";
                                          echo "<span style='color:#D3D3D3'>". $row['date'] . "</span>";
                                          echo "<hr>";

                                          }
                                    ?>
                                    </div>
                                  </div>
                        </div>
            
                  </div>
             
        </div>
    </div>
 




  </body>

</html>