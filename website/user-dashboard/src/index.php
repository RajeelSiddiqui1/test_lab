<?php
include("conn.php");

if (!isset($_SESSION["name"]) || $_SESSION["name"] != true) {
  header("login.php");
  // exit();
}
?>


<?php
include("header.php");
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="container">
      <div class="row text-center ">
        <h2>MRS STORE</h2>
      </div>
      <div class="row my-5 justify-content-center">
        <div class="col-md-3 mt-3">
          <div class="card p-3 text-center">
            <h4>Admin</h4>
            <div class="icon mt-2">
              <i class="fas fa-user-shield"></i>
            </div>
            <div class="counter mt-2">
              <?php
              $query = "SELECT *FROM `admin`";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result)
              ?>
              <h5 class="text-primary"><?php echo $row['id'] ?></h5>

            </div>
          </div>
        </div>

        <div class="col-md-3 mt-3">
          <div class="card p-3 text-center">
            <h4>User's</h4>
            <div class="icon mt-2">
              <i class="fas fa-user"></i>
            </div>
            <div class="counter mt-2">
              <?php
              $query = "SELECT *FROM `user`";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result)
              ?>
              <h5 class="text-primary"><?php echo $row['id'] ?></h5>

            </div>
          </div>
        </div>

        <div class="col-md-3 mt-3">
          <div class="card p-3 text-center">
            <h4>Categories</h4>
            <div class="icon mt-2">
              <i class="fas fa-th-large"></i>
            </div>
            <div class="counter mt-2">
              <?php
              $query = "SELECT *FROM `category`";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result)
              ?>
              <h5 class="text-primary"><?php echo $row['id'] ?></h5>

            </div>
          </div>
        </div>

        <div class="col-md-3 mt-3">
          <div class="card p-3 text-center">
            <h4>Product's</h4>
            <div class="icon mt-2">
              <i class="fas fa-male"></i>
            </div>
            <div class="counter mt-2">
              <?php
              $query = "SELECT *FROM `products`";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result)
              ?>
              <h5 class="text-primary"><?php echo $row['id'] ?></h5>

          </div>
        </div>
      </div>

    

     

      

      <div class="col-md-3 mt-3">
        <div class="card p-3 text-center">
          <h4>Conatct Us</h4>
          <div class="icon mt-2">
            <i class="fas fa-envelope"></i>
          </div>
          <div class="counter mt-2">
            <h5 class="text-primary">55</h5>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-3">
        <div class="card p-3 text-center">
          <h4>Order's</h4>
          <div class="icon mt-2">
            <i class="fas fa-box"></i>
          </div>
          <div class="counter mt-2">
            <h5 class="text-primary">55</h5>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-3">
        <div class="card p-3 text-center">
          <h4>Add to Carts</h4>
          <div class="icon mt-2">
            <i class="fas fa-cart-plus"></i>
          </div>
          <div class="counter mt-2">
            <h5 class="text-primary">55</h5>
          </div>
        </div>
      </div>

    </div>
  </div>


</div>

</div>