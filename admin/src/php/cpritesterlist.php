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

<div class="page-wrapper px-5 ">
    <div class="conatiner">
        <div class="row text-center">
            <h2 class="p-5">CPRI Tester Lists</h2>
        </div>
        <div class="row">
           <?php
           $query = "SELECT *FROM `cpr_tester`";
           $result = mysqli_query($conn, $query);
           while ($row = mysqli_fetch_assoc($result)) { ?>
         
            <div class="col-md-4">
            <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <img src="../../../images/testers/<?php echo $row['image']?>" alt="" style="height:25rem;widht:100%;">
            <div class="card-body">
                
                <h5 class="card-title"><?php echo $row['full_name']?></h5>
                
                <!-- Card Description -->
                <p class="card-text"><?php echo $row['skills']?></p>
              
                <p class="card-text fw-bold"><?php echo $row['salary']?></p>
                <div class="d-flex">
                    <a href="tester_pulished.php?id=<?php echo $row['id']?>" class="btn btn-primary mx-4">Pulished</a>
                    <a href="tester_delete" class="btn btn-danger mx-4">Delete</a>
                </div>
            </div>
        </div>
        </div>
       <?php } ?> 
            
        </div>
    </div>
</div>