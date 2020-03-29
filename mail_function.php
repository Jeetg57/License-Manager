<?php
 function sendOTP($email, $otp)
 {
     require('vendor\phpmailer\phpmailer\src\PHPMailer.php');
     require('vendor\phpmailer\phpmailer\src\SMTP.php');
     require('vendor\phpmailer\phpmailer\src\Exception.php');
 
     $message_body = "One Time Password for PHP login authentication is:<br/><br/>" . $otp;
     $mail = new PHPMailer\PHPMailer\PHPMailer(true);
     $mail->IsSMTP();
     $mail->SMTPDebug = 0;
     $mail->SMTPAuth = true;
     $mail->SMTPSecure = 'tls'; // tls or ssl
     $mail->Port     = "587";
     $mail->Username = "jeetg57@gmail.com";
     $mail->Password = "nHMDhLcPKTBpEzab";
     $mail->Host     = "smtp-relay.sendinblue.com";
     $mail->Mailer   = "smtp";
     $mail->SetFrom("jeetg57@gmail.com", "License Manager");
     $mail->AddAddress($email);
     $mail->Subject = "OTP to Login";
     $mail->MsgHTML($message_body);
     $mail->IsHTML(true);
     $result = $mail->Send();
     return $result;
 }