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
<div class="row ">
<h2 class="">Category Deatils</h2>
</div>
<div class="row">
    <a href="category.php" class="btn btn-info">Add Category</a>
</div>
<div class="row my-3">
<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col text-center">About</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

  <?php
  $query = "SELECT *FROM `category`";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
  <tbody>
    <tr>
    <th><?php echo $row['id']?></th>
      <th><?php echo $row['c_name']?></th>
      <th><?php echo substr($row['c_desc'],0,320,).'...'?></th>
      <td><img src="../../../images/category/<?php echo $row['c_image'] ?>" style="height:100px;width:100px; border: 1px solid #ccc;" alt=""></td>
      <td><a href="category_edit.php?id=<?php echo $row['id']?>" class="btn btn-warning">Edit</a></td>
      <td><a href="delete_category.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a</td>
    </tr>
  </tbody>
<?php }
?>
</table>
</div>
</div>

</div>

<script>
     $(document).ready(function() {
        $('#search-bar').keyup(function() {
            let searchQuery = $(this).val(); // Get the search term

            if (searchQuery.length > 0) {
                $.ajax({
                    url: 'live/category_details.php', // Updated path to the PHP file in the 'live' folder
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