<?php
//when called: adds a list of all upses with a update button withc uses upsname to update with javascript (check updatebutton.js)

require('database/database.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT upsname, status, serial, Lastdc, battime, currpower, ip, battmfr, lastupdate, status, upsnumber FROM upses";
$result = $conn->query($sql);
echo "<tr><th>Upsname</th><th>Status</th><th>Serial</th><th>Last Disconnect</th><th>Battime</th><th>Current Power</th><th>Controller Adress</th><th>Battery Manufatory Date</th><th>Last Update</th></tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row['status'] == "OL"){
            echo "<tr class='ups-item'><td class='ups-name'>" .  $row["upsname"]. "</td><td style='background-color: lime;'>". $row["status"]."</td><td>" . $row["serial"]. "</td><td>" . $row["Lastdc"]. "</td><td>" . $row["battime"]." Min</td><td> " . $row["currpower"]. "</td><td>" .$row["ip"]."</td><td>".$row["battmfr"]."</td><td> " .$row["lastupdate"]. "</td><td> <button class='btn btn-primary'  onclick=updateUps('".$row["upsname"]. "','" .$row["ip"]."','" .$row["upsnumber"]."')>Update</button></td>" . "</tr>";
        }else if($row['status'] == "ALARM"){
            echo "<tr class='ups-item'><td class='ups-name'>" .  $row["upsname"]. "</td><td style='background-color: red;'>". $row["status"]."</td><td>" . $row["serial"]. "</td><td>" . $row["Lastdc"]. "</td><td>" . $row["battime"]." Min</td><td> " . $row["currpower"]. "</td><td>" .$row["ip"]."</td><td>".$row["battmfr"]."</td><td> " .$row["lastupdate"]. "</td><td> <button class='btn btn-primary'  onclick=updateUps('".$row["upsname"]. "','" .$row["ip"]."','" .$row["upsnumber"]."')>Update</button></td>" . "</tr>";
        }else if($row['status'] == "OB"){
            echo "<tr class='ups-item'><td class='ups-name'>" .  $row["upsname"]. "</td><td style='background-color: orange;'>". $row["status"]."</td><td>" . $row["serial"]. "</td><td>" . $row["Lastdc"]. "</td><td>" . $row["battime"]." Min</td><td> " . $row["currpower"]. "</td><td>" .$row["ip"]."</td><td>".$row["battmfr"]."</td><td> " .$row["lastupdate"]. "</td><td> <button class='btn btn-primary'  onclick=updateUps('".$row["upsname"]. "','" .$row["ip"]."','" .$row["upsnumber"]."')>Update</button></td>" . "</tr>";
        }else{
            echo "<tr class='ups-item'><td class='ups-name'>" .  $row["upsname"]. "</td><td>". $row["status"]."</td><td>" . $row["serial"]. "</td><td>" . $row["Lastdc"]. "</td><td>" . $row["battime"]." Min</td><td> " . $row["currpower"]. "</td><td>" .$row["ip"]."</td><td>".$row["battmfr"]."</td><td> " .$row["lastupdate"]. "</td><td> <button class='btn btn-primary'  onclick=updateUps('".$row["upsname"]. "','" .$row["ip"]."','" .$row["upsnumber"]."')>Update</button></td>" . "</tr>";
        }
        
    }
} else {
    echo "0 results";
}
$conn->close();

?>