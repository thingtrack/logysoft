<?php

require './PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer(true);

$mail->IsSMTP();                       // telling the class to use SMTP                 IsSMTP();   

$mail->SMTPDebug = 2;
// 0 = no output, 1 = errors and messages, 2 = messages only.

$mail->SMTPAuth = true;                // enable SMTP authentication
$mail->SMTPSecure = "ssl";              // sets the prefix to the servier
$mail->Host = "ssl0.ovh.net";        // sets Gmail as the SMTP server       ssl0.ovh.net
$mail->Port = 465;                     // set the SMTP port for the MAIL

$mail->Username = "no-reply%logysoft.fr";  // mail username
$mail->Password = "thingtrack";      // mail password

$mail->SetFrom ('no-reply@logysoft.fr', 'Logysoft - Demande de contact');
$mail->Subject = 'Logysoft - Demande de contact';
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';

$timestamp = date("F jS Y, h:iA.", time());

	$name = $_POST['nom'];
	$email = $_POST['email'];
	$message = $_POST['message'];



$body = "
	<br>
	<p><strong>Nom</strong>: $name</p>
	<p><strong>Email</strong>: $email</p>
	<p><strong>Message</strong>: $message</p>
	<hr/>
	<p>Demande réalisée à la date <strong>$timestamp</strong></p>
	";

$mail->Body = $body;

$mail->AddAddress ('no-reply@logysoft.fr', 'Info Logysoft');
// you may also use this format $mail->AddAddress ($recipient);

if(!$mail->Send())
{
       echo "Mailer Error: " . $mail->ErrorInfo;
} else
{
        echo "$success";
}

// You may delete or alter these last lines reporting error messages, but beware, that if you delete the $mail->Send() part, the e-mail will not be sent, because that is the part of this code, that actually sends the e-mail.

?>
