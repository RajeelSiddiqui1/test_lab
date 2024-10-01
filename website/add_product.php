<?php
include("conn.php");
?>

<?php
include("header.php");
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h2 class="text-center">Add Product with Image</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" required>
                </div>
                <div class="mb-3">
                    <label for="manufacturing_no" class="form-label">Manufacturing Number</label>
                    <?php
                    // Auto-generate the next manufacturing number
                    $result = $conn->query("SELECT MAX(manufacturing_no) AS max_no FROM products");
                    $row = $result->fetch_assoc();
                    $next_manufacturing_no = $row['max_no'] ? $row['max_no'] + 1 : 1; // Start from 1 if no products yet
                    ?>
                    <input type="number" class="form-control" id="manufacturing_no" name="manufacturing_no" value="<?php echo $next_manufacturing_no; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                </div>
                <div class="mb-3">
                    <label for="manufacture_date" class="form-label">Manufacture Date</label>
                    <input type="date" class="form-control" id="manufacture_date" name="manufacture_date" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="tested">Tested</option>
                        <option value="retest">Retest</option>
                        <option value="cpri_testing">CPRI Testing</option>
                        <option value="market_released">Market Released</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $product_code = $_POST['product_code'];
    $manufacturing_no = $_POST['manufacturing_no'];
    $product_name = $_POST['product_name'];
    $manufacture_date = $_POST['manufacture_date'];
    $status = $_POST['status'];

    
    $result = $conn->query("SELECT MAX(CAST(test AS UNSIGNED)) AS max_test FROM products WHERE product_code = '$product_code'");
    $row = $result->fetch_assoc();
    $next_test = $row['max_test'] ? $row['max_test'] + 1 : 1;
    $test = str_pad($next_test, 12, "0", STR_PAD_LEFT); // Ensure it's 12 

    $image = $_FILES['image']['name'];
    $target_dir = "../images/products/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Generate product ID automatically
        $product_id = $product_code . $test . str_pad($manufacturing_no, 5, "0", STR_PAD_LEFT);

     
        $sql = "INSERT INTO products (product_id, product_code, test, manufacturing_no, product_name, manufacture_date, status, product_image) 
                VALUES ('$product_id', '$product_code', '$test', '$manufacturing_no', '$product_name', '$manufacture_date', '$status', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success text-center'>Product added successfully!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<div class='alert alert-danger text-center'>There was an error uploading the image!</div>";
    }
}

$conn->close();
?>

<?php
include("footer.php");
?>
