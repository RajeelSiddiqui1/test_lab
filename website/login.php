<?php
include("conn.php");
session_start();

if(isset($_SESSION["email"])){
    header("location:home.php");
    exit();
}

if(isset($_POST["login"])){

    $em = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE `email`='$em'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        if(password_verify($pass, $row["password"])){
            $_SESSION["id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            echo "<script>
                alert('Login Successful!');
                window.location.href = 'home.php'; 
            </script>";
        } else {
            echo "<script>
                alert('Error: Invalid email or password. Please try again.');
            </script>";
        }
    } else {
        echo "<script>
            alert('Error: Invalid email or password. Please try again.');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dark Theme UI</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('./path_to_your_background_image.jpg');
            background-size: cover;
            background-position: center;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            backdrop-filter: blur(5px);
        }
        .login-container {
            background-color: rgba(40, 40, 40, 0.8);
            border-radius: 15px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        h2 {
            color: #fff;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 25px;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        .form-control:focus {
            border-color: #ff69b4;
            box-shadow: 0 0 10px rgba(106, 13, 173, 0.7);
        }
        .btn-login {
            background-color: #ff69b4;
            border: none;
            color: #fff;
            padding: 12px;
            border-radius: 25px;
            font-weight: 600;
            width: 100%;
            transition: background-color 0.3s;
        }
        .btn-login:hover {
            background-color: #ff69b4;
        }
        .social-buttons a {
            margin: 0 10px;
            color: #ff69b4;
            font-size: 20px;
            transition: color 0.3s;
        }
        .social-buttons a:hover {
            color: #ff69b4;
        }
        .forgot-password {
            color: #ff69b4;
            text-decoration: none;
        }
        .forgot-password:hover {
            color: #ff69b4;
        }
        .text-decoration-none {
            color: #ff69b4;
        }
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 1));
            z-index: -1;
        }
        .password-wrapper {
            position: relative;
        }
        .password-wrapper .toggle-password {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #ff69b4;
        }
    </style>
</head>
<body>
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="mb-3 password-wrapper">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" required>
                                <label class="form-check-label" for="rememberMe">
                                    Remember Me
                                </label>
                            </div>
                            <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-login" name="login">Login</button>
                    </form>
                    <div class="social-buttons mt-4">
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                    <p class="mt-4">Don't have an account? <a href="signup.php" class="text-decoration-none">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS for Password Toggler -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
