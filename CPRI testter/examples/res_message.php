<?php
include("conn.php");
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php");
    exit();
}

$id = $_SESSION['id'];

$get = $_GET['id'];
$query = "SELECT * FROM tbl_products WHERE id = '$get'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $status = $_POST['status'];

    // Update only the status and message if declined, insert to 'cpri_product' if approved
    if ($status == 'declined') {
        $update_query = "UPDATE tbl_products SET status = '$status', message = '$message' WHERE id = '$get'";
        mysqli_query($conn, $update_query);
        echo "<div class='alert alert-warning'>Product status updated to declined.</div>";
    } else if ($status == 'approved') {
        $insert_query = "INSERT INTO cpri_product (test_id, product_name, product_description, product_quantity, product_image, product_price, message, category_id, user_id, status)
                         VALUES ('{$row['test_id']}', '{$row['product_name']}', '{$row['product_description']}', '{$row['product_quantity']}', '{$row['product_image']}', '{$row['product_price']}', '$message', '{$row['category_id']}', '{$row['user_id']}', '$status')";
        mysqli_query($conn, $insert_query);

        // Update status in tbl_products
        $update_query = "UPDATE tbl_products SET status = '$status', message = '$message' WHERE id = '$get'";
        mysqli_query($conn, $update_query);
        echo "<div class='alert alert-success'>Product approved and inserted into cpri_product table.</div>";
    }
}
?>

<?php include("header.php"); ?>

<div class="content">
    <div class="container">
        <div class="row text-center">
            <h2>Products Verification</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-chart">
                    <div class="card-header">
                        <form method="POST">
                            <div class="col-12 mb-3">
                                <label for="id" class="form-label">Product ID</label>
                                <input type="text" name="id" class="form-control text-light" value="<?php echo $row['id'] ?>" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="test_id" class="form-label">Test ID</label>
                                <input type="text" name="test_id" class="form-control text-light" value="<?php echo $row['test_id'] ?>" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control text-light" value="<?php echo $row['product_name'] ?>" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="product_description" class="form-label">Product Description</label>
                                <input type="text" name="product_description" class="form-control text-light" value="<?php echo substr($row['product_description'], 0, 104) . '....' ?>" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="product_quantity" class="form-label">Product Quantity</label>
                                <input type="text" name="product_quantity" class="form-control text-light" value="<?php echo $row['product_quantity'] ?>" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="product_price" class="form-label">Product Price</label>
                                <input type="text" name="product_price" class="form-control text-light" value="$<?php echo $row['product_price'] ?>" readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="product_image" class="form-label">Product Image</label>
                                <img src="../../images/products/<?php echo $row['product_image'] ?>" alt="Product Image" class="img-fluid">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control text-light">
                                    <option value="approved" <?php if ($row['status'] == 'approved') echo 'selected'; ?>>Approved</option>
                                    <option value="declined" <?php if ($row['status'] == 'declined') echo 'selected'; ?>>Declined</option>
                                    <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control text-light"><?php echo $row['message']; ?></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary active" data-color="primary"></span>
                        <span class="badge filter badge-info" data-color="blue"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line text-center color-change">
                <span class="color-label">LIGHT MODE</span>
                <span class="badge light-badge mr-2"></span>
                <span class="badge dark-badge ml-2"></span>
                <span class="color-label">DARK MODE</span>
            </li>

        </ul>
    </div>
</div>
</div>