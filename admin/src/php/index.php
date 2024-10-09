<?php
include("conn.php");

session_start();
if(!isset($_SESSION['email'])){
    header("location:login.php");
    exit();
}
?>

<?php
include("header.php");
?>

        <div class="page-wrapper">
           <div class="container my-5">
           <div class="row justify-content-center">
    <!-- Cart Section -->

    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $category_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
            ?>
            <div class="card-body">
                
                <i class="fa fa-user" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">Users</h5>
                <h2><?php echo $category_count ?></h2>
            </div>
        </div>
    </div>
    <!-- Category Section -->
    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $category_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM category"));
            ?>
            <div class="card-body">
                <i class="fa fa-tags" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">Category</h5>
                <h2><?php echo $category_count ?></h2>
            </div>
        </div>
    </div>

    <!-- Tester Login Section -->
    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $tester_login_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM testers"));
            ?>
            <div class="card-body">
            <i class="fa fa-list-alt" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">Tester Lists</h5>
                <h2><?php echo $tester_login_count ?></h2>
            </div>
        </div>
    </div>

    <!-- CPRI Login Section -->
    

    <!-- Tester List Section -->
  

    <!-- CPRI Tester List Section -->
    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $cpri_tester_list_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cpr_tester"));
            ?>
            <div class="card-body">
                <i class="fa fa-list-alt" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">CPRI Tester List</h5>
                <h2><?php echo $cpri_tester_list_count ?></h2>
            </div>
        </div>
    </div>

    <!-- Published Tester Section -->
    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $published_tester_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM show_tester_to_user"));
            ?>
            <div class="card-body">
                <i class="fa fa-check-circle" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">Published Tester</h5>
                <h2><?php echo $published_tester_count ?></h2>
            </div>
        </div>
    </div>

    <!-- Published CPRI Tester Section -->
    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $published_cpri_tester_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cpri_show_to_user"));
            ?>
            <div class="card-body">
                <i class="fa fa-check-square" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">Published CPRI Tester</h5>
                <h2><?php echo $published_cpri_tester_count ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $published_cpri_tester_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cpri_show_to_user"));
            ?>
            <div class="card-body">
                <i class="fa fa-check-square" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">Published CPRI Tester</h5>
                <h2><?php echo $published_cpri_tester_count ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <?php
            $published_cpri_tester_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cpri_show_to_user"));
            ?>
            <div class="card-body">
                <i class="fa fa-check-square" style="font-size: 50px; height: 50px; width: 50px;"></i>
                <h5 class="card-title mt-3">Published CPRI Tester</h5>
                <h2><?php echo $published_cpri_tester_count ?></h2>
            </div>
        </div>
    </div>
</div>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

           </div> 
    </div>
