<?php
//echo "plz";
require('../includes/database.php');

//echo "AUTO UPDATER";

$sql = "SELECT upsname ,ip, upsnumber FROM upses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       sendUpdate($row['upsname'],$row['ip'],$row['upsnumber']);
       echo "updated" + $row['upsname'];
    }
} else {
    echo "0 results";
}

$conn->close();


function sendUpdate($upsname, $ip, $upsnumber){

    $url = "http://192.168.120.35";
    $data = array('method' => "update", 'upsname' => $upsname, 'ip' => $ip,'upsnumber' => $upsnumber);
    
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    
    var_dump($result);
}
?>
