<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "job";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    die("Erorr: Couden't connect to the database.");
}

?>