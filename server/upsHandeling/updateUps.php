<?php
//updates any ups with given ups name

require('../includes/database.php');

$upsname = $_POST['upsname'];
$serial = $_POST['serial'];
$lastdc = $_POST['lastdc'];
$currpower = $_POST['currpower'];
$battime = $_POST['battime'];
$lastUpdate = $_POST['lastupdate'];
$batterymfr = $_POST['batterymfr'];
$status = $_POST['status'];

$sql = "UPDATE upses SET Lastdc='$lastdc', battime='$battime', currpower='$currpower', lastupdate='$lastUpdate', serial='$serial', battmfr='$batterymfr', status='$status' WHERE upsname='$upsname'" ;
//$sql = "INSERT INTO upses (upsname, serial, Lastdc, battime, currpower) VALUES ('testups', '716182725181', '2018-07-11 10:28:02', '2018-07-11 10:28:02', '55')";

if ($conn->query($sql) === TRUE) {
    echo "UPDATE successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
