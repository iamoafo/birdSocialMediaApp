<?php 
session_start();
include("connection.php");

	
  if(!empty($_POST['email']) and !empty($_POST['pswd'])){
  $email = $_POST['email'];
  $password = $_POST['pswd'];
  }
  else{
    echo '<script>alert("Fields cant be empty")</script>';
  }

  $password = hash("sha1",$password);

	$query = mysqli_query($conn,"Select * from login where email = '$email' and password = '$password'")  ;

	$result = mysqli_fetch_array($query);

  
    
   if(is_array($result)){
    $_SESSION[$email]= $result['email'];
    $_SESSION[$password] = $result['password'];
    $_SESSION['name'] =$result['FirstName'];
    $_SESSION['lname'] =$result['LastName'];
    $_SESSION['id'] = $result['userId'];
   }
   else{
    echo '<script>alert("Invalid Username or password")</script>';
    echo '<script> window.location.replace("login-form.php")</script>';
   }

   if(isset($_SESSION[$email])){
    $_SESSION['name'] =$result['FirstName'];
    header("Location:index.php");
   }
    
    mysqli_close($conn);



//   if (!$result) {
//     printf("Error when adding user %s\n", mysqli_error($conn));
//   }else{
    
//     header('Location: login-form.php');
//     echo '<script>alert("Thank you for registering")</script>';
//     echo "<p>The new user has been added successfully".mysqli_insert_id($conn)."</p>";
    
//   }


?>