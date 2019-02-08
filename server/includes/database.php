<?php
$servername = "";
$username = "";
$password = "";
$dbname = "UPSMON";
$tableName = "upses";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
