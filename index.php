<?php 
include_once("connection.php");
session_start();   

if( empty($_SESSION['name'])){
  echo "<style> .user-timeline{ display:none;}";
  echo "#logout-link{display:none;}";
  echo "</style>";
}

else{

    echo "<style> ";
    echo "#login-link{display:none;}";
    echo "</style>";

    $firstname = $_SESSION['name'];
    $lastname = $_SESSION['lname'];

   
}

if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
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
      <span id="logout-link"><a href="logout.php" style="float:right">Logout</a></span>
      <span id="login-link"><a href="login-form.php" style="float:right; text-decoration:none">Login</a></span>
      
    </div>
  </div> 

  <div class="user-timeline"> 
    
      <?php 
        $query = mysqli_query($conn,"select * from login where userid='$id';");

        while($row= mysqli_fetch_array($query)){
          if( $row['profile_pic']){
            $filepath = $row['profile_pic'];
            echo "<span><img src='uploads/$filepath'  style= 'width:75px; margin:4px;border-radius:50%;'/></span>";
            }
        }
      
      
      
        echo "<a style='text-decoration:none;'href='homepage.php'>". $firstname . " ". $lastname . "</a>"; 
        ?>
  </div>

    <div class="whats-happening-timeline">
        <form action="textpost.php" method="POST">
        <div class="mb-3 mt-3">
         <textarea name="timelinePost" placeholder="what's Happening?"></textarea>
        </div>
        <button id= "post-button" type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
  
   <div class="timeline">
        <div class="timeline-child">
                <!-- <div> -->
                <!-- <img src="images/isaac_drawing.jpg" style="width:75px; margin:4px;">
                </div> -->
                <div style='padding:10px'>
                   <!-- <div style="font-weight:bold;color: black ">One person</div> -->
                    <h2>My Posts</h2>
                    <hr>
                    <?php 
                            

                         

                            $query = mysqli_query($conn,"select FirstName,LastName,textpost,imagePath,profile_pic,userpost.date,postid,userpost.userid from userpost join login on userpost.userid=login.userId order by userpost.id desc");

                                    while($row= mysqli_fetch_array($query)){
                                      if( $row['profile_pic']){
                                        $filepath = $row['profile_pic'];
                                        echo "<span><img src='uploads/$filepath'  style= 'width:75px; margin:4px;border-radius:50%;'/></span>";
                                        }

                                        if($row['FirstName'] == $_SESSION['name'] && $row['LastName'] == $_SESSION['lname']){
                                          echo "<span style='font-weight:bold;color:blue;'><a style='text-decoration:none;' href='homepage.php?id=". $row['userid']."'>" . $row['FirstName'] . " ".$row['LastName'] ."</a></span>";

                                        }
                                        else{
                                          echo "<span style='font-weight:bold;color:blue;'><a style='text-decoration:none;' href='viewUsers.php?id=". $row['userid']."'>" . $row['FirstName'] . " ".$row['LastName'] ."</a></span>";

                                        }
                                          echo "<p>". $row['textpost'] . "</p>";
                                          if( $row['imagePath']){
                                            $filepath = $row['imagePath'];
                                            echo "<img src='images/$filepath'  style='width:100%;'/>";
                                            }
                                          echo "<span style='color:#D3D3D3'>". $row['date'] . "</span>";
                                          echo "<span><a style='text-decoration:none;float:right;' href='location.php?id=". $row['postid']."'>location</a></span>";

                                                  echo "<hr>";
                                    }

                                mysqli_close($conn); 

                        ?>
                 </div>

        </div>
    </div>
    
  
  </body>

</html>