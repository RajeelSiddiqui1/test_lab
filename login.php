<?php
include("conn.php");
session_start();

if(isset($_SESSION["email"])){
    header("location:index.php");
    exit();
}


if(isset($_POST["login"])){

$em = $_POST['email'];
$pass = $_POST['password'];

$query = "SELECT *FROM `users` WHERE `email`='$em'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
if(password_verify($pass, $row["password"])){
// session_start();
$_SESSION["id"] = $row["id"];
$_SESSION["email"] = $row["email"];
$_SESSION["password"] = $row["password"];


echo "<script>
    alert('Login Successful!');
    window.location.href = 'index.php'; 
</script>";
}
else{
    echo "<script>
    alert('Error: Invalid email or password. Please try again.');
</script>";
}
}
else{
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
    <title>Login - Modern UI</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            /* max-width: 500px; */
            width: 100%;
            text-align: center;
        }
        h2 {
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }
        .form-control {
            border-radius: 30px;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        .form-control:focus {
            border-color: #33CC33;
            box-shadow: 0 0 5px rgba(51, 204, 51, 0.4);
        }
        .btn-login {
            background-color: #33CC33;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            border: none;
            width: 100%;
            transition: background-color 0.3s;
        }
        .btn-login:hover {
            background-color: #28a745;
        }
        .social-buttons a {
            margin: 0 10px;
            color: #333;
            transition: color 0.3s;
        }
        .social-buttons a:hover {
            color: #33CC33;
        }
        .forgot-password {
            color: #33CC33;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .text-decoration-none {
            color: #33CC33;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <h2>Login</h2>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember Me
                                </label>
                            </div>
                            <a href="send_password_reset.php" class="forgot-password">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-login" name="login">Login</button>
                    </form>
                    <div class="social-buttons mt-4">
                        <a href="#"><i class="fab fa-google fa-2x"></i></a>
                        <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                    </div>
                    <p class="mt-4">Don't have an account? <a href="signup.php" class="text-decoration-none">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
