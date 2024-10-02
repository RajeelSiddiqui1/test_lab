<?php
include("conn.php");

if(isset($_SESSION['email'])){
    header("location:index.php");
    exit();
}

if(isset($_POST["login"])){
    $em = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM `admin` WHERE `email` = '$em' AND `password` = '$pass'";

    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["image"] = $row["image"];

        echo "<script>
        alert('Login Successful!');
        window.location.href = 'index.php'; 
    </script>";
}
 else {
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
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }

        .login-box {
            margin-top: 100px;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-heading {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            border-radius: 6px;
        }

        .login-btn {
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            padding: 10px;
            width: 100%;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-box">
                    <h3 class="login-heading">Admin Login</h3>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn login-btn" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
