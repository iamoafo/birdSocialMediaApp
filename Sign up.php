<?php 
include("connection.php");
	
	$firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
	$email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
	$postcode = $_POST['postcode'];

  $userid = rand();
	

	$query = "INSERT INTO login(userId,FirstName,LastName,email,password,address,address2,city,postcode) VALUES ('$userid','$firstname','$lastname', '$email','$password','$address','$address2', '$city', '$postcode')";
	
	$result = mysqli_query($conn, $query);

	



  if (!$result) {
    printf("Error when adding user %s\n", mysqli_error($conn));
  }else{
    
    
   
    echo '<script> alert("Successfully Registered")</script>';
    echo '<script> window.location.replace("login-form.php")</script>';
    echo "<p>The new user has been added successfully".mysqli_insert_id($conn)."</p>";
    
  }

  mysqli_close($conn);
?>