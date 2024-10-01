<?php
include("conn.php");

if(isset($_POST["login"])){

  $em = $_POST['email'];
  $pass = $_POST['password'];

  $query = "SELECT * FROM `admin` WHERE `email`='$em' AND `password` ='$pass'";
  $result = mysqli_query($conn, $query);
  
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    
    session_start();
    $_SESSION["id"] = $row["id"];
    $_SESSION["email"] = $row["email"];

    echo "<script>
    alert('Login Successful!');
    window.location.href = 'index.php'; 
</script>";
} 

}
 else {
echo "<script>
alert('Error: Invalid email or password. Please try again.');
</script>";
}
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="container my-5">
    <div class="row text-center">
        <h2 class="fw-bold" style="color: #333;">Admin Login</h2>
    </div>
    <div class="row my-3 justify-content-center">
        <div class="col-md-4 p-4" style="background-color: #f9f9f9; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 10px;">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required style="border-radius: 5px;">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required style="border-radius: 5px;">
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit" name="login" style="border-radius: 5px; background-color: #007BFF; border: none; font-weight: bold;" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>