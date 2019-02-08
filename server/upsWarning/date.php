<?php
require("../includes/database.php");

$sql = "SELECT upsname,serial,ip lastupdate FROM upses";
$result = $conn->query($sql);
$message = "";
$errorMSG = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	$str = $row["lastupdate"];
        echo strtotime($str) . "<br>";
	if(time() > strtotime($str) + 1140){
		$errorMSG++;
		$message = $message . $row["upsname"] . " with serial: " . $row["serial"]. " has no connection on IP: ". $row["ip"];
	}
	echo time() . "<br>";
	}
	if($errorMSG > 0){
		sendMail($message);
	}

}

function sendMail($message){
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
        $mail->Subject = "UPSMON: CONNECTION ERROR";
        $mail->Body    = $message;
        $mail->AltBody = $message;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

?>
