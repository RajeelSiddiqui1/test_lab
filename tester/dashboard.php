

<?php
include('header.php');
?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="container">
                  <div class="row">
                    <div class="col-12 mb-5">
                      <h3 class="text-center mt-4 mb-5">Profile Picture</h3>
                      <img src="user/<?php echo $row['user_img'];?>" class="img-fluid" alt="">
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="container">
                  <div class="row">
                    <div class="col-12 mb-5">
                      <h3>Basic Info</h3>
                    </div>
                  </div>
                </div>
                

                <form method="post" enctype="multipart/form-data">
                <div class="preview-list">
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                    </div>
                    <div class="preview-item-content mb-2 d-sm-flex flex-grow">
                      <div class="flex-grow col-2">
                        <h6 class="text-muted mb-0">First Name :</h6>
                      </div>
                      <div class="col-10 mr-auto text-md-left text-sm-right pt-2 pt-sm-0">
                      <input type="text" class="form-control" name="first_name" value="<?php echo $row['First_name'];?>">
                      </div>
                    </div>
                  </div>
                  </div>

                <div class="preview-list">
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                    </div>
                    <div class="preview-item-content mb-2 d-sm-flex flex-grow">
                      <div class="flex-grow col-2">
                        <h6 class="text-muted mb-0">Last Name :</h6>
                      </div>
                      <div class="col-10 mr-auto text-md-left text-sm-right pt-2 pt-sm-0">
                      <input type="text" class="form-control" name="last_name" value="<?php echo $row['Last_name']; ?>">
                      </div>
                    </div>
                  </div>
                  </div>


                  <div class="preview-list">
                    <div class="preview-item border-bottom">
                      <div class="preview-thumbnail">
                      </div>
                      <div class="preview-item-content my-2 d-sm-flex flex-grow">
                        <div class="flex-grow col-2">
                          <h6 class="text-muted mb-0">Email :</h6>
                        </div>
                        <div class="col-10 mr-auto text-md-left text-sm-right pt-2 pt-sm-0">
                          <h5 class="text-muted mb-0">
                          <h5 class="text-muted mb-0"><?php echo $_SESSION['email']; ?></h5>
                          </h5>
                        </div>
                      </div>
                    </div>
                    </div>


                    <div class="preview-list">
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                        </div>
                        <div class="preview-item-content my-2 d-sm-flex flex-grow">
                          <div class="flex-grow col-2">
                            <h6 class="text-muted mb-0">Joined :</h6>
                          </div>
                          <div class="col-10 mr-auto text-md-left text-sm-right pt-2 pt-sm-0">
                          <h5 class="text-muted mb-0"><?php echo $_SESSION['created_on']; ?></h5>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="preview-list">
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                        </div>

                        <div class="input-group mx-4">
                        <input type="file" class="form-control" id="inputGroupFile02" name="img">
                        </div>

                      </div>
                      <div class="mt-3 mx-4 justify-content-center">
                        <button class="btn btn-danger btn-lg" name="update" type="submit">Update</button>
                      </div>
                    </div>
                </form>
                  



            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer> -->


    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<?php
// session_start();
// echo $_SESSION['user_id'] ;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $fa = $_POST['first_name'];
  $la = $_POST['last_name'];
  $im = $_FILES['img'];
  $image = $im['name'];

  $folder = "user/".$image;

      if($im['tmp_name'] != "")
      {
        $query = "UPDATE `users` SET `First_name`='$fa', `Last_name`='$la', `user_img`='$image' where `user_id` = $userid";
      }
      else{
        $query = "UPDATE `users` SET `First_name`='$fa', `Last_name`='$la' where `user_id` = $userid";
      }
      move_uploaded_file($im['tmp_name'], $folder);
      $result = mysqli_query($conn, $query);
      echo "<script>
      alert('Profile has been updated');
      window.location.href='dashboard.php';
      </script>";
     echo "
            <script>
            alert('Error occurred while updating');
            </script>";
}
?>
</form>

</div>
</div>
</div>
</div>
</div>



<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<!-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer> -->


<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->