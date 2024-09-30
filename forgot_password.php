<?php
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password - Modern UI</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #121212;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff69b4;
        }
        .form-control {
            background-color: #333;
            border: 1px solid #444;
            color: #fff;
        }
        .form-control:focus {
            background-color: #444;
            border-color: #ff69b4;
            box-shadow: none;
        }
        .btn-custom {
            background-color: #ff69b4;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 10px;
            width: 100%;
            margin-top: 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #ff3399;
        }
        .form-label {
            color: #ccc;
        }
        .text-muted {
            color: #bbb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-container">
                    <h2>Forgot Password</h2>
                    <form method="post" action="send_password_request.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Enter your email</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-custom">Send Password Reset</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="login.php" class="text-light">Back to login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
