<?php
include("../conn.php");

if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    $stmt = $conn->prepare("SELECT * FROM cpr_tester WHERE full_name LIKE ? OR email LIKE ? OR skills LIKE ? OR salary LIKE ?");
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-lg-4 col-md-6 col-sm-12 my-2">';
            echo '<div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
            echo '<img src="../../../images/testers/' . $row['image'] . '" alt="" style="height:25rem;width:100%;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['full_name'] . '</h5>';
            echo '<h6>' . $row['email'] . '</h6>';
            echo '<p class="card-text fw-bold">' . $row['skills'] . '</p>';
            echo '<p class="card-text fw-bold">' . $row['salary'] . '</p>';
            echo '<div class="d-flex">';
            echo '<button class="btn btn-success" disabled>Published</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="col-12 text-center mt-4"><p class="text-danger">No testers found for your search: <strong>' . htmlspecialchars($searchQuery) . '</strong></p></div>';
    }
}
?>