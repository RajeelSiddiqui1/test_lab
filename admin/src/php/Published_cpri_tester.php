<?php
// Include the database connection and session start
include("conn.php");

session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("location:login.php");
    exit();
}
?>



<?php include("header.php"); ?>

<div class="page-wrapper px-5">
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

    <div class="container my-5">
        <div class="row">
            <?php
            $query = "SELECT * FROM `cpri_show_to_user`";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <img src="../../../images/testers/<?php echo $row['image']; ?>" alt="" style="height:25rem;width:100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['fullname']; ?></h5>
                            <p class="card-text"><?php echo $row['email']; ?></p>
                            <p class="card-text fw-bold"><?php echo $row['skills']; ?></p>
                            <div class="d-flex">
                                <a href="delete_published_tester.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Unpublish</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- jQuery and AJAX to handle live search -->

<script>
    $(document).ready(function() {
        $('#search-bar').keyup(function() {
            let searchQuery = $(this).val(); // Get the search term

            if (searchQuery.length > 0) {
                $.ajax({
                    url: 'live/Published_cpri_tester.php', // Updated path to the PHP file in the 'live' folder
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
