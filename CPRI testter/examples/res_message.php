<?php
include("conn.php");
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php");
    exit();
}



$get = $_GET['id'];
$query = "SELECT * FROM cpri_product WHERE id = '$get'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


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
                        <form method="POST" enctype="multipart/form-data">
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
                            <form action="res_message.php?id=<?php echo $row['id'] ?>" method="POST">
                                <td>
                                    <div class="form-group">

                                        <select name="status" class="form-control status-select bg-dark" onchange="this.form.submit()">
                                            <option class="text-light" value="pending" class="text-warning">Pending</option>
                                            <option value="approved" class="bg-dark">Approved </option>
                                            <option value="declined" class="bg-dark">Declined</option>
                                        </select>
                                    </div>
                                </td>
                            </form>

                            


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $id = $_GET['id'];

    $sql = "UPDATE `cpri_product` SET status2 = '$status' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Status updated successfully')
        window.location.href= 'user-test.php'</script>";
    } else {
        echo "<script>alert('Status updatedion Failed')
        window.location.href= 'res_message.php'</script>";
    }
}

?>



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