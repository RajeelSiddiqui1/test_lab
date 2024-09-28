<?php
session_start();
include 'conn.php'; // Include your database connection

// Check if token is present in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate the token and check if it is expired
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Token is valid, show the reset password form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_password = $_POST['new_password'];

            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the user's password and clear the reset token
            $update_stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
            $update_stmt->bind_param("ss", $hashed_password, $token);
            $update_stmt->execute();

            echo 'Password has been successfully reset. You can now <a href="login.php">log in</a>';
        }
    } else {
        echo 'Invalid or expired token.';
    }
} else {
    echo 'No token provided.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="post" action="">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
