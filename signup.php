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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #e9ecef;
            font-family: 'Poppins', sans-serif;
        }

        .card-registration {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        label {
            font-weight: 600;
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

        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        @media (max-width: 576px) {
            .col-md-6 {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card card-registration">
                    <div class="card-body p-4">
                        <h3 class="text-center pb-4">Registration Form</h3>
                        <form id="registrationForm" method="POST" enctype="multipart/form-data" novalidate>

                            <!-- Step 1 -->
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
                            </div>

                            <!-- Step 2 -->
                            <div class="step" id="step2">
                                <div class="step-title">Step 2: Account Information</div>
                                <div class="mb-3">
                                    <label for="country" class="form-label">Select Country</label>
                                    <select class="form-control" id="country" name="country" required>
                                        <option value="" disabled selected>Select your country</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <!-- Add other countries as needed -->
                                    </select>
                                    <div class="error-message" id="countryError"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <div class="error-message" id="passwordError"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" id="cpassword" class="form-control" name="cpassword" required>
                                    <div class="error-message" id="cpasswordError"></div>
                                </div>

                                <div class="mt-4 d-grid">
                                    <button type="button" class="btn btn-secondary btn-lg" id="prevStep">Back</button>
                                    <button type="submit" class="btn btn-primary btn-lg my-2" name="signup">Submit</button>
                                </div>
                                <div class="d-flex justify-content-between my-3">
                                    <a href="login.php" class="text-decoration-none">Already have an account? Login</a>
                                    <a href="Choose_Password.php" class="text-decoration-none">Choose Password</a>
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
