<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>My profile | Twitcher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
  <div class="bar">
    <div class="bar-text">
      <a style='text-decoration:none' href="index.php">Twitcher</a>
      
    </div>
  </div>
     <h1 style="text-align:center; color:rgb(24, 197, 236);">Edit your Profile</h1>
    <div class="edit-page">
    <form action="profileImageUpload.php" method="POST" enctype="multipart/form-data">
        Edit your profile Image<br>
    <input type="file" name="mypicture">
    <button  type="submit" class="btn btn-primary">Change Profile Image</button>
  </form>
    </div><br>

    <div class="edit-page">
    <form action="coverImageUpload.php" method="POST" enctype="multipart/form-data">
        Edit your Cover Image<br>
    <input type="file" name="coverpicture">
    <button type="submit" class="btn btn-primary">Change Cover photo</button>
  </form>
    </div>

    <div style="background-color:lightcyan;"class="edit-page">
    <form action="updateBio.php" method="POST">
        Edit your Bio<br>
    <textarea name="bio" placeholder="say something..."></textarea>
    <button style='float:right;' type="submit" class="btn btn-primary">Change Bio</button>
  </form>
    </div>
  



  </body>

</html>