<?php

$serverName = "localhost";
$dbUsername = "admin";
$dbPassword = "admin";
$dbName = "withu";

$conn = mysqli_connect($serverName,  $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die ("Connection failed".mysqli_connect_error());
}

