<!-- <?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart - SRS Electrical Lab</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            /* White background */
            color: #6a1b9a;
            /* Purple text */
        }

        .card {
            border: none;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .add-to-cart-title {
            color: #d81b60;
            /* Pink color */
        }

        .btn-primary {
            background-color: #6a1b9a;
            /* Purple */
            border-color: #6a1b9a;
        }

        .btn-primary:hover {
            background-color: #d81b60;
            /* Pink */
            border-color: #d81b60;
        }

        .payment-method {
            background-color: #f3e5f5;
            /* Light purple */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row">
            <!-- Product Image (Left Side) -->
            <div class="col-md-6">
                <div class="card">
                    <img src="./assets/img/addtocart.jpg" alt="Product Image" class="img-fluid">
                    <div class="card-body">
                        <h3 class="card-title add-to-cart-title">SRS Electrical Lab Product</h3>
                        <p class="card-text">High-quality electrical tools and equipment for professionals.</p>
                        <p class="card-text"><strong>Price: $5000</strong></p>
                    </div>
                </div>
            </div>

            <!-- Payment Method (Right Side) -->
            <div class="col-md-6">
                <div class="payment-method">
                    <h4 class="add-to-cart-title">Payment Method</h4>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="cardName" class="form-label">Cardholder Name</label>
                            <input type="text" class="form-control" name="cardName" id="cardName" required>
                        </div>
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" name="cardNumber" id="cardNumber"  required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="expiryDate" class="form-label">Expiry Date</label>
                                <input type="text" class="form-control" name="expiryDate" id="expiryDate"  required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" name="cvv" id="cvv"  required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="billingAddress" class="form-label">Billing Address</label>
                            <input type="text" class="form-control" name="billingAddress" id="billingAddress"  required>
                        </div>
                        <div class="mb-3">
                            <label for="totalprice" class="form-label">Total Price</label>
                            <input type="text" class="form-control" value="$5000" name="totalprice" id="totalprice"  readonly>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="send">Submit</button>
                    </form>
                    <?php
                    if (isset($_POST["send"])) {

                        $cardName = $_POST['cardName'];
                        $cardNumber = $_POST['cardNumber'];
                        $expiryDate = $_POST['expiryDate'];
                        $cvv = $_POST['cvv'];
                        $billingAddress = $_POST['billingAddress'];
                        $totalprice = $_POST['totalprice'];

                        // Regex validation
                        $namePattern = "/^[a-zA-Z\s]+$/";
                        $cardNumberPattern = "/^\d{4} \d{4} \d{4} \d{4}$/";
                        $expiryDatePattern = "/^(0[1-9]|1[0-2])\/\d{2}$/";
                        $cvvPattern = "/^\d{3}$/";

                        $isValid = true;

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

                        if ($isValid) {
                            $check_query = "SELECT * FROM `users` WHERE `card_number` = '$cardNumber' AND `cvv` = '$cvv'";
                            $check = mysqli_query($conn, $check_query);
                            if (mysqli_num_rows($check) == 0) {
                                $query = "INSERT INTO `users`( `cardholder_name`, `card_number`, `expiry_date`, `cvv`, `billing_address`, `total_price`) VALUES ('$cardName','$cardNumber','$expiryDate','$cvv','$billingAddress','$totalprice')";

                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    echo "<script>alert('Add to cart Completed'); 
                                    window.location.href='signup.php';</script>";
                                } else {
                                    echo "<script>alert('Error while adding to cart.'); </script>";
                                }
                            } else {
                                echo "<script>alert('Cart info already exists.'); </script>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->
