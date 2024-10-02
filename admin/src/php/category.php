<?php
include("conn.php");

session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
    exit();
}

?>

<?php
include("header.php");
?>

<div class="page-wrapper">
    <div class="container my-5">
        <div class="row text-center">
            <h2 lass="row text-center">Category</h2>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 p-3 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"">
                
                <form  method=" POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
                </div>

                <!-- <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Choose a category</option>
                            <option value="Resistors">Resistors</option>
                            <option value="Capacitors">Capacitors</option>
                            <option value="Inductors">Inductors</option>
                            <option value="Transformers">Transformers</option>
                            <option value="Diodes">Diodes</option>
                            <option value="Transistors">Transistors</option>
                        </select>
                    </div> -->

                <div class="mb-3">
                    <label for="test_desc" class="form-label">How to Test</label>
                    <textarea class="form-control" id="test_desc" name="desc" rows="4" placeholder="Describe how to test the product in the lab" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="test_desc" class="form-label">Image</label>
                    <input type="file" class="form-control" name="img" required></input>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="upload">Submit</button>
                </div>
                </form>

                <?php
if (isset($_POST['upload'])) {

    // Retrieve form values
    $na = $_POST['name'];
    $desc = $_POST['desc'];
    $im = $_FILES['img'];
    $image = $im['name'];

    // Check if form fields are empty
    if ($na == '' && $desc == '' && $image == '') {
        echo "<script>
        alert('Please Fill the Form!');
        window.location.href='category.php';
        </script>";
    } else {
        // Correct SQL query with properly enclosed values
        $CheckQuery = "SELECT * FROM `category` WHERE `c_name`='$na' OR `c_desc`='$desc' OR `c_image`='$image'";
        $CheckResult = mysqli_query($conn, $CheckQuery);

        // If the category does not exist, proceed to insert
        if (mysqli_num_rows($CheckResult) == 0) {

            // Move uploaded image to the desired location
            move_uploaded_file($im['tmp_name'], "../../../images/category/" . $image);
            
            // Insert new category into the database
            $query = "INSERT INTO `category`( `c_name`, `c_desc`, `c_image`) VALUES ('$na','$desc','$image')";
            $result = mysqli_query($conn, $query);
            
            if ($result) {
                echo "<script>
                alert('Category has been updated');
                window.location.href='category.php';
                </script>";
            } else {
                echo "<script>
                alert('Error occurred while updating category.');
                window.location.href='category.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Category already exists');
            window.location.href='category.php';
            </script>";
        }
    }
}
?>


            </div>
        </div>
    </div>
</div>