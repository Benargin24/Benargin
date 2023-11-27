<?php
session_start();
require("connection.php");
$u=$_REQUEST["Email"];
$pass=$_REQUEST["Password"];
$res=$con->query("select * from `tb_login` where `Email`='$u' AND `Password`='$pass'");
$count=$res->num_rows;
if($count>0)
{
    $_SESSION["un"]=$u;
    header("location:dashboard.php");
}
else
{
    echo
    "<script>
    alert('invalid password');
    document.location.href = 'index.php';
    </script>
    ";
}

?>