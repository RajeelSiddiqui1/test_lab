<?php
include("../conn.php");

if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    $stmt = $conn->prepare("SELECT * FROM users WHERE full_name LIKE ? OR email LIKE ? OR department LIKE ?");
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4 col-md-6 col-sm-12 my-2">';
            echo '<div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
            echo '<img src="../../../images/users/' . $row['image'] . '" alt="" style="height:25rem;width:100%;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['full_name'] . '</h5>';
            echo '<h6>' . $row['email'] . '</h6>';
          
            echo '<div class="d-flex">';
            // echo '<button class="btn btn-success" disabled>Published</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="col-12 text-center mt-4"><p class="text-danger">No users found for your search: <strong>' . htmlspecialchars($searchQuery) . '</strong></p></div>';
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

