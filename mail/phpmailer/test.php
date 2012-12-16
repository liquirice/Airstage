<?php
include("class.phpmailer.php");
include("class.smtp.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "ssl://smtp.gmail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "liquirice@gmail.com"; // your SMTP username or your gmail username
$mail->Password = "123456789bo"; // your SMTP password or your gmail password
$from = "liquirice@gmail.com"; // Reply to this email
$to="liquirice@gmail.com"; // Recipients email ID
$name="Jersey Name"; // Recipient's name
$mail->From = $from;
$mail->FromName = "Webmaster"; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($to,$name);
$mail->AddReplyTo($from,"Webmaster");
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Sending Email From Php Using Gmail";
$mail->Body = "This Email Send through phpmailer, This is the HTML BODY "; //HTML Body
$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent";
}
?>
