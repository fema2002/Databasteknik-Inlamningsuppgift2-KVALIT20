<?php
$servername= "localhost";
$username = "root";
$database = "webshop";
$password = "root";
$dbDSN = "mysql:host=$servername;dbname=$database;charset=UTF8";

try{
$conn = new PDO($dbDSN,$username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";


}catch(PDOException $e){
    echo "Connection failed" . $e->getMessage();
}