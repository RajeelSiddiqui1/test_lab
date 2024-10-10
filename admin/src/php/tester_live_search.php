<?php
include("conn.php");

if (isset($_POST['query'])) {
    $search = $_POST['query'];

    // Search in the testers table based on full_name, email, or skills
    $query = "SELECT * FROM testers WHERE full_name LIKE ? OR email LIKE ? OR skills LIKE ? LIMIT 10";
    
    // Prepare the statement to avoid SQL injection
    $stmt = $conn->prepare($query);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Output search result as a card (same style as on the main page)
            echo '<div class="col-md-4">';
            echo '<div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
            echo '<img src="../../../images/testers/' . $row['image'] . '" alt="" style="height:25rem;width:100%;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['full_name'] . '</h5>';
            echo '<p class="card-text">' . $row['email'] . '</p>';
            echo '<p class="card-text fw-bold">' . $row['skills'] . '</p>';
            echo '<div class="d-flex">';
            echo '<a href="delete_published_tester.php?id=' . $row['id'] . '" class="btn btn-danger">Unpublish</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // If no results found, display a default card with ID or message
        echo '<div class="col-md-4">';
        echo '<div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">No Results Found</h5>';
        echo '<p class="card-text">Try searching with a different name or skill.</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    $stmt->close();
    
}
?>

