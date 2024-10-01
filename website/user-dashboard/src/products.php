<?php
include("conn.php");
?>

<?php
include("header.php");
?>

<div class="container my-3">
    <div class="row text-center">
        <h2 class="text-primary">Products</h2>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-6 p-3" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 10px;border-radius:20px;">
            <div class="container mt-5">
                <h2 class="mb-4">Add New Product</h2>
                <form method="POST" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                    </div>

                    <div class="col-md-6">
                        <label for="size" class="form-label">Size & Warranty</label>
                        <select class="form-select" id="size" name="sizeandwarranty" required>
                            <option value="" selected>Select</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="X-Large">X-Large</option>
                            <option value="XX-Large">XX-Large</option>
                            <option value="26-28">26-28</option>
                            <option value="28-30">28-30</option>
                            <option value="30-32">30-32</option>
                            <option value="32-34">32-34</option>
                            <option value="34-36">34-36</option>
                            <option value="36-38">36-38</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="1 Year">1 Year</option>
                            <option value="2 Years">2 Years</option>
                            <option value="3 Years">3 Years</option>
                            <option value="4 Years">4 Years</option>
                            <option value="5 Years">5 Years</option>
                            <option value="6 Years">6 Years</option>
                            <option value="7 Years">7 Years</option>
                            <option value="8 Years">8 Years</option>
                            <option value="9 Years">9 Years</option>
                            <option value="10 Years">10 Years</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Enter price" required>
                    </div>

                    <div class="col-md-6">
                        <label for="short_desc" class="form-label">Short Description</label>
                        <input type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Enter short description" required>
                    </div>

                    <div class="col-12">
                        <label for="long_desc" class="form-label">Long Description</label>
                        <textarea class="form-control" id="long_desc" name="long_desc" rows="4" placeholder="Enter long description" required></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" selected>Select Category</option>
                            <?php
                            $categoryQuery = "SELECT * FROM category";
                            $categoryResult = mysqli_query($conn, $categoryQuery);
                            while ($category = mysqli_fetch_assoc($categoryResult)) { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100" name="submit">Save Product</button>
                    </div>

                    <?php
                    if (isset($_POST["submit"])) {
                        $na = $_POST['product_name'];
                        $sw = $_POST['sizeandwarranty'];
                        $p = $_POST['price'];
                        $sd = $_POST['short_desc'];
                        $ld = $_POST['long_desc'];
                        $catId = $_POST['category_id'];
                        $im = $_FILES['image'];
                        $image = $im['name'];

                        if (empty($na) || empty($sw) || empty($p) || empty($sd) || empty($ld) || empty($catId)) {
                            echo "<script>alert('Error: Fill all fields');</script>";
                        } else {
                            if ($image) {
                                move_uploaded_file($im['tmp_name'], "../../images/products/" . $image);
                            }
                            $query = "INSERT INTO `products` (`product_name`, `short_desc`, `long_desc`, `image`, `size&warranty`, `price`, `category_id`) 
                      VALUES ('$na', '$sd', '$ld', '$image', '$sw', '$p', '$catId')";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                echo "<script>alert('Product has been uploaded successfully.');
                      window.location.href='product-detail.php';</script>";
                            } else {
                                echo "<script>alert('Error uploading product.');</script>";
                            }
                        }
                    }
                    ?>
                </form>


            </div>

        </div>
    </div>
</div>