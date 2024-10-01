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

    <!-- Category Form -->
    <div class="row my-4 justify-content-center">
        <div class="col-md-6 p-3" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 10px;">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Category Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter category description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Category Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
                </div>

                <?php
if (isset($_POST["submit"])) {

    $na = $_POST['name'];
    $desc = $_POST['description'];
    $im = $_FILES['image'];
    $image = $im['name'];

    if (empty($na) || empty($desc) || empty($image)) {
        echo "<script>alert('Error: Fill all fields');</script>";
    }
     else {

        $checkQuery = "SELECT * FROM `category` WHERE `name`='$na' OR `short_desc`='$desc'";
        $checkResult = mysqli_query($conn, $checkQuery);
        
        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Error: Category name or description already exists');</script>";
        } else {
            move_uploaded_file($im['tmp_name'], "../../images/category/" . $image);

          
            $query = "INSERT INTO `category`( `name`, `short_desc`, `image`) VALUES ('$na', '$desc', '$image')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>alert('Category has been uploaded successfully.');
                window.location.href='category_detail.php'</script>";
            } else {
                echo "<script>alert('Error: Could not upload the category.');</script>";
            }
        }
    }
}
?>

            </form>
        </div>
    </div>