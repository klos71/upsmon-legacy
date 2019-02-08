<?php
require("../includes/database.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$sql = "SELECT upsname, status, serial, Lastdc, battime, currpower, ip, battmfr, lastupdate, status, upsnumber, mailFlag FROM upses";
$result = $conn->query($sql);
$message = "";
$errorMsg = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["status"] == "OB"){
            if($row["mailFlag"] == 0){
		        echo "TEST";
                $errorMsg++;
		        echo $errorMsg;
                $message = $message . "<br>UPS: " . $row["upsname"] . " Is on status: " . $row["status"] . ". Batteryprecent: " . $row["currpower"] . " BatteryTime: " . $row["battime"];    
                //setMailFlag($row["serial"], 1);
                $serial = $row["serial"];
                $sql2 = "UPDATE upses SET mailFlag = 1 WHERE serial='$serial'";
                $result2 = $conn->query($sql2);
            }
        }elseif($row["status"] == "ALARM"){
            if($row["mailFlag"] == 0){
                $errorMsg++;
                $message = $message . "<br>UPS: " . $row["upsname"] . "Is on status: " . $row["status"] . ". Batteryprecent: " . $row["currpower"] . " BatteryTime: " . $row["battime"];
                $serial = $row["serial"];
                $sql2 = "UPDATE upses SET mailFlag = 1 WHERE serial='$serial'";
                $result2 = $conn->query($sql2);
            }
        }elseif($row["status"] == "OL" && $row["mailFlag"] == 1){
            //setMailFlag($row["serial"],0);
            $serial = $row["serial"];
            $sql2 = "UPDATE upses SET mailFlag = 0 WHERE serial='$serial'";
            $result2 = $conn->query($sql2);
        }
    }
    if($errorMsg > 0){
        sendMail($row["status"],$message);
    }else{
	echo "all upses are online";
}
}else{
    echo "0 results";
}

//$conn->close();

/*function setMailFlag($serial,$flag){
    $sql = "UPDATE upses SET mailFlag='$flag' WHERE serial='$serial";
    $result = $conn->query($sql);
    echo $conn->error;
}*/

$conn->close();

function sendMail($status,$message){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = '';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '';                 // SMTP username
        $mail->Password = '';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('', '');
        $mail->addAddress('', '');     // Add a recipient
    
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "UPSMON: Upses are on status: " . $status;
        $mail->Body    = $message;
        $mail->AltBody = $message;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}



?>
