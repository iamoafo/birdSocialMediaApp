<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>My profile | Twitcher</title>
    
  </head>
  <body>
  <div class="bar">
    <div class="bar-text">
      <a style='text-decoration:none' href="index.php">Twitcher</a>
      
    </div>
  </div>
  
    <div class="edit-page">
    <form action="profileImageUpload.php" method="POST" enctype="multipart/form-data">
        Edit your profile<br>
    <input type="file" name="mypicture">
    <button id= "post-button" type="submit" class="btn btn-primary">Change</button>
  </form>
    </div>
  



  </body>

</html>