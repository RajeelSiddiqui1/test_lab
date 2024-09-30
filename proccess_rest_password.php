<?php
include("conn.php");

$token = $_POST["token"];
$token_hash = hash("sha256", $token);

// Check if the token exists
$sql = "SELECT * FROM users WHERE reset_token = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found");
}

// Check if the token has expired
if (strtotime($user["token_expiry"]) <= time()) {
    die("Token has expired");
}

// Validate password length
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

// Check for at least one letter
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

// Check for at least one number
if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

// Check if passwords match
if ($_POST["password"] !== $_POST["cpassword"]) {
    die("Passwords must match");
}

// Hash the new password
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Update password and reset the token
$sql = "UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $password, $user["id"]); 
$stmt->execute();

echo "Password updated. You can now log in.";
