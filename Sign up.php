<?php 
include("connection.php");
	
	$firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['Username'];
	$email = $_POST['email'];
  $password = $_POST['password'];
  $telephone = $_POST['telephone'];
  $address = $_POST['address'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
	$postcode = $_POST['postcode'];

  $userid = rand();
	
$password = password_hash($password,PASSWORD_DEFAULT);

	$query = "INSERT INTO login(userId,FirstName,LastName,Username,email,password,phone_numb,address,address2,city,postcode) VALUES ('$userid','$firstname','$lastname','$username','$email','$password','$telephone','$address','$address2', '$city', '$postcode')";
	
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