<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TWITCHER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
  
  </head>
  <body>
    <div class="top">
    <h1 id="heading">WELCOME TO TWITCHER</h1>
    </div>
   
    <div class="login">
  <h2>Please Login</h2>
  <form action="login.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="Username">Username:</label>
      <input type="text" class="form-control" id="Username" placeholder="Enter Username" name="Username" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <a href="Sign up-form.php">Don't have an account? Please sign up</a>
</div>

  </body>
</html>