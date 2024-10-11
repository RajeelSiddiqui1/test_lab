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



<!-- Bootstrap JS (for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<div class="page-wrapper">
<div class="container my-3">
        <div class="row">
            <div class="col-12">
            <form method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="text" id="search-bar" name="search" class="form-control" placeholder="Search for testers">
               
            </div>
        </form>
            </div>
        
        </div>
    </div>
  

    <!-- Area where search results will be displayed -->
    <div class="container" id="search-results">
        <!-- Results will be appended here dynamically via AJAX -->
    </div>
    <div class="container">
        <div class="row">
            <?php
            $query = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $tester_image = $row['image'];
                $check_query = "SELECT * FROM `users` WHERE `image` = '$tester_image'";
                $check_result = mysqli_query($conn, $check_query);
                $is_published = mysqli_num_rows($check_result) > 0;
            ?>

                <div class="col-md-4 mt-3">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align:center;">
                        <?php if ($is_published) { ?>
                            <img src="../../../images/users/<?php echo $row['image']; ?>" alt="" style="height:25rem;width:100%; object-fit: cover;">
                        <?php } else { ?>
                            <img src="../../../images/show_tester_to_users/8380015.jpg" alt="" style="height:25rem;width:100%; object-fit: cover;">
                        <?php } ?>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['full_name']; ?></h5>
                            <p class="card-text"><?php echo $row['email']; ?></p>
                            <!-- <p class="card-text fw-bold"><?php echo $row['department']; ?></p> -->
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#userModal"
                                data-name="<?php echo $row['full_name']; ?>"
                                data-email="<?php echo $row['email']; ?>"
                                data-department="<?php echo $row['department']; ?>"
                                data-country="<?php echo $row['country']; ?>"
                                data-contact_number="<?php echo $row['contact_number']; ?>"
                                data-image="../../../images/users/<?php echo $row['image']; ?>">Details</button>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <!-- Modal -->
            <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel">User Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="userImage" src="" alt="User Image" style="width:100%; object-fit: cover;">
                            <h5 id="userName" class="mt-3"></h5>
                            <p id="userEmail"></p>
                            <p id="userDepartment" class="fw-bold"></p>
                            <p id="userCountry" class="fw-bold"></p>
                            <p id="userContactNumber" class="fw-bold"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JavaScript to handle modal data -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var userModal = document.getElementById('userModal');

                    userModal.addEventListener('show.bs.modal', function(event) {
                        var button = event.relatedTarget; // Button that triggered the modal

                        // Extract data from the button's data-* attributes
                        var name = button.getAttribute('data-name');
                        var email = button.getAttribute('data-email');
                        var department = button.getAttribute('data-department');
                        var image = button.getAttribute('data-image');
                        var country = button.getAttribute('data-country');
                        var contact_number = button.getAttribute('data-contact_number');

                        // Update the modal's content
                        var modalTitle = userModal.querySelector('.modal-title');
                        var modalName = userModal.querySelector('#userName');
                        var modalEmail = userModal.querySelector('#userEmail');
                        var modalDepartment = userModal.querySelector('#userDepartment');
                        var modalImage = userModal.querySelector('#userImage');
                        var modalCountry = userModal.querySelector('#userCountry');
                        var modalContactNumber = userModal.querySelector('#userContactNumber');

                        modalTitle.textContent = name;
                        modalName.textContent = name;
                        modalEmail.textContent = email;
                        modalDepartment.textContent = department;
                        modalCountry.textContent = country; // Updated to correctly show country
                        modalContactNumber.textContent = contact_number; // Updated to correctly show contact number
                        modalImage.src = image;
                    });
                });
          


    $(document).ready(function() {
        $('#search-bar').keyup(function() {
            let searchQuery = $(this).val(); // Get the search term

            if (searchQuery.length > 0) {
                $.ajax({
                    url: 'live/user_list.php', // Updated path to the PHP file in the 'live' folder
                    method: 'POST',
                    data: { search: searchQuery },
                    success: function(data) {
                        $('#search-results').html(data); // Display the returned results
                    }
                });
            } else {
                $('#search-results').html(''); // Clear the results if search input is empty
            }
        });
    });

    </script>
        </div>
    </div>
</div>