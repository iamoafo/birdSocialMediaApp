<?php
include_once("connection.php");
session_start();

if (isset($_POST['back-button'])) {
    echo '<script> window.location.replace("homepage.php")</script>';
} 
else{

if(isset($_POST['delete-button'])){
    $postid = $_SESSION['postid'];
}



$sql = "DELETE FROM userpost WHERE postid = $postid";

if (mysqli_query($conn, $sql)) {
  echo '<script>alert("Record deleted successfully")</script>';
  echo '<script> window.location.replace("homepage.php")</script>';
 

} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>