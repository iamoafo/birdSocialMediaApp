<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TWITCHER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">

    </script>

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
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name= email id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
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