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
           <div class="container">
            <div class="row">
              <div class="col-md-5 bg-white rounded-3 p-3 mx-2">
<img src="../../../images/users/<?php echo $_SESSION['image']?>" class="img-fluid" alt="">
              </div>
              <div class="col-md-6 bg-white rounded-3 p-3">
              <form action="" method="POST" enctype="multipart/form-data">
  <!-- Name Field -->
  <div class="mb-4">
    <label for="name">Username</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['full_name'] ?>" name="name" id="name" required>
  </div>

  <!-- Email Field -->
  <div class="mb-4">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" name="email" id="email" required>
  </div>

  <!-- Education Field -->
  <div class="mb-4">
    <label for="education">Department</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['department'] ?>" name="education" id="education" readonly>
  </div>

  <!-- Contact Field -->
  <div class="mb-4">
    <label for="contact">Contact</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['contact_number'] ?>" name="contact" required>
  </div>

  <!-- Work Experience Field -->
  <div class="mb-4">
    <label for="work_experience">Country</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['country'] ?>" name="work_experience" id="work_experience" readonly>
  </div>

  <!-- Skills Field -->
  <div class="mb-4">
    <label for="skills">Created</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['created_at'] ?>" name="skills" id="skills" readonly>
  </div>

  <div class="mb-4">
    <label for="skills">Updated At</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['updated_at'] ?>" name="skills" id="skills" readonly>
  </div>


  <!-- Salary Field -->
 

  <!-- Image Upload Field -->
  <div class="mb-4">
    <label for="img">Choose Image</label>
    <input type="file" class="form-control" name="img" id="img">
  </div>

  <!-- Submit Button -->
  <div class="mt-3 mx-4 text-center">
    <button class="btn btn-info btn-lg" name="update" type="submit">Update</button>
  </div>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
      $na = $_POST['name'];
      $em = $_POST['email'];
      $cont = $_POST['contact'];
      $im = $_FILES['img'];
      $image = $im['name'];

      if($image == ""){
          $query = "UPDATE `users` SET `full_name`='$na',`email`='$em',`contact_number`='$cont' WHERE `id`=$id";
      } else {
          move_uploaded_file($im['tmp_name'],"../../../images/users/".$image);

          $query = "UPDATE `users` SET `full_name`='$na',`email`='$em',`contact_number`='$cont',`image`='$image' WHERE `id`=$id";
      }

      $result = mysqli_query($conn, $query);
      if($result){
          session_destroy();
          echo "<script>
          alert('Profile has been updated');
          window.location.href='../../login.php';
          </script>";
      } else {
          echo "<script>
          alert('Error');
          window.location.href='index.php';
          </script>";
      }
  }
  
  ?>
              </form>
              </div>
            </div>
           </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    