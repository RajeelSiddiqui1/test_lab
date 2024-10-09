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
            <h2 class="p-5">Tester Lists</h2>
        </div>
        <div class="row">
            <?php
            $query = "SELECT * FROM `testers`";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                // Check if this tester is already published in `show_tester_to_user`
                $tester_full_name = $row['full_name'];
                $check_query = "SELECT * FROM `show_tester_to_user` WHERE `fullname` = '$tester_full_name'";
                $check_result = mysqli_query($conn, $check_query);
                $is_published = mysqli_num_rows($check_result) > 0;
            ?>

                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <img src="../../../images/testers/<?php echo $row['image'] ?>" alt="" style="height:25rem;width:100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['full_name'] ?></h5>

                            <!-- Card Description -->
                            <p class="card-text"><?php echo $row['skills'] ?></p>

                            <p class="card-text fw-bold"><?php echo $row['salary'] ?></p>
                            <div class="d-flex">
                                <?php if ($is_published) { ?>
                                    <!-- If already published, show 'Published' as a disabled button -->
                                    <button class="btn btn-success" disabled>Published</button>
                                    

                                <?php } else { ?>
                                    <!-- If not published, show the 'Publish' button -->
                                    <a href="tester_pulished.php?id=<?php echo $row['id'] ?>" class="btn btn-primary ">Publish</a>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
</div>