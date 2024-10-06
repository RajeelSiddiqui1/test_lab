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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
// Adjust the query to show products from categories the tester has visited
$query = "
  SELECT p.id AS id, p.test_id, p.product_name, p.product_description, p.product_quantity, 
         p.product_price, c.c_name, p.product_image, p.status, p.category_id 
  FROM cpri_product p
  INNER JOIN category c ON p.category_id = c.id
  INNER JOIN testers ta ON ta.category_id = c.id
  WHERE ta.id = '$id'
";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['test_id']?></td>
                <td><?php echo $row['product_name']?> </td>
                <td><?php echo $row['product_description']?> </td>
                <td><?php echo $row['product_quantity']?> </td>
                <td>$<?php echo $row['product_price']?> </td>
                <td><?php echo $row['c_name']?></td>
                <td><img src="../../images/products/<?php echo $row['product_image']?>" alt="" height='50' width='150'></td>
                <td><?php echo $row['status']?></td>
               <td><a href='res_message.php?id=<?php echo $row['id']; ?>' class='btn btn-info'>Action</a></td>

              </tr>
  <?php  }}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="fixed-plugin">
  <div class="dropdown show-dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-cog fa-2x"> </i>
    </a>
    <ul class="dropdown-menu">
      <li class="header-title"> Sidebar Background</li>
      <li class="adjustments-line">
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors text-center">
            <span class="badge filter badge-primary active" data-color="primary"></span>
            <span class="badge filter badge-info" data-color="blue"></span>
            <span class="badge filter badge-success" data-color="green"></span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="adjustments-line text-center color-change">
        <span class="color-label">LIGHT MODE</span>
        <span class="badge light-badge mr-2"></span>
        <span class="badge dark-badge ml-2"></span>
        <span class="color-label">DARK MODE</span>
      </li>
     
    </ul>
  </div>
</div>
</div>
