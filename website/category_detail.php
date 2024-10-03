<?php
include("conn.php");
session_start();

if(!isset($_SESSION["email"])){
    header("location:login.php");
    exit();
}

$getId =  $_GET['id'] ;


$query = "SELECT * FROM `category` WHERE id = '$getId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<?php include("header.php"); ?>

<div class="container my-5">
    <div class="row">
       
            <img src="../images/category/<?php echo $row['c_image']?>" class="img-fluid" style="border: 2px solid #FF69B4; border-radius: 8px; 
            ;
            " >
        
        <div class="row mt-3">
       
            <h2 class="text-center"><?php echo $row['c_name']?></h2>
            <p><?php echo $row['c_desc']?></p>
       
        </div>
       
    </div>
</div>

<?php include("footer.php"); ?>
