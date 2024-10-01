<?php
include("conn.php");
?>

<?php
include("header.php");
?>

<div class="container">
    <div class="row">
    <h2 class="my-3 text-center text-primary">Products</h2>
    </div>
    
<div class="row">
<div class="col-md-2">
        <a href="products.php" class="btn btn-success">Add Products</a>
    </div>
        <div class="col-md-12 my-2">
          
        <?php
$query = "SELECT * FROM `products`";
$result = mysqli_query($conn, $query);
?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Product Name</th>
            <th>Size</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
              
                <td><?php echo $row['size&warranty']; ?></td>
                <td>$ <?php echo $row['price']; ?></td>
                <td><img src="../../images/products/<?php echo $row['image']; ?>" alt="Category Image" class="img-fluid" style="width: 100px;height:120px;"></td>
                <td>
                    <a href="edit_products.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete_product.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
        </div>
    </div>
</div>
</div>