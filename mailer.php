<?php
// Load PHPMailer classes
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

// Autoload dependencies (if you're using Composer)
require __DIR__ . "/vendor/autoload.php";

// Add the required namespaces
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "srselectricallab@gmail.com";
$mail->Password = "your-app-specific-password"; // Replace with app-specific password
$mail->isHTML(true);

return $mail;

