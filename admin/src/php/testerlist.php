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

    <div class="container" id="search-results">
        <!-- Results will be appended here dynamically via AJAX -->
    </div>

    <div class="conatiner">
        <div class="row text-center">
            <h2 class="p-5">Tester Lists</h2>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM `testers`";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $tester_full_name = $row['full_name'];
                $check_query = "SELECT * FROM `cpri_show_to_user` WHERE `fullname` = '$tester_full_name'";
                $check_result = mysqli_query($conn, $check_query);
                $is_published = mysqli_num_rows($check_result) > 0;
            ?>

                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <img src="../../../images/testers/<?php echo $row['image'] ?>" alt="" style="height:25rem;width:100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['full_name'] ?></h5>
                            <h6 class="text-info"><?php echo $row['email'] ?></h6>
                            <p class="card-text"><?php echo $row['skills'] ?></p>
                            <p class="card-text fw-bold"><?php echo $row['salary'] ?></p>
                            <div class="d-flex">
                                <?php if ($is_published) { ?>
                                    <button class="btn btn-success" disabled>Published</button>
                                <?php } else { ?>
                                    <a href="cpri_tester_pulished.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Publish</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#search-bar').keyup(function() {
            let searchQuery = $(this).val();
            if (searchQuery.length > 0) {
                $.ajax({
                    url: 'live/testerlist.php',
                    method: 'POST',
                    data: { search: searchQuery },
                    success: function(data) {
                        $('#search-results').html(data);
                    }
                });
            } else {
                $('#search-results').html('');
            }
        });
    });
</script>
