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

<?php
// Handle form submission for inserting data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])) {
    // Prepare data for insertion
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $work_experience = $_POST['work_experience'];
    $portfolio = $_POST['portfolio'];
    $country = $_POST['country'];
    $image = $_FILES['image']['name'];
    $category_id = $_POST['category_id'];

    // Move the uploaded file to the desired location (update path as necessary)
    move_uploaded_file($_FILES['image']['tmp_name'], "../../../images/testers/" . $image);

    // Insert into the database
    $stmt = $conn->prepare("INSERT INTO `show_tester_to_user` (`fullname`, `email`, `education`, `skills`, `work_experience`, `portfolio`, `country`, `image`, `category_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $fullname, $email, $education, $skills, $work_experience, $portfolio, $country, $image, $category_id);
    
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Record inserted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
}

// Include header file
?>

<div class="page-wrapper px-5">
    <div class="col-lg-8 col-6 text-left">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for testers">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $searchQuery = isset($_POST['search']) ? trim($_POST['search']) : '';

            if (!empty($searchQuery)) {
                $stmt = $conn->prepare("SELECT * FROM show_tester_to_user WHERE fullname LIKE ?");
                $searchTerm = "%$searchQuery%";
                $stmt->bind_param("s", $searchTerm);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo '<div class="row">';
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 my-2">
                            <div class="product-item bg-light mb-4" style="box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="../../../images/testers/<?php echo $row['image']; ?>" alt="">
                                  
                                </div>
                                <div class="text-center py-4">
                                    <h4><?php echo $row['fullname']; ?></h4>
                                    <p class="text-truncate px-2"><?php echo $row['email']; ?></p>
                                    <p class="text-truncate fw-bold"><?php echo $row['skills']; ?></p>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <!-- <h5>$<?php echo $row['price']; ?></h5>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                    echo '</div>';
                } else {
                    echo '<div class="col-12 text-center mt-4"><p class="text-danger">No testers found for your search: <strong>' . htmlspecialchars($searchQuery) . '</strong></p></div>';
                }
            } else {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    echo '<div class="col-12 mt-4"><p>Please enter a search term to see results.</p></div>';
                }
            }
            ?>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <?php
            $query = "SELECT * FROM `show_tester_to_user`";
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
                                <a href="delete_published_tester.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Un Published</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
