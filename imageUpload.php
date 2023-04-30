<?php
include_once("connection.php");
//$picturename = $_POST['picturename'];

if ($_FILES["mypicture"]["size"] < 20000000){
	if ($_FILES["mypicture"]["error"] > 0){
		echo "Error: " . $_FILES["mypicture"]["error"] . "<br />";
	}else{
	    $picturename = $_FILES["mypicture"]["name"];
		$filename = $_FILES["mypicture"]["name"];
		$filetype = $_FILES["mypicture"]["type"];
		
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
		
		$statement = "INSERT INTO userpost(imageName, imagePath) VALUES(?, ?)";
		if ($stmt = mysqli_prepare($conn, $statement)) {
			mysqli_stmt_bind_param($stmt, "ss", $picturename, $filename);

			/* execute query */
			mysqli_stmt_execute($stmt);
			
			mysqli_stmt_close($stmt);
			
            echo '<script> window.location.replace("homepage.php")</script>';
			echo "File uploaded";
		}else{
			echo "MySQL Error: ".mysqli_error($conn)."\n<br />";
		}
	}
	
}else{
	echo "File is too large<br>";
}


?>
