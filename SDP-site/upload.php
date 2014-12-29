<?php

// Directory where uploaded images are saved
$dirname = "/home/wwwroot/svn/SDP-site/uploads";

// If uploading file
if ($_FILES) {
    // Save valid mime types
    $valid_mime_types = array(
        "image/gif",
        "image/png",
        "image/jpg",
        "image/jpeg",
        "image/pjpeg",
    );

    // Check that the uploaded file is actually an image
    // and move it to the right folder if is.
    if (in_array($_FILES["file"]["type"], $valid_mime_types)) {
        // Return debug info
        // print_r($_FILES);
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = $_FILES["file"]["name"];
        $p = pathinfo($name);
        $newName = time() . "." . $p['extension'];
        move_uploaded_file($tmp_name, "$dirname/$newName");
        // Return file name 
        echo $newName;
    }

}

// If retrieving an image
else if (isset($_GET['image'])) {
    $file = $dirname."/".$_GET['image'];

    // Specify as jpeg
    header('Content-type: image/jpeg');
  
    // Resize image for mobile
    list($width, $height) = getimagesize($file); 
    $newWidth = 120.0; 
    $size = $newWidth / $width;
    $newHeight = $height * $size; 
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight); 
    $image = imagecreatefromjpeg($file); 
    imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height); 
    imagejpeg($resizedImage, null, 80); 
}

// If displaying images
else {
    $baseURI = "http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    $images = scandir($dirname);
    $ignore = Array(".", "..");
    if ($images) {
        foreach($images as $curimg){ 
            if (!in_array($curimg, $ignore)) {
                echo "Image: ".$curimg."<br>";
                echo "<img src='".$baseURI."?image=".$curimg."&rnd=".uniqid()."'><br>"; 
            }
        }
    }
    else {
        echo "No images on server";
    }
}
?>
