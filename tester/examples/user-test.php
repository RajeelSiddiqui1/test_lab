<?php
include("conn.php");
session_start();
if (!isset($_SESSION["email"])) {
  header("location:login.php");
  exit();
}

$id = $_SESSION['id'];
?>

<?php
include("header.php");
?>
<div class="content">

  <div class="container">
    <div class="row">
      <h2>Products in Categories Where Tester Has Been</h2>
    </div>
    <div class="row">
      <div class="card card-chart">
        <div class="card-header">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Product ID</th>
                <th>Test ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Adjust the query to show products from categories the tester has visited
              $query = "
                SELECT p.id AS product_id, p.test_id, p.product_name, p.product_description, p.product_quantity, 
                       p.product_price, c.c_name, p.product_image, p.status 
                FROM tbl_products p
                INNER JOIN category c ON p.category_id = c.id
                INNER JOIN testers ta ON ta.category_id = c.id
                WHERE ta.id = '$id'
              ";
              $result = mysqli_query($conn, $query);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                            <td>{$row['product_id']}</td>
                            <td>{$row['test_id']}</td>
                            <td>{$row['product_name']}</td>
                            <td>{$row['product_description']}</td>
                            <td>{$row['product_quantity']}</td>
                            <td>\${$row['product_price']}</td>
                            <td>{$row['c_name']}</td>
                            <td><img src='../../images/products/{$row['product_image']}' alt='{$row['product_name']}' width='100'></td>
                            <td>{$row['status']}</td>
                          </tr>";
                }
              } else {
                echo "<tr><td colspan='10' class='text-center'>No products found.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
