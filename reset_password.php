<?php
include("conn.php");

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$query = "SELECT *FROM users WHERE reset_token=?";

$stmt = $conn->prepare($query);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if($user == null) {
    die("token not found");
}

if(strtotime($user["token_expiry"]) <= time()){
    die("token has been expired");
}

echo"token is valid and hasn't expired";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Themed Password Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #1b1b1b;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .password-form {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.25);
        }

        .password-form h3 {
            margin-bottom: 30px;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            color: #ff69b4;
        }

        .form-control {
            background-color: #3a3a3a;
            color: #ffffff;
            border: 1px solid #444;
        }

        .form-control:focus {
            background-color: #444;
            border-color: #ff69b4;
            color: #ffffff;
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #ff69b4;
        }

        .btn-custom {
            background-color: #ff69b4;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #ff3399;
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: -10px;
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="password-form">
                <h3>Create Your Account</h3>
                <form id="signupForm" method="post" action="proccess_rest_password.php">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token)?>">
                    <div class="mb-4 form-floating position-relative">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                        <label for="password">Password</label>
                        <i class="fas fa-eye eye-icon" id="togglePassword"></i>
                        <div id="passwordHelp" class="error"></div>
                    </div>

                    <div class="mb-4 form-floating position-relative">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" name="cpassword" required>
                        <label for="confirmPassword">Confirm Password</label>
                        <i class="fas fa-eye eye-icon" id="toggleConfirmPassword"></i>
                        <div id="confirmPasswordHelp" class="error"></div>
                    </div>
                    <button  class="btn btn-custom w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (for validation and script control) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Show/Hide Password Functionality
        $('#togglePassword').on('click', function () {
            const passwordField = $('#password');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        $('#toggleConfirmPassword').on('click', function () {
            const confirmPasswordField = $('#confirmPassword');
            const type = confirmPasswordField.attr('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.attr('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        // Form validation
        

            
           
        });
    
</script>

</body>
</html>
