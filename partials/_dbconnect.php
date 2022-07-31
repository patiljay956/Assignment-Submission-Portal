<?php
$Server = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($Server ,$username,$password,$database);
if(!$conn){
    die("Error unable to connect with database". mysqli_connect_error());
}

?>