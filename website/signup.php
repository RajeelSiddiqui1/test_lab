<?php
include("conn.php");

if (isset($_POST["signup"])) {
    // Sign-up form data
    $na = $_POST["fullName"];
    $em = $_POST["email"];
    $department = $_POST["department"];
    $con = $_POST["contact"];
    $website_link = $_POST["website_link"];
    $coun = $_POST["country"];
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];
    $hash_password = password_hash($pass, PASSWORD_DEFAULT);
    $contact_pattern = "/^\+?[0-9]{10,14}$/";

    // Payment form data
    $cardName = $_POST['cardName'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    $billingAddress = $_POST['billingAddress'];
    $totalprice = 5000; // Fixed price for demonstration

    // Regex patterns for payment details
    $namePattern = "/^[a-zA-Z\s]+$/";
    $cardNumberPattern = "/^\d{4} \d{4} \d{4} \d{4}$/";
    $expiryDatePattern = "/^(0[1-9]|1[0-2])\/\d{2}$/";
    $cvvPattern = "/^\d{3}$/";

    $isValid = true;

    // Validate contact number format
    if (!preg_match($contact_pattern, $con)) {
        echo "<script>alert('Invalid contact number format.')</script>";
        $isValid = false;
    }

    // Payment validation
    if (!preg_match($namePattern, $cardName)) {
        echo "<script>alert('Invalid cardholder name. Only letters and spaces are allowed.');</script>";
        $isValid = false;
    }

    if (!preg_match($cardNumberPattern, $cardNumber)) {
        echo "<script>alert('Invalid card number format.');</script>";
        $isValid = false;
    }

    if (!preg_match($expiryDatePattern, $expiryDate)) {
        echo "<script>alert('Invalid expiry date format. Use MM/YY.');</script>";
        $isValid = false;
    }

    if (!preg_match($cvvPattern, $cvv)) {
        echo "<script>alert('Invalid CVV format. It should be 3 digits.');</script>";
        $isValid = false;
    }

    // Proceed with signup and cart insertion if all is valid
    if ($isValid) {
        // Check if the user already exists
        $CheckQuery = "SELECT * FROM `users` WHERE `email`='$em'";
        $CheckResult = mysqli_query($conn, $CheckQuery);

        if (mysqli_num_rows($CheckResult) == 0) {
            if ($pass == $cpass) {
                // Insert payment info into the users table
                $paymentQuery = "INSERT INTO `users`(`full_name`, `email`, `password`, `department`, `country`, `contact_number`, `website_link`, `cardholder_name`, `card_number`, `expiry_date`, `cvv`, `billing_address`, `total_price`) 
                VALUES ('$na','$em','$hash_password','$department','$coun','$con','$website_link','$cardName','$cardNumber','$expiryDate','$cvv','$billingAddress','$totalprice')";

                $result = mysqli_query($conn, $paymentQuery);

                if ($result) {
                    echo "<script>alert('Registration and payment completed successfully'); window.location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Error during registration/payment.')</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match.')</script>";
            }
        } else {
            echo "<script>alert('User already exists.')</script>";
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up & Add to Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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

        .btn-primary {
            background-color: #ff69b4;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff3399;
        }

        label {
            color: #ccc;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-registration">
                    <div class="card-body">
                        <h3>Sign Up </h3>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="fullName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" name="department" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="contact" required>
                            </div>
                            <div class="mb-3">
                                <label for="website_link" class="form-label">Website Link</label>
                                <input type="text" class="form-control" name="website_link">
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="cpassword" required>
                                </div>
                            </div>

                            <h3 class="text-center mt-4">Add to Cart (Payment Details)</h3>
                            <div class="mb-3">
                                <label for="cardName" class="form-label">Cardholder Name</label>
                                <input type="text" class="form-control" name="cardName" required>
                            </div>
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" name="cardNumber" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expiryDate" class="form-label">Expiry Date (MM/YY)</label>
                                    <input type="text" class="form-control" name="expiryDate" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" name="cvv" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="billingAddress" class="form-label">Billing Address</label>
                                <input type="text" class="form-control" name="billingAddress" required>
                            </div>

                            <div class="mb-3">
                                <label for="billingAddress" class="form-label">Total Payment</label>
                                <input type="text" class="form-control" value="$5000" readonly>
                            </div>

                            <button type="submit" name="signup" class="btn btn-primary w-100">Complete Signup & Payment</button>
                            <div class="mt-3">
                                <a href="login.php" class="mx-5 text-light" style="text-decoration:none;">Do have an account?login</a>
                                <a href="choose_Password.php" class="mx-3 text-light" style="text-decoration:none;">Choose password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
