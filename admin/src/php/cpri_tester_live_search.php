<?php
include("conn.php");
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login.php");
    exit();
}
include("header.php");
?>

<div class="page-wrapper px-5">
    <div class="container mt-5">
        <h1 class="text-center">Search Testers</h1>

        <!-- Search input field -->
        <input type="text" id="search" class="form-control" placeholder="Search for testers by name, email, or skills..." autocomplete="off">

        <!-- Cards will be dynamically updated here -->
        <div id="card-results" class="row mt-4">
            <!-- Default cards displayed on page load -->
            <?php
            $query = "SELECT * FROM cpr_tester";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <img src="../../../images/testers/<?php echo $row['image']; ?>" alt="" style="height:25rem;width:100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['full_name']; ?></h5>
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

<script>
    $(document).ready(function() {
        // When the user types in the search box
        $("#search").on("input", function() {
            var query = $(this).val();
            if (query.length > 1) { // Start searching after two characters
                $.ajax({
                    url: "Published_cpri_tester.php", // PHP file to handle the request
                    method: "POST",
                    data: { query: query },
                    success: function(data) {
                        $("#card-results").html(data); // Update the cards with the filtered results
                    }
                });
            } else {
                // Clear the results when query is empty or less than 2 characters
                $("#card-results").html(''); // Clear the cards if no query
            }
        });
    });
</script>

<?php
// Handling the search query for live search
if (isset($_POST['query'])) {
    $search = $_POST['query'];

    // Search in the testers table based on full_name, email, or skills
    $query = "SELECT * FROM cpr_tester WHERE full_name LIKE ? OR email LIKE ? OR skills LIKE ? LIMIT 10";
    
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
