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
<div class="container my-5">
    <div class="row">
        <?php
         $query = "SELECT *FROM `show_tester_to_user`";
         $result = mysqli_query($conn, $query);
         while($row = mysqli_fetch_assoc($result)){ ?>
                
               
        <div class="col-md-4">
        
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <img src="../../../images/show_tester_to_users/8380015.jpg" alt="" style="height:25rem;width:100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['fullname'] ?></h5>

                            
                            <p class="card-text"><?php echo $row['email'] ?></p>

                            <p class="card-text fw-bold"><?php echo $row['skills'] ?></p>
                            <div class="d-flex">
                               <a href="delete_published_tester.php?id=<?php echo $row['id']?>" class="btn btn-danger">Un Published</a>
                            </div>
                        </div>
                    </div>
                </div>
      <?php }?>
    </div>
</div>

</div>