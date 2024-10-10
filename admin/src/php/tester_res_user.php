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


<div class="page-wrapper px-3">

<div class="container my-5">
    <div class="row">
        <h2 class="">Tester Tests Results</h2>
    </div>

    <div class="row my-3">
        <div class="table-responsive"> <!-- Added table-responsive class to make it scrollable on smaller screens -->
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Test Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Desc</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `tbl_products`";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['test_id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo substr($row['product_description'],0,60),'...' ?></td>
                            <td><?php echo $row['product_quantity']; ?></td>
                            <td>$<?php echo $row['product_price']; ?></td>
                            <td><img src="../../../images/products/<?php echo $row['product_image']?>"  height="100" width="150"></td>
                            <td><?php echo $row['status']; ?></td>
                            
                          
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

