<?php
include("conn.php");
session_start();
if(!isset($_SESSION["email"]) ){
    header("login.php");
    exit();
}

$id = $_SESSION['id'];
?>

<?php
include("header.php");
?>
<div class="main-panel">
          <div class="content-wrapper">
           <div class="container ">
            <div class="row">
            <table class="table table-bordered table-striped ">
            <thead class="table-dark">
              <tr>
                <th>Product ID</th>
                <th>Test ID</th>
                <th> Product Name</th>
                
                <th>Message</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              
              $query = "SELECT *FROM `tbl_products` WHERE user_id = $id";
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($result)){ ?>
             <tr>
              
                
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['test_id']?></td>
                <td><?php echo $row['product_name']?></td>
                <td><?php echo substr($row['message'],0,30).'...'?></td>
                <td><img src="../../../images/products/<?php echo $row['product_image']?>" width="100" height="100" alt=""></td>
              <td><?php echo $row['status']?></td>
              <td><a href="edit_tester_res.php?id=<?php echo $row['id']?>" class="btn btn-warning" style="background-color: purple; color: white;">Edit</a>
              <!-- <a href="" class="btn btn-danger">Delete</a> -->
              </td>
             </tr>
             <?php }?>
            </tbody>
          </table>
            </div>
           </div>
          </div>