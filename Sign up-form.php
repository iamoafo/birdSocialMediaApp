<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TWITCHER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
    <script src="CheckPasswordStrength.js"></script>  
    <link href="CheckPasswordStrength.css" rel="stylesheet" />
    <script>
      $(document).ready(function () {  
    $('#password').keyup(function () {  
        $('#strengthMessage').html(checkStrength($('#password').val()))  
    })  
    function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Short')  
            return 'Too short'  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Weak')  
            return 'Weak'  
        } else if (strength == 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Good')  
            return 'Good'  
        } else {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Strong')  
            return 'Strong'  
        }  
    }  
});  
    </script> 


    <link rel="stylesheet" href="css/styles.css">
    <script src="index.js"></script>
  </head>
  <body>
    <div class="top">
    <h1 id="heading">WELCOME TO TWITCHER</h1>
    </div>

    <div class="SignUp">
    <div>
        <h2>Sign up</h2>
    </div>
   
    <form method="POST" action="Sign up.php">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="FirstName4">FirstName</label>
      <input type="text" class="form-control" name= firstname id="FirstName4" placeholder="FirstName" required>
    </div>
    <div class="form-group col-md-6">
      <label for="LastName4">LastName</label>
      <input type="text" class="form-control" name="lastname" id="LastName4" placeholder="LastName" required>
    </div>
    <div class="form-group col-md-6">
      <label for="Username4">Username</label>
      <input type="text" class="form-control" name="Username" id="Username" placeholder="Username" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name= email id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      <div id="strengthMessage"></div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Telephone Number</label>
      <input type="text" class="form-control" name="telephone" id="telephone" placeholder="phone number" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="textarea" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St" required>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="textarea" class="form-control" name="address2" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city" id="inputCity" required>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">PostCode</label>
      <input type="text" class="form-control" name="postcode" id="inputZip" required>
    </div>
  </div>

  
 
  <button type="submit" class="btn btn-primary">Sign up</button>
  <a href="login-form.php">Back to Login Page</a>
</form>
</div>



 </body>

 </html>