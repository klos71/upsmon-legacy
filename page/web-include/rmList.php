<?php
//when called: adds a list of all upses with a remove button withc uses serial to remove with javascript (check updatebutton.js)
require("database/database.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT upsname, serial, Lastdc, battime, currpower, ip, lastupdate FROM upses";
$result = $conn->query($sql);
echo "<tr><th>Upsname</th><th>Serial</th><th>Last Disconnect</th><th>Battime</th><th>Current Power</th><th>Controller Adress</th><th>Last Update</th></tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr class='ups-item'><td class='ups-name'>" .  $row["upsname"]. "</td><td>" . $row["serial"]. "</td><td>" . $row["Lastdc"]. "</td><td>" . $row["battime"]." Min</td><td> " . $row["currpower"]. "</td><td>" .$row["ip"]."</td><td> " .$row["lastupdate"]. "</td><td><button class='btn btn-danger'  onclick=removeUps('".$row["serial"]."')>Remove</button>" . "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();





?>