<?php
include("conn.php");
?>

<?php
include("header.php");
?>

<div class="container">
    <div class="row">
    <h2 class="my-3 text-center text-primary">Categories</h2>
    </div>
    
<div class="row">
<div class="col-md-2">
        <a href="category.php" class="btn btn-success">Add Category</a>
    </div>
        <div class="col-md-12 my-2">
          
        <?php
$query = "SELECT * FROM `category`";
$result = mysqli_query($conn, $query);
?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Image</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><img src="../../images/category/<?php echo $row['image']; ?>" alt="Category Image" class="img-fluid" style="width: 100px;height:100px;"></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['short_desc']; ?></td>
            <td>
                <a href="edit-category.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete-category.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

        </div>
    </div>
</div>
</div>