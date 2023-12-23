<?php
  use PHPMailer\PHPMailer\PHPMailer; 
  use PHPMailer\PHPMailer\SMTP; 
  use PHPMailer\PHPMailer\Exception; 

  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{
  
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'xxxxxxxxxxxxxxxxxxxxx@gmail.com';       // SMTP username 
$mail->Password = 'xxxxxxxxxxxxx';         // SMTP password 
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 
 
// Sender info 
$mail->setFrom('xxxxxxxxxx@gmail.com', 'SenderName',0); 
$mail->addReplyTo('xxxxxxxxxx@gmail.com', 'SenderName'); 
 
// Add a recipient 
$mail->addAddress($recipient); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = $subject; 
 
// Mail body content 
$mail->Body    = $message; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    return true;
} else { 
    echo 'Message has been sent.'; 
    return false;
}
}

?>