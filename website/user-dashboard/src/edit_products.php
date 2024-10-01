<?php
include("conn.php");
?>

<?php
include("header.php");
?>

<?php
$getId = $_GET["id"];
$query = "SELECT *FROM `products` WHERE id =$getId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result)
?>

<div class="container my-3">
    <div class="row text-center">
        <h2 class="text-primary">Update Product</h2>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-6 p-3" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 10px;border-radius:20px;">
            <div class="container mt-5">
                <h2 class="mb-4">Edit Product</h2>
                <form method="POST" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name"
                            value="<?php echo $row['product_name']; ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="size" class="form-label">Size & Warranty</label>
                        <select class="form-select" id="size" name="sizeandwarranty" required>
                            <option value="" selected>Select</option>
                            <option value="Small" <?php echo $row['size&warranty'] == 'Small' ? 'selected' : ''; ?>>Small</option>
                            <option value="Medium" <?php echo $row['size&warranty'] == 'Medium' ? 'selected' : ''; ?>>Medium</option>
                            <option value="Large" <?php echo $row['size&warranty'] == 'Large' ? 'selected' : ''; ?>>Large</option>
                            <option value="X-Large" <?php echo $row['size&warranty'] == 'X-Large' ? 'selected' : ''; ?>>X-Large</option>
                            <option value="XX-Large" <?php echo $row['size&warranty'] == 'XX-Large' ? 'selected' : ''; ?>>XX-Large</option>
                            <option value="26-28" <?php echo $row['size&warranty'] == '26-28' ? 'selected' : ''; ?>>26-28</option>
                            <option value="28-30" <?php echo $row['size&warranty'] == '28-30' ? 'selected' : ''; ?>>28-30</option>
                            <option value="30-32" <?php echo $row['size&warranty'] == '30-32' ? 'selected' : ''; ?>>30-32</option>
                            <option value="32-34" <?php echo $row['size&warranty'] == '32-34' ? 'selected' : ''; ?>>32-34</option>
                            <option value="34-36" <?php echo $row['size&warranty'] == '34-36' ? 'selected' : ''; ?>>34-36</option>
                            <option value="36-38" <?php echo $row['size&warranty'] == '36-38' ? 'selected' : ''; ?>>36-38</option>
                            <option value="1 Year" <?php echo $row['size&warranty'] == '1 Year' ? 'selected' : ''; ?>>1 Year</option>
                            <option value="9" <?php echo $row['size&warranty'] == '9' ? 'selected' : ''; ?>>9</option>
                            <option value="10" <?php echo $row['size&warranty'] == '10' ? 'selected' : ''; ?>>10</option>
                            <option value="11" <?php echo $row['size&warranty'] == '11' ? 'selected' : ''; ?>>11</option>
                            <option value="12" <?php echo $row['size&warranty'] == '12' ? 'selected' : ''; ?>>12</option>
                            <option value="13" <?php echo $row['size&warranty'] == '13' ? 'selected' : ''; ?>>13</option>
                            <option value="14" <?php echo $row['size&warranty'] == '14' ? 'selected' : ''; ?>>14</option>
                            <option value="2 Years" <?php echo $row['size&warranty'] == '2 Years' ? 'selected' : ''; ?>>2 Years</option>
                            <option value="3 Years" <?php echo $row['size&warranty'] == '3 Years' ? 'selected' : ''; ?>>3 Years</option>
                            <option value="4 Years" <?php echo $row['size&warranty'] == '4 Years' ? 'selected' : ''; ?>>4 Years</option>
                            <option value="5 Years" <?php echo $row['size&warranty'] == '5 Years' ? 'selected' : ''; ?>>5 Years</option>
                            <option value="6 Years" <?php echo $row['size&warranty'] == '6 Years' ? 'selected' : ''; ?>>6 Years</option>
                            <option value="7 Years" <?php echo $row['size&warranty'] == '7 Years' ? 'selected' : ''; ?>>7 Years</option>
                            <option value="8 Years" <?php echo $row['size&warranty'] == '8 Years' ? 'selected' : ''; ?>>8 Years</option>
                            <option value="9 Years" <?php echo $row['size&warranty'] == '9 Years' ? 'selected' : ''; ?>>9 Years</option>
                            <option value="10 Years" <?php echo $row['size&warranty'] == '10 Years' ? 'selected' : ''; ?>>10 Years</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price"
                            value="<?php echo $row['price']; ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="short_desc" class="form-label">Short Description</label>
                        <input type="text" class="form-control" id="short_desc" name="short_desc"
                            value="<?php echo $row['short_desc']; ?>" required>
                    </div>

                    <div class="col-12">
                        <label for="long_desc" class="form-label">Long Description</label>
                        <textarea class="form-control" id="long_desc" name="long_desc" rows="4" required><?php echo $row['long_desc']; ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img src="../../images/products/<?php echo $row['image']; ?>" alt="Current Image" class="img-thumbnail mt-2" width="150">
                    </div>

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" selected>Select Category</option>
                            <?php
                            $categoryQuery = "SELECT * FROM category";
                            $categoryResult = mysqli_query($conn, $categoryQuery);
                            while ($category = mysqli_fetch_assoc($categoryResult)) { ?>
                                <option value="<?php echo $category['id']; ?>"
                                    <?php echo $row['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100" name="update">Update Product</button>
                    </div>
                    <?php

                    if (isset($_POST['update'])) {
                        $na = $_POST['product_name'];
                        $sw = $_POST['sizeandwarranty'];
                        $p = $_POST['price'];
                        $sd = $_POST['short_desc'];
                        $ld = $_POST['long_desc'];
                        $catId = $_POST['category_id'];
                        $im = $_FILES['image'];
                        $image = $im['name'];

                        // Check if no new image is uploaded
                        if (empty($image)) {
                            $image = $row['image']; // Use the existing image if no new image is uploaded
                        } else {
                            // Move uploaded file to the images directory
                            move_uploaded_file($im['tmp_name'], "../../images/products/" . $image);
                        }

                        // Update query
                        $updateQuery = "UPDATE `products` 
                                       SET `product_name` = '$na', `short_desc` = '$sd', `long_desc` = '$ld', 
                                       `image` = '$image', `size&warranty` = '$sw', `price` = '$p', `category_id` = '$catId' 
                                       WHERE `id` = '$getId'";

                        $updateResult = mysqli_query($conn, $updateQuery);

                        if ($updateResult) {
                            echo "<script>alert('Product updated successfully.');
                                 window.location.href='product-detail.php'</script>";
                        } else {
                            echo "<script>alert('Error updating product.');</script>";
                        }
                    }

                    ?>
                </form>
            </div>
        </div>
    </div>
</div>