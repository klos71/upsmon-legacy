<?php
//returns the amount of rows in ups database

require('database/database.php');

$upsAmount = 0;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT upsname, serial, Lastdc, battime, currpower FROM upses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $upsAmount++;
    }
} else {
    echo "0 results";
}
echo $upsAmount;
$conn->close();

?>