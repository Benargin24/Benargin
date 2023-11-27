<?php
require("connection.php");
$id=$_REQUEST["del"];
$res=$con->query("SELECT*FROM `tb_insert` WHERE id='$id'");
$count=$res->num_rows;
if($count>0)
$row=$res->fetch_assoc();
$upload=$row["Image"];
unlink("images/$upload");
$res=$con->query("DELETE FROM `tb_insert` WHERE id='$id'");
$count=mysqli_affected_rows($con);
if($count>0)
{
    header("location:dashboard.php"); 
}
else
{
header("location:dashboard.php");
}
?>
