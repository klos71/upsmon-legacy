<?php
//adds a new ups with some defualt values later to be updated

require("./../includes/database.php");

$upsname = $_POST["upsname"];
//$serial = $_POST["serial"];
$ip = $_POST["ipadress"];

$sql = "SELECT upsname,ip FROM upses WHERE ip ='$ip'";

$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "UPS0";
    if(isset($_POST['upsname'])){
        if(isset($_POST['ipadress'])){
            $sql = "INSERT INTO upses (upsname, serial, Lastdc, battime, currpower, ip,lastupdate,battmfr,status, upsnumber) VALUES ('$upsname', '0', '2018-07-11 10:28:00', '0', '0', '$ip', '2018-07-11 10:28:00', '2018-07-11', '0', '1')";
            //$sql = "INSERT INTO upses (upsname, serial, Lastdc, battime, currpower) VALUES ('testups', '716182725181', '2018-07-11 10:28:02', '2018-07-11 10:28:02', '55')";
    
            if($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "No ip adress";
        }
    }else{
        echo "No name";
    }
}elseif($result->num_rows == 1){
    echo "UPS1";
    if(isset($_POST['upsname'])){
        if(isset($_POST['ipadress'])){
            $sql = "INSERT INTO upses (upsname, serial, Lastdc, battime, currpower, ip,lastupdate,battmfr,status, upsnumber) VALUES ('$upsname', '0', '2018-07-11 10:28:00', '0', '0', '$ip', '2018-07-11 10:28:00', '2018-07-11', '0', '2')";
            //$sql = "INSERT INTO upses (upsname, serial, Lastdc, battime, currpower) VALUES ('testups', '716182725181', '2018-07-11 10:28:02', '2018-07-11 10:28:02', '55')";
    
            if($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "No ip adress";
        }
    }else{
        echo "No name";
    }
}elseif($result->num_rows == 2){
    echo "UPS2";
    if(isset($_POST['upsname'])){
        if(isset($_POST['ipadress'])){
            $sql = "INSERT INTO upses (upsname, serial, Lastdc, battime, currpower, ip,lastupdate,battmfr,status, upsnumber) VALUES ('$upsname', '0', '2018-07-11 10:28:00', '0', '0', '$ip', '2018-07-11 10:28:00', '2018-07-11', '0', '3')";
            //$sql = "INSERT INTO upses (upsname, serial, Lastdc, battime, currpower) VALUES ('testups', '716182725181', '2018-07-11 10:28:02', '2018-07-11 10:28:02', '55')";
    
            if($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "No ip adress";
        }
    }else{
        echo "No name";
    }
}



$conn->close();
header("location:./../../page/addUps.php")
?>