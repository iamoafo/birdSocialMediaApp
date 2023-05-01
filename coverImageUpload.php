<?php 


if ($_FILES["coverpicture"]["size"] < 20000000){
	if ($_FILES["coverpicture"]["error"] > 0){
		echo "Error: " . $_FILES["coverpicture"]["error"] . "<br />";
		echo "<script> alert('No image selected')</script>";
		echo '<script> window.location.replace("editProfile.php")</script>';
		
	}else{
	    $picturename = $_FILES["coverpicture"]["name"];
		$filename = $_FILES["coverpicture"]["name"];
		$filetype = $_FILES["coverpicture"]["type"];
        $id = $_SESSION['id'];
		
		$uploaddir = "uploads/";
		
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
		move_uploaded_file($_FILES["coverpicture"]["tmp_name"], $uploaddir . $filename);
		
		if($renamed){
			echo "File already exists.  Renaming uploaded file to $filename<br>";
		}
        
		$sql = "update login set cover_image = '$filename' where userid = '$id'";

        if ($conn->query($sql) === TRUE) {
        header("Location:homepage.php");
        echo "Image updated successfully";
		}else{
			echo "MySQL Error: ".mysqli_error($conn)."\n<br />";
		}
	}
	
}else{
	echo "File is too large<br>";
}



?>