<?php
include("../conn.php");

if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    $stmt = $conn->prepare("SELECT * FROM category WHERE id LIKE ? OR c_desc LIKE ? OR c_name LIKE ?");
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">

                <tbody>

                    <tr>
                    <tr>
                        <th><?php echo $row['id'] ?></th>
                        <th><?php echo $row['c_name'] ?></th>
                        <th><?php echo substr($row['c_desc'], 0, 320,) . '...' ?></th>
                        <td><img src="../../../images/category/<?php echo $row['c_image'] ?>" style="height:100px;width:100px; border: 1px solid #ccc;" alt=""></td>
                        <td><a href="category_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="delete_category.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a< /td>
                    </tr>


                    </tr>

                </tbody>
            </table>
<?php   }
    } else {
        echo '<div class="col-12 text-center mt-4"><p class="text-danger">No testers found for your search: <strong>' . htmlspecialchars($searchQuery) . '</strong></p></div>';
    }
}
?>