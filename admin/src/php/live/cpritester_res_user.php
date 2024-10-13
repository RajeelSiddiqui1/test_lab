<?php
include("../conn.php");

if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    $stmt = $conn->prepare("SELECT * FROM cpri_product WHERE product_id LIKE ? OR test_id LIKE ? OR product_name LIKE ?");
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
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['test_id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo substr($row['product_description'],0,60),'...' ?></td>
                            <td><?php echo $row['product_quantity']; ?></td>
                            <td>$<?php echo $row['product_price']; ?></td>
                            <td><img src="../../../images/products/<?php echo $row['product_image']?>"  height="100" width="150"></td>
                            <td><?php echo $row['status']; ?></td>
                            
                          
                        </tr>
                
                </tbody>
            </table>
     <?php   }
    } else {
        echo '<div class="col-12 text-center mt-4"><p class="text-danger">No testers found for your search: <strong>' . htmlspecialchars($searchQuery) . '</strong></p></div>';
    }
}
?>
