<?php 
session_start();
include("connection.php");

if(!empty($_POST['textpost'])){
    $post = $_POST['textpost'];
    $userid = $_SESSION['id'];
	$latitude =$_POST['latitude'];
	$longitude= $_POST['longitude'];
    $postid = rand();
    
$query = "INSERT INTO userpost(textpost,userid,postid,latitude,longitude) VALUES ('$post','$userid','$postid',$latitude,$longitude)";
	
//$result = mysqli_query($conn, $query);


if ($conn->query($query) === TRUE) {
	header("Location:homepage.php");
  } else {
	echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
else{
    header("Location:homepage.php");
	echo '<script>alert("Post cannot be empty homepage")</script>';
}






 if(!empty($_POST['timelinePost'])){
    $post = $_POST['timelinePost'];
    $userid = $_SESSION['id'];
    $postid = rand();
    
    $query = "INSERT INTO userpost(textpost,userid,postid) VALUES ('$post','$userid','$postid')";
	
$result = mysqli_query($conn, $query);


if (!$result) {
printf("Error when adding post %s\n", mysqli_error($conn));
}else{




header("Location:index.php");
echo "<p>Your post has been added successfully".mysqli_insert_id($conn)."</p>";

}

}
else{
   
    header("Location:index.php");
	echo '<script>alert("Post cannot be empty timeline")</script>';
}



//  if ($_FILES["imagefile"]){

//     header("Location:imageUpload.php");
//  }



if ($_FILES["mypicture"]["size"] < 20000000){
	if ($_FILES["mypicture"]["error"] > 0){
		echo "Error: " . $_FILES["mypicture"]["error"] . "<br />";
	}else{
	    $picturename = $_FILES["mypicture"]["name"];
		$filename = $_FILES["mypicture"]["name"];
		$filetype = $_FILES["mypicture"]["type"];
        $userid = $_SESSION['id'];
        $postid = rand();
       
		
		$uploaddir = "images/";
		
		/*
		 * Check if the filename is the same as a file already in the folder.  The need for this can be somewhat minimised by 
		 * using per user directories for the uploaded files, but should still be checked
		 */
		$i = 0;
		$renamed = false;
		while(file_exists($uploaddir . $filename)){
			$filenamearray = explode(".", $filename);
			$filename = "";
			//return the filename without the file extension
			for($i=0;$i<count($filenamearray)-1;$i++){
				$filename .= $filenamearray[$i].".";
			}
			//append a .1 to the filename before adding the extension back on
			$filename .= date("Y-m-d-H-i-s").".";
			$filename .= end($filenamearray);
			$renamed = true;
		}
		
		//move the file to the images folder
		move_uploaded_file($_FILES["mypicture"]["tmp_name"], $uploaddir . $filename);
		
		if($renamed){
			echo "File already exists.  Renaming uploaded file to $filename<br>";
		}
		
       
		$statement = "INSERT INTO userpost(postid, userid, imageName, imagePath) VALUES(?, ?, ?, ?)";
		if ($stmt = mysqli_prepare($conn, $statement)) {
			mysqli_stmt_bind_param($stmt, "iiss", $postid,$userid,$picturename, $filename);

			/* execute query */
			mysqli_stmt_execute($stmt);
			
			mysqli_stmt_close($stmt);
			
            header("Location:index.php");
			echo "File uploaded";
		}else{
			echo "MySQL Error: ".mysqli_error($conn)."\n<br />";
		}
	}
	
}else{
	echo "File is too large<br>";
}





?>