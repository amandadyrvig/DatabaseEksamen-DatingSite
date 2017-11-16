<?php

//Connect til databasen.
$host = 'localhost';
$dbName = 'SuperHeroDatingSite';
$username = 'root';
$password = 'root';

$conn = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $password);

try {
    $conn = new PDO("mysql:host=$servername;dbname=Pets", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }

?>
