<?php
include("conn.php");

$email = $_POST['email'];

$token = bin2hex(random_bytes(16));
$token_hash = hash('sha256', $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// $mysqli = require __DIR__ . "/conn.php";

$sql = "UPDATE users SET reset_token=?, token_expiry=? WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($conn->affected_rows > 0) {

    $mail = require __DIR__ . "/mailer.php";
    
    $mail->setFrom("srselectricallab@gmail.com");

    $mail->addAddress($email);

    $mail->Subject = "Password Reset";

    
    $mail->Body = <<<END
        Click <a href="http://localhost/test_lab/website/reset_password.php?token=$token">here</a> to reset your password.
    END;

    try {
        // Correct this line to use $mail->send() instead of $email->send()
        $mail->send();
        echo "Message sent. Please check your inbox.";
    } catch (Exception $e) {
        echo "Message couldn't be sent. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "No user found with that email.";
}
