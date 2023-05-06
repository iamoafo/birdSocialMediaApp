<?php
include_once("connection.php");
session_start();






    if (isset($_POST['back-button'])) {
        echo '<script> window.location.replace("profile.php")</script>';
    } 
    else{

    if(isset($_POST['edit-button'])){
       if(!empty($_POST['editbox'])){
        $textpost = $_POST['editbox'];
        $postid = $_SESSION['postid'];
        }
        else{
          echo '<script>alert("Fields cant be empty")</script>';
        }
    }



$sql = "UPDATE userpost set textpost='$textpost'  WHERE postid = $postid";

if ($conn->query($sql) === TRUE) {
    header("Location:profile.php");
    echo "Record updated successfully";
    }else{
        echo "MySQL Error: ".mysqli_error($conn)."\n<br />";
    }

mysqli_close($conn);
}
?>