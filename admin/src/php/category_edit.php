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

$getid = $_GET['id'];
$query = "SELECT *FROM `category` WHERE id = $getid";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>

<div class="page-wrapper">
    <div class="container my-5">
        <div class="row text-center">
            <h2 lass="row text-center">Category</h2>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 p-3 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                
                <form  method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $row['c_name']?>" name="name" placeholder="Enter product name" required>
                </div>

               
                <div class="mb-3">
                    <label for="test_desc" class="form-label">How to Test</label>
                    <input class="form-control" value="<?php echo $row['c_desc']?>" id="test_desc" name="desc"  rows="4" placeholder="Describe how to test the product in the lab" required></input>
                </div>
                <div class="mb-3">
                    <img src="../../../images/category/<?php echo $row['c_image']?>" alt="" class="img-fluid">
                </div>

                <div class="mb-3">
                    <label for="test_desc" class="form-label">Image</label>
                    <input type="file" class="form-control" name="img" ></input>
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
     
    if(empty($image)){
        $query = "UPDATE `category` SET `c_name`='$na', `c_desc`='$desc' WHERE `id` = $getid";
    }
    else{
        move_uploaded_file($im['tmp_name'], "../../../images/category/" . $image);

        $query = "UPDATE `category` SET `c_name`='$na', `c_desc`='$desc', `c_image`='$image' WHERE `id` = $getid";
    }
   

  
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
                alert('Category has been updated');
                window.location.href='category_details.php';
              </script>";
    } else {
        echo "<script>
                alert('Error occurred while updating category.');
                window.location.href='category.php';
              </script>";
    }
}
?>


            </div>
        </div>
    </div>
</div>