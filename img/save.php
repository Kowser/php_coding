<?php
	$directory = "store/";
	$error = false;
	$error_message = "";
	echo 'Just some image information for our viewers.';
	var_dump($_FILES["image_upload"]); // this lets us see the file is stored as an array

	$file = $directory . basename($_FILES["image_upload"]["name"]);

	// verify that the uploaded file is an image (imagesize verifies this)
	$size = getimagesize($_FILES["image_upload"]["tmp_name"]);

	if(!$size) {
		$error = true;
		$error_message = "File is not a recognized image type.";
	}
	// rename file to contain unique timestamp
	$file = $directory . time() . "_" . basename($_FILES["image_upload"]["name"]);

	// check that the uploaded image is less than 500kb
	if($_FILES["image_upload"]["size"] > 512000) {
		$error = true;
		$error_message = "File is greater than 500kb.";
	}

	if($_FILES["image_upload"]["type"] !== "image/jpeg" && $_FILES["image_upload"]["type"] !== "image/png") {
		$error = true;
		$error_message = "Image must be of type JPEG or PNG.";
	}

	if($error) {
		echo $error_message;
	} else {
		if(move_uploaded_file($_FILES["image_upload"]["tmp_name"], $file)) {
			echo "File uploaded successfully. <a href='$file'>View Here</a>";
		} else {
			echo "Undetermined server error when uploading.";
		}
	}
?>
