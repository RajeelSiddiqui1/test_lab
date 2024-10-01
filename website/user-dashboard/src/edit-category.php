s<?php
include("conn.php");
?>


<?php
include("header.php");
?>


<div class="container mt-5">
    
    <div class="row text-center">
        <h2 class="fw-bold">Category Management</h2>
    </div>
<?php
$getId = $_GET['id'];
$query = "SELECT * FROM  `category`";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result)
?>
    <!-- Category Form -->
    <div class="row my-4 justify-content-center">
        <div class="col-md-6 p-3" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 10px;">
        <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" value="<?php echo $row['name']?>" id="name" name="name" placeholder="Enter category name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Category Description</label>
        <textarea class="form-control" id="description" name="description" placeholder="Enter category description" rows="3" required><?php echo $row['short_desc']?></textarea>
    </div>
    <div class="mb-3">
        <img src="../../images/category/<?php echo $row['image']?>" alt="" style="width: 100px;height:100px;">
        <label for="image" class="form-label">Category Image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary" name="submit">Update Category</button>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        // Get form data
        $na = $_POST['name'];
        $desc = $_POST['description'];
        $im = $_FILES['image'];
        $image = $im['name'];

        // Check if image was uploaded or not
        if (empty($image)) {
            // If no new image, only update name and description
            $query = "UPDATE `category` SET `name`='$na', `short_desc`='$desc' WHERE `id` = $getId";
        } else {
            // If a new image is uploaded, move the file and update the image as well
            move_uploaded_file($im['tmp_name'], "../../images/category/" . $image);

            $query = "UPDATE `category` SET `name`='$na', `short_desc`='$desc', `image`='$image' WHERE `id` = $getId";
        }

        // Execute the query
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Category has been updated successfully!');
            window.location.href='category_detail.php';</script>";
        } else {
            echo "<script>alert('Error updating category');</script>";
        }
    }
    ?>
</form>

        </div>
    </div>
