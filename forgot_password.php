<!-- <?php
session_start();
include 'conn.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Generate a reset token
        $reset_token = bin2hex(random_bytes(50));
        $token_expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token valid for 1 hour

        // Update the user's reset token and expiry time in the database
        $update_stmt = $conn->prepare("UPDATE users SET reset_token = ?, token_expiry = ? WHERE email = ?");
        $update_stmt->bind_param("sss", $reset_token, $token_expiry, $email);
        $update_stmt->execute();

        // Email details
        $to = $email;
        $subject = 'Password Reset Request';
        $message = 'Click <a href="http://localhost/test_lab/reset_password.php?token=' . $reset_token . '">here</a> to reset your password. This link will expire in 1 hour.';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <your-email@gmail.com>' . "\r\n"; // Replace with your email

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo 'Reset link has been sent to your email.';
        } else {
            echo 'Email sending failed.';
        }
    } else {
        echo 'Email does not exist.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
    <form method="post" action="">
        <label for="email">Enter your email:</label>
        <input type="email" name="email" required>
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html> -->
