<?php 
session_start();
include("connection.php");

if(!empty($_POST['bio'])){
   $bio = $_POST['bio'];
   $id = $_SESSION['id'];
    
$query = "update login set Bio = '$bio' where userId = '$id'";
	
//$result = mysqli_query($conn, $query);


if ($conn->query($query) === TRUE) {
	header("Location:profile.php");
  } else {
	echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
else{
    header("Location:profile.php");
	echo '<script>alert("Post cannot be empty profile")</script>';
}




?>