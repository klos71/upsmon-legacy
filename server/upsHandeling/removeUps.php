<?php
//REMOVE UPS WITH SERIAL BE CAREFULL!

require("./../includes/database.php");

$upsname = $_POST["upsname"];
$serial = $_POST["serial"];

$sql = "DELETE FROM upses WHERE serial='$serial'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>