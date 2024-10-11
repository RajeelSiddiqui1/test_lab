<?php
include("../conn.php");

if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    $stmt = $conn->prepare("SELECT * FROM cpri_show_to_user WHERE fullname LIKE ? OR email LIKE ? OR skills LIKE ?");
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
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
            echo '<h5 class="card-title">' . $row['fullname'] . '</h5>';
            echo '<p class="card-text">' . $row['email'] . '</p>';
            echo '<p class="card-text fw-bold">' . $row['skills'] . '</p>';
            echo '<div class="d-flex">';
            echo '<a href="delete_published_tester.php?id=' . $row['id'] . '" class="btn btn-danger">Unpublish</a>';
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
