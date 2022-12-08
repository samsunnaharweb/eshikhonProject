<?php

$server    ="localhost";
$userName   ="root";
$password   ="";
$database   ="project";

$conn =new mysqli($server, $userName, $password, $database);

if($conn->connect_error){
    die("Unsuccessful connect". $conn->connect_error);
}

