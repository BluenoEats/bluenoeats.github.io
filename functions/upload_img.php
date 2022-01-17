<?php
function upload_img($target_dir, $file_info) {
  // $target_dir = "/Applications/XAMPP/xamppfiles/htdocs/websites/bluenoeats.github.io/upload/";
  $target_file = $target_dir.basename($file_info["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($file_info["tmp_name"]);
    if($check !== false) {
      // echo "File is an image - " .$check["mime"] . ".";
      $uploadOk = 1;
    } else {
      // echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($file_info["size"] > 500000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    return 0;
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($file_info["tmp_name"], $target_file)) {
      // echo "The file ".htmlspecialchars( basename($file_info["name"]))." has been uploaded.";
      return 1;
    } else {
      // echo "Sorry, there was an error uploading your file.";
      return 0;
    }
  }

  // echo $file_info["tmp_name"].'    ';
  // echo $target_file;
}
?>
