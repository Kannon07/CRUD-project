<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_bagusteknik";

$conn = mysqli_connect($host,$user,$pass,$db);
if (!$conn){
    die("Error connecting to database");
}

?>