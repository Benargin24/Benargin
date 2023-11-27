<?php
require("connection.php");
$name=$_REQUEST["guidename"];
$age=$_REQUEST["age"];
$address=$_REQUEST["address"];
$phone=$_REQUEST["phonenumber"];
$email=$_REQUEST["email"];
$gender=$_REQUEST["radio"];
$file=$_FILES["image"] ["name"];
$res=$con->query("INSERT INTO `tb_insert`(`Guide_Name`,`Age`,`Address`,`Phone_Number`,`Email`,`Gender`,`Image`)VALUES('$name','$age','$address','$phone','$email','$gender','$file')");
$count=mysqli_affected_rows($con);
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$file);
header("location:dashboard.php");
?>