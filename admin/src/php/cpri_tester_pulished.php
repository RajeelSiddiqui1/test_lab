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
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php

                $getid = $_GET['id'];

                $query = "SELECT t.id, t.full_name, t.email, t.education, t.skills, t.work_experience, t.portfolio_url, t.country, t.image, t.category_id, c.c_name AS category_name
                FROM cpr_tester t
                INNER JOIN category c ON t.category_id = c.id
                WHERE t.id = $getid";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);

                // $tester_full_name = $row['full_name'];
                // $check_query = "SELECT * FROM `show_tester_to_user` WHERE `fullname` = '$tester_full_name'";
                // $result = mysqli_query($conn, $check_query);
                // $is_published = mysqli_num_rows($result)>0;
                ?>

                <form method="POST" enctype="multipart/form-data" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" class="p-3">
                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="fullName">Full Name</label><br>
                            <input type="text" value="<?php echo $row['full_name']; ?>" name="fullName" class="form-control" readonly>
                        </div>

                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="email">Email</label><br>
                            <input type="email" value="<?php echo $row['email']; ?>" name="email" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="education">Education</label><br>
                            <input type="text" value="<?php echo $row['education']; ?>" name="education" class="form-control" readonly>
                        </div>

                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="skills">Skills</label><br>
                            <input type="text" value="<?php echo $row['skills']; ?>" name="skills" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="work_experience">Work Experience</label><br>
                            <input type="number" value="<?php echo $row['work_experience']; ?>" name="work_experience" class="form-control" readonly>
                        </div>

                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="portfolio">Portfolio URL</label><br>
                            <input type="url" value="<?php echo $row['portfolio_url']; ?>" name="portfolio" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="country">Country</label><br>
                            <input type="text" value="<?php echo $row['country']; ?>" name="country" class="form-control" readonly>
                        </div>

                        <div class="col-md-6" style="margin-bottom: 15px;">
                            <label for="category">Category</label><br>
                            <input type="text" value="<?php echo $row['category_name']; ?>" name="category" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12" style="margin-bottom: 15px;">
                            <label for="image">Image</label><br>
                            <!-- Display the existing image -->
                            <img src="../../../images/testers/<?php echo $row['image']; ?>" alt="Tester Image" style="width: 200px; height: auto;"><br>
                            <!-- Pass the existing image name as a hidden input -->
                            <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                        </div>
                    </div>

                    <div class="col-md-12 d-grid" style="margin-top: 20px;">
                        <button class="btn btn-info" type="submit" name="send">Submit</button>
                    </div>
                    <?php
                    if (isset($_POST['send'])) {
                        $fullName = $_POST['fullName'];
                        $email = $_POST['email'];
                        $education = $_POST['education'];
                        $skills = $_POST['skills'];
                        $work_experience = $_POST['work_experience'];
                        $portfolio = $_POST['portfolio'];
                        $country = $_POST['country'];
                        $image = $_POST['image'];
                        $category_id = $row['category_id'];

                        // Remove "http://" or "https://" from portfolio URL and image
                        $portfolio_url_without_http = preg_replace('#^https?://#', '', $portfolio);
                        $image_without_http = preg_replace('#^https?://#', '', $image);

                        // Insert into the first table (e.g., cpri_show_to_user)
                        $query = "INSERT INTO `cpri_show_to_user` (`fullname`, `email`, `education`, `skills`, `work_experience`, `portfolio`, `country`, `image`, `category_id`) 
              VALUES ('$fullName', '$email', '$education', '$skills', '$work_experience', '$portfolio_url_without_http', '$country', '$image_without_http', $category_id)";

                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            // Optionally, insert the same image URL into another table (you can adapt this query)
                            $query2 = "INSERT INTO `another_table` (`image_link`) VALUES ('$image_without_http')";
                            $result2 = mysqli_query($conn, $query2);

                            if ($result2) {
                                echo "<script>
                    alert('Published');
                    window.location.href='cpritesterlist.php';
                  </script>";
                            } else {
                                echo "<script>alert('Error during the second insertion.');</script>";
                            }
                        } else {
                            echo "<script>alert('Error during insertion.');</script>";
                        }
                    }
                    ?>

                </form>

            </div>
        </div>
    </div>
</div>

