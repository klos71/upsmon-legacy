<?php
//sends varius forms of POST requests to API server

$upsname = $_POST["upsname"];
$method = $_POST["method"];
$serial = $_POST["serial"];
$ip = $_POST["ip"];
$upsnumber = $_POST["upsnumber"];

$url = "";
$data = array('method' => $method, 'upsname' => $upsname, 'serial' => $serial, 'ip' => $ip, 'upsnumber' => $upsnumber);

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
?>
