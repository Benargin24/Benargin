<?php
require("connection.php");
$u=$_REQUEST["Email"];
$pass=$_REQUEST["Password"];
$res=$_con->query("select*")