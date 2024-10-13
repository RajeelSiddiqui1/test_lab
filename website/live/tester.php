<?php
include("../conn.php");

if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    $stmt = $conn->prepare("SELECT * FROM show_tester_to_user WHERE fullname LIKE ? OR email LIKE ? OR skills LIKE ?");
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="col-lg-6 mt-3" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member d-flex align-items-start">
                    <div class="pic">
                        <img src="../images/testers/<?php echo $row['image']; ?>" height="150" width="100%" alt="Tester Image">
                    </div>
                    <div class="member-info">
                        <h4><?php echo $row['fullname']; ?></h4>
                        <span><?php echo $row['email']; ?></span>
                        <p><strong class="text-black">Education: </strong><?php echo $row['education']; ?></p>
                        <!-- <h6><strong class="text-black">Category: </strong><?php echo $row['c_name']; ?></h6> -->
                        <!-- Modal Trigger Button -->
                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#testerModal" 
                          data-fullname="<?php echo $row['fullname']; ?>"
                          data-email="<?php echo $row['email']; ?>"
                          data-education="<?php echo $row['education']; ?>"
                          data-skills="<?php echo $row['skills']; ?>"
                          data-work_experince	="<?php echo $row['work_experince']; ?>"
                          data-protfolio="<?php echo $row['protfolio']; ?>"
                          data-country="<?php echo $row['country']; ?>"
                          data-image="<?php echo $row['image']; ?>"
                        >
                          View Details
                        </button>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        echo '<div class="col-12 text-center mt-4"><p class="text-danger">No testers found for your search: <strong>' . htmlspecialchars($searchQuery) . '</strong></p></div>';
    }
}
?>
