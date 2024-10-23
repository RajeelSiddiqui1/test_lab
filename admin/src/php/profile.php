<?php
include("conn.php");

session_start();
if(!isset($_SESSION['email']) || ($_SESSION['name'])){
    header("location:login.php");
    exit();
}
$id = $_SESSION['id'];
?>

<?php
include("header.php");
?>

<div class="page-wrapper">

<div class="conatiner my-5">
    <div class="row px-5">
        <div class="col-md-5">
<img src="../../../images/admin/<?php echo $_SESSION['image']?>" alt="" class="img-fluid">
        </div>
        <div class="col-md-7 p-3 rounded-3" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                <label for="">Username</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['name']?>" name="name">
                </div>

                <div class="mb-4">
                <label for="">Email</label>
                <input type="email" class="form-control" value="<?php echo $_SESSION['email']?>" name="email">  
                </div>

                <div class="mb-4">
                <label for="">Password</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['password']?>" name="password"> 
                </div>

                <div class="mb-4">
                <label for="">Choose Image</label>
                <input type="file" class="form-control" name="img"> 
                </div>
                <div class="mt-3 mx-4 justify-content-center">
                        <button class="btn btn-danger btn-lg" name="update" type="submit">Update</button>
                </div>
            </form>

            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
                $na = $_POST['name'];
                $em = $_POST['email'];
                $pass = $_POST['password'];
                $im = $_FILES['img'];
                $image = $im['name'];

                if($image == ""){
                    $query = "UPDATE `admin` SET `name`='$na',`email`='$em',`password`='$pass' WHERE `id`=$id";
                } else {
                    move_uploaded_file($im['tmp_name'],"../../../images/admin/".$image);
                    $query = "UPDATE `admin` SET `name`='$na',`email`='$em',`password`='$pass',`image`='$image' WHERE `id`=$id";
                }

                $result = mysqli_query($conn, $query);
                if($result){
                    session_destroy();
                    echo "<script>
                    alert('Profile has been updated');
                    window.location.href='login.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Error');
                    window.location.href='profile.php';
                    </script>";
                }
            }
            ?>
        </div>
    </div>
</div>

</div>
