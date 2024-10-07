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
  <div class="container my-5">
    <div class="row">
      <div class="col-md-5">
        <div class="card card-chart">
          <div class="card-header">
          <img src="../../images/testers/<?php echo $_SESSION['image']?>" alt="" class="img-fluid py-3">
          </div>
        </div>
       
      </div>
      <div class="col-md-7">
        <div class="card card-chart">
          <div class="card-header ">
          <form action="" method="POST" enctype="multipart/form-data">
  <!-- Name Field -->
  <div class="mb-4">
    <label for="name">Username</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['fullName'] ?>" name="name" id="name" required>
  </div>

  <!-- Email Field -->
  <div class="mb-4">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?php echo $_SESSION['email'] ?>" name="email" id="email" required>
  </div>

  <!-- Education Field -->
  <div class="mb-4">
    <label for="education">Education</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['education'] ?>" name="education" id="education" readonly>
  </div>

  <!-- Contact Field -->
  <div class="mb-4">
    <label for="contact">Contact</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['contact'] ?>" name="contact" required>
  </div>

  <!-- Work Experience Field -->
  <div class="mb-4">
    <label for="work_experience">Work Experience</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['work_experience'] ?>" name="work_experience" id="work_experience" readonly>
  </div>

  <!-- Skills Field -->
  <div class="mb-4">
    <label for="skills">Skills</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['skills'] ?>" name="skills" id="skills" required>
  </div>

  <!-- Country Field -->
  <div class="mb-4">
    <label for="country">Country</label>
    <input type="text" class="form-control" value="<?php echo $_SESSION['country'] ?>" name="country" id="country" readonly>
  </div>

  <!-- Salary Field -->
  <div class="mb-4">
    <label for="salary">Salary</label>
    <input type="text" class="form-control" value="<?php echo  $_SESSION['salary'] ?>" name="salary" id="salary" readonly>
  </div>

  <!-- Image Upload Field -->
  <div class="mb-4">
    <label for="img">Choose Image</label>
    <input type="file" class="form-control" name="img" id="img">
  </div>

  <!-- Submit Button -->
  <div class="mt-3 mx-4 text-center">
    <button class="btn btn-danger btn-lg" name="update" type="submit">Update</button>
  </div>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
      $na = $_POST['name'];
      $em = $_POST['email'];
      $cont = $_POST['contact'];
      $skill = $_POST['skills'];
      $im = $_FILES['img'];
      $image = $im['name'];

      if($image == ""){
          $query = "UPDATE `cpr_tester` SET `full_name`='$na',`email`='$em',`contact_number`='$cont',`skills`='$skill' WHERE `id`=$id";
      } else {
          move_uploaded_file($im['tmp_name'],"../../images/testers/".$image);

          $query = "UPDATE `cpr_tester` SET `full_name`='$na',`email`='$em',`contact_number`='$cont',`skills`='$skill',`image`='$image' WHERE `id`=$id";
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
</form>

          </div>
          
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