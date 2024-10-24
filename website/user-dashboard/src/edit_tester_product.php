<?php
include("conn.php");
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];

$getid = $_GET['id'];
$query = "SELECT *FROM `tbl_products` WHERE id = $getid";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<?php include("header.php"); ?>

<style>
    .form-container {
        background-color: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* max-width: 800px; */
        /* margin: 50px auto; */
    }

    .form-header {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control{
        border: 1px solid #000;
        border-radius:10px;

    }

    .btn-custom {
        background-color: #5e72e4;
        color: white;
    }

    .btn-custom:hover {
        background-color: #324cdd;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
               <div class="form-container">
        <h2 class="form-header">Edit Product</h2>
        <form>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="product_id" class="form-label">Product ID</label>
                    <input type="text" class="form-control" value="<?php echo $row ['id']?>" id="product_id" >
                </div>
                <div class="col-md-6">
                    <label for="test_id" class="form-label">Test ID</label>
                    <input type="text" class="form-control" value="<?php echo $row ['test_id']?>" id="test_id" >
                </div>
            </div>

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" value="<?php echo $row ['product_name']?>" id="product_name">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input class="form-control" value="<?php echo $row ['product_description']?>" id="description"></input>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" value="<?php echo $row['product_price']?>" id="price">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" value="<?php echo $row['category_id']?>" id="category">
                    <option selected disabled>Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Home">Home</option>
                    <option value="Accessories">Accessories</option>
                </select>
            </div>

            <div class="mb-3">
                <img src="../../../images/products/<?php echo $row ['product_image']?>" alt="" height="100" class="border border-2 border-dark">
            </div>

            <div class="mb-3">
            <label for="image" class="form-label">Select Image</label>
                <input type="file" class="form-control"  id="image">
            </div>

            <button type="submit" class="btn btn-custom w-100" value="edit">Submit</button>
        </form>
    </di>
</div>
                </div>
            </div>
        </div>
    </div>
</div>