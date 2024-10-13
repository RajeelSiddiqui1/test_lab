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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<div class="page-wrapper px-3">
<div class="container my-3">
        <div class="row">
            <div class="col-12">
            <form method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="text" id="search-bar" name="search" class="form-control" placeholder="Search......">
               
            </div>
        </form>
            </div>
        
        </div>
    </div>
  

    <!-- Area where search results will be displayed -->
    <div class="container" id="search-results">
        <!-- Results will be appended here dynamically via AJAX -->
    </div>

<div class="container my-5">
    <div class="row">
        <h2 class="">Tester Tests Results</h2>
    </div>

    <div class="row my-3">
        <div class="table-responsive"> <!-- Added table-responsive class to make it scrollable on smaller screens -->
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Test Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Desc</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `tbl_products`";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
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
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<script>
     $(document).ready(function() {
        $('#search-bar').keyup(function() {
            let searchQuery = $(this).val(); // Get the search term

            if (searchQuery.length > 0) {
                $.ajax({
                    url: 'live/tester_res_user.php', // Updated path to the PHP file in the 'live' folder
                    method: 'POST',
                    data: { search: searchQuery },
                    success: function(data) {
                        $('#search-results').html(data); // Display the returned results
                    }
                });
            } else {
                $('#search-results').html(''); // Clear the results if search input is empty
            }
        });
    });

</script>