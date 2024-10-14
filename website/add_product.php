<?php
include("conn.php");
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php");
    exit();
}

// Retrieve user_id based on logged-in user's email
$email = $_SESSION["email"];
$userQuery = "SELECT id FROM users WHERE email = '$email'";
$userResult = mysqli_query($conn, $userQuery);
$user = mysqli_fetch_assoc($userResult);
$userId = $user['id'];
?>

<?php
include("header.php");
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form method="POST" enctype="multipart/form-data" id="productForm">
                <div class="mb-4">
                    <label for="id">Product ID (10 digits):</label>
                    <input type="text" id="id" class="form-control" name="id" required pattern="\d{10}" title="Please enter a 10-digit ID">
                </div>
                <div class="mb-4">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" class="form-control" name="product_name" required>
                </div>
                <div class="mb-4">
                    <label for="product_description">Product Description:</label>
                    <textarea id="product_description" class="form-control" name="product_description" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="product_quantity">Product Quantity:</label>
                    <input type="number" id="product_quantity" class="form-control" name="product_quantity" required>
                </div>
                <div class="mb-4">
                    <label for="product_price">Product Price:</label>
                    <input type="number" id="product_price" class="form-control" name="product_price" required>
                </div>
                <div class="mb-4">
                    <label for="category_id">Category:</label>
                    <select id="category_id" class="form-control" name="category_id" required>
                        <?php
                        $query = "SELECT * FROM `category`";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['c_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_image">Product Image:</label>
                    <input type="file" id="product_image" class="form-control" name="product_image" required>
                </div>
                <div class="d-grid">
                    <button class="btn" id="submitBtn" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="animationOverlay" class="overlay">
    <div class="animation-box">
        <img src="./assets/img/waiting logo.jpg" alt="Submitting..."  class="img-fluid"/>
        <p>Product submitted to SRS Electrical! Waiting for tester...</p>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {

    // Validate and retrieve the 10-digit Product ID
    $id = $_POST['id'];
    if (!preg_match('/^\d{10}$/', $id)) {
        echo "Error: Product ID must be exactly 10 digits.";
        exit;
    }

    // Retrieve other form data
    $na = $_POST["product_name"];
    $pd = $_POST["product_description"];
    $pq = $_POST["product_quantity"];
    $pp = $_POST["product_price"];
    $catId = $_POST["category_id"];
    $im = $_FILES["product_image"];
    $image = $im["name"];

    // Auto-generate a 12-digit test_id
    $test_id = str_pad(rand(0, pow(10, 12) - 1), 12, '0', STR_PAD_LEFT);

    // Move uploaded image to the desired location
    move_uploaded_file($im['tmp_name'], "../images/products/" . $image);

    // Insert into the database using the correct user_id
    $query = "INSERT INTO `tbl_products`(`id`, `test_id`, `product_name`, `product_description`, `product_quantity`, `product_image`, `product_price`, `category_id`, `user_id`) 
              VALUES ('$id', '$test_id', '$na', '$pd', '$pq', '$image', '$pp', '$catId', '$userId')";

    // Execute the query
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>
                document.getElementById('animationOverlay').style.display = 'flex';
                setTimeout(function() {
                    alert('Product has been sent to the tester...');
                    window.location.href='add_product.php';
                }, 5000);
              </script>";
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
}
?>

<?php
include("footer.php");
?>

<!-- CSS for styling -->
<style>
    .btn {
        background-color: #FD70B6;
        color: #fff;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .animation-box {
        background-color: #fff;
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
    }

    .animation-box img {
        width: 150px;
        margin-bottom: 1rem;
    }

    .animation-box p {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }
</style>
