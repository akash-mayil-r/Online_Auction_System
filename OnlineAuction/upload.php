<?php
$con=new mysqli("localhost","root","student","auction");
if($con->connect_error){
    echo "$con->connect_error";
    die ("Database not connected");
}

if(isset($_POST["submit"])) {
  if(getimagesize($_FILES["image"]["tmp_name"]) == false){
    echo "Please select image";
  }
  else {
    $image=$_FILES["image"]["tmp_name"];
    $name=$_FILES["image"]["name"];
    $image=file_get_contents($image);
    $image=base64_encode($image);
    $sql="INSERT INTO product (image, name) VALUES ('$image','$name')";
    if($con->query($sql)){
    echo "image uploaded successfully.";
    } 
    else {
    echo "Sorry, there was an error uploading your image.";
    }
  }
}
?>  