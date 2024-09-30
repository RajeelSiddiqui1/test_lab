<?php
include("conn.php");

if (isset($_POST["signup"])) {
    $na = $_POST["fullName"];
    $em = $_POST["email"];
    $department = $_POST["department"];
    $con = $_POST["contact"];
    $coun = $_POST["country"];
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];

    $hash_password = password_hash($pass, PASSWORD_DEFAULT);

    $CheckQuery = "SELECT * FROM `users` WHERE `full_name`='$na' AND `email`='$em' AND `department`='$department' AND `contact_number`='$con'";
    $CheckResult = mysqli_query($conn, $CheckQuery);
    if (mysqli_num_rows($CheckResult) == 0) {
        if ($pass == $cpass) {
            $query = "INSERT INTO `users`(`full_name`, `email`, `password`, `department`, `country`, `contact_number`) 
            VALUES ('$na','$em','$hash_password','$department','$coun','$con')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Registration Successful');
                window.location.href='login.php';
                </script>";
            } else {
                echo "<script>alert('Error during registration')</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match')</script>";
        }
    } else {
        echo "<script>alert('User already exists')</script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }

        .card-registration {
            border-radius: 15px;
            background-color: #1f1f1f;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        h3 {
            color: #ff69b4;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
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

        .btn-primary,
        .btn-secondary {
            background-color: #ff69b4;
            border: none;
            padding: 10px;
            font-weight: 600;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #ff3399;
        }

        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #ff69b4;
        }

        label {
            color: #ccc;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        a {
            color: #ff69b4;
            text-decoration: none;
        }

        a:hover {
            color: #ff3399;
        }

        @media (max-width: 576px) {
            .col-md-6 {
                max-width: 100%;
            }
        }

        .position-relative {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 75%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-control {
            padding-right: 40px;
            /* Space for the icon */
        }
    </style>
</head>

<body>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4 mt-2">
                <div class="card card-registration">
                    <div class="card-body ">
                        <h3>Sign Up</h3>
                        <form id="registrationForm" method="POST" enctype="multipart/form-data" novalidate>

                            <!-- Step 1: Personal Information -->
                            <div class="step active" id="step1">
                                <div class="step-title">Step 1: Personal Information</div>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" id="fullName" class="form-control" name="fullName" required>
                                    <div class="error-message" id="nameError"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" required>
                                    <div class="error-message" id="emailError"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" id="department" class="form-control" name="department" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact Number</label>
                                    <input type="tel" id="contact" class="form-control" name="contact" required>
                                    <div class="error-message" id="contactError"></div>
                                </div>

                                <div class="mt-4 d-grid">
                                    <button type="button" class="btn btn-primary btn-lg" id="nextStep">Next</button>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="login.php">Already have an account? Login</a>
                                </div>
                            </div>

                            <!-- Step 2: Account Information -->
                            <div class="step" id="step2">
                                <div class="step-title">Step 2: Account Information</div>
                                <div class="mb-3">
                                    <label for="country" class="form-label">Select Country</label>
                                    <select class="form-control" id="country" name="country" required>
                                        <option value="" disabled selected>Select your country</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                    <div class="error-message" id="countryError"></div>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <span class="toggle-password" onclick="togglePassword('password', 'toggleIconPassword')" style="color: #ff69b4;">
                                        <i class="fas fa-eye" id="toggleIconPassword"></i>
                                    </span>
                                    <div class="error-message" id="passwordError"></div>
                                </div>

                                <div class="mb-3 position-relative">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" id="cpassword" class="form-control" name="cpassword" required>
                                    <span class="toggle-password" onclick="togglePassword('cpassword', 'toggleIconCPassword')" style="color: #ff69b4;">
                                        <i class="fas fa-eye" id="toggleIconCPassword"></i>
                                    </span>
                                    <div class="error-message" id="cpasswordError"></div>
                                </div>


                                <div class="mt-4 d-grid">
                                    <button type="button" class="btn btn-secondary btn-lg" id="prevStep">Back</button>
                                    <button type="submit" class="btn btn-primary btn-lg my-2" name="signup">Submit</button>
                                </div>

                                <div class="text-center mt-3">
                                    <a href="login.php">Already have an account? Login</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const nextStepBtn = document.getElementById('nextStep');
        const prevStepBtn = document.getElementById('prevStep');
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');

        nextStepBtn.addEventListener('click', function() {
            step1.classList.remove('active');
            step2.classList.add('active');
        });

        prevStepBtn.addEventListener('click', function() {
            step2.classList.remove('active');
            step1.classList.add('active');
        });

        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>