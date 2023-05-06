<?php 
session_start();
include("connection.php");

	
  if(!empty($_POST['Username']) and !empty($_POST['pswd'])){
  $username = mysqli_real_escape_string($conn,$_POST['Username']);
  $password = mysqli_real_escape_string($conn,$_POST['pswd']);
  }
  else{
    echo '<script>alert("Fields cant be empty")</script>';
  }



	$sql = "select * from login where Username = '".$username."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  == 1){
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($password,$row['password'])){
			echo "Password verified";
      $_SESSION[$username]= $row['Username'];
      $_SESSION[$password] = $row['password'];
      $_SESSION['name'] =$row['FirstName'];
      $_SESSION['lname'] =$row['LastName'];
      $_SESSION['id'] = $row['userId'];
      header("Location:index.php");
		}
		else{
			echo "Wrong Password";
      echo '<script>alert("Invalid Username or password")</script>';
      echo '<script> window.location.replace("login-form.php")</script>';
		}
	}
	else{
		echo "No User found";
	}






    
    mysqli_close($conn);




?>