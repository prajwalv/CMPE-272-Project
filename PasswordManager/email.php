<?php

include "class.phpmailer.php";
include "class.smtp.php";
function send_email($email,$message,$subject)
{
$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "box2010.bluehost.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "donotreply_passwordmanager@prajwalvenkatesh.com";                 
$mail->Password = "Praj_Oct@1993";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "donotreply_passwordmanager@prajwalvenkatesh.com";
$mail->FromName = "Admin@Passwordmanager";

$mail->addAddress($email, "Recepient Name");
$mail->isHTML(true);

$mail->Subject = $subject;

$mail->Body = $message;


if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
}