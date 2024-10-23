<?php

$host = "localhost";
$db_name = "crud_project";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
    exit;
}
