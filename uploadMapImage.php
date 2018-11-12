<?php
$target_dir = "img/maps/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileExists = 0;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    $fileExists = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 15000000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo json_encode(array("type" => "error", "message" => "Sorry, there was an error uploading your file."));
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	if ($fileExists == 1) {
    		echo json_encode(array("type" => "success", "info" => "Filename already exists. Using existing resource", "file" => basename( $_FILES["fileToUpload"]["name"])));
    	} else {
    		echo json_encode(array("type" => "success", "file" => basename( $_FILES["fileToUpload"]["name"])));
    	}
    } else {
        echo 'Nope.';
    }
}
?>