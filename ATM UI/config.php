<?php 
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="t_atmdb"; // Database name
// Connect to server and select database.
$db=mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
?>