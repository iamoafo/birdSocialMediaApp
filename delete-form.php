<?php 
session_start(); 

if(isset($_GET['id'])){
    $id = addslashes($_GET['id']);
    $_SESSION['postid'] = $id;
}
else{
    echo "nothing came through";
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
      
    </div>
  </div> 

   <div class="deleteForm">
        <form action="delete.php" method="POST">
        <strong>Delete Post</strong></br>
                Are you sure you want to delete this post?</br>
            <?php 
             include_once("connection.php");

             $query = mysqli_query($conn,"select * from userpost where postid = $id");

                     while($row= mysqli_fetch_array($query)){
                        echo "<hr>";
                        echo "<p style='color:blue'><strong>" .$_SESSION['name'] . " ".$_SESSION['lname'] ."</strong></p>";
                        $row['postid'];
                        echo "<p>". $row['textpost'] . "</p>";
                        if( $row['imagePath']){
                          $filepath = $row['imagePath'];
                          echo "<img src='images/$filepath'  style='width:100%;'/>";
                          }
                        echo "<hr>"; 
                     }

                 
            ?>
            </br>
            <button id= "post-button" type="submit" class="btn btn-primary" name="delete-button">Delete</button>
            <button style="margin-right:20px"id= "post-button" type="submit" class="btn btn-primary" name="back-button">Back</button>

        </form>
    </div>


    </body>

</html>
