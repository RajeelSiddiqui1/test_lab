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
$mail->Username = "rajeelsiddiqui3@gmail.com";
$mail->Password = "xgsr ydud rmaw istu"; // Replace with app-specific password
$mail->isHTML(true);

return $mail;

