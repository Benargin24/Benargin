<?php
require("connection.php");
$name=$_REQUEST["guidename"];
$age=$_REQUEST["age"];
$address=$_REQUEST["address"];
$phone=$_REQUEST["phonenumber"];
$email=$_REQUEST["email"];
$gender=$_REQUEST["radio"];
$file=$_FILES["image"]["name"];
$id=$_REQUEST["id"];
if(empty($_FILES["image"]["name"]))
{
    $res=$con->query("UPDATE  `tb_insert` SET `Guide_Name`='$name' ,`Age`='$age', `Address`='$address' , `Phone_Number`='$phone' ,`Email`='$email',`Gender`='$gender' WHERE `id`='$id'");
    $count=mysqli_affected_rows($con);
}
else
{
    $file=$_FILES["image"]["name"];
    $res=$con->query("UPDATE  `tb_insert` SET `Guide_Name`='$name' ,`Age`='$age', `Address`='$address' , `Phone_Number`='$phone' ,`Email`='$email',`Gender`='$gender',`Image`='$file' WHERE `id`='$id'");
    move_uploaded_file($_FILES["pic"]["tmp_name"],"images/".$file);

}
header("location:dashboard.php");
?>