<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'loginsystem';

//$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);


try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
}