<?php
$con=new mysqli("localhost","root","student","auction");
if($con->connect_error){
    echo "$con->connect_error";
    die ("Database not connected");
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $pwd=$_POST['pwd'];
    $phno=$_POST['phno'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    if ($name!=""&&$pwd!=""&&$phno!=""&&$email!=""&&$address!="") {
        $sql="INSERT INTO bidder (name,pwd,phno,email,address) VALUES ('$name','$pwd',$phno,'$email','$address')";
        if ($con->query($sql)) {
        header("Location:home.html");
        }
        else{
        echo "Data not stored";
        }
    }
    else{
        echo "All fields are required";
    }
}

$name=$_POST['name'];
$pwd=$_POST['pwd'];
if(count($_POST)>0) {
    $result = mysqli_query($con,"SELECT name,pwd FROM bidder WHERE name='$name' and pwd='$pwd'");
    $count  = mysqli_num_rows($result);
    if($count==0) {
        header("Location:home.html");
    }
    else {
        header("Location:products.html");
    }
}

?>
