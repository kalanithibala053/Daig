<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>mailing process</title>
  </head>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
require 'PHPMailer\src\Exception.php';

$mail = new PHPMailer(true);
$mailto=$_POST['to'];
$subject=$_POST['subject'];
$message=$_POST['message'];


try {

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = "smtp.gmail.com";
    $mail->SMTPAuth   = true;
    $mail->Username   = 'kalacraz053@gmail.com';
    $mail->Password   = 'byhrlgqqqfdhmgqa';
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->setFrom('diag@gmail.com', 'DiagBot');
    $mail->addCC('20ita18@karpagamtech.ac.in');
    $mail->addAddress($mailto,$subject);
    $mail->isHTML(true);
    $mail->Subject = 'Queries on diag chat Application';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo '
    <script>
    window.alert("Message has been sent");
    window.location.assign("\index.php");
    </script>';
} catch (Exception $e) {
  echo '
  <script>
  window.alert("Message not sent");
  window.location.assign("\index.php");
  </script>';
}
