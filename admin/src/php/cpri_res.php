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

<div class="container my-5">
    <div class="row">
        <h2 class="">CPRI Tester Login Request</h2>
    </div>

    <div class="row my-3">
        <div class="table-responsive"> <!-- Added table-responsive class to make it scrollable on smaller screens -->
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Education</th>
                        <th scope="col">Skills</th>
                        <th scope="col">Country</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Experience</th>
                        <th scope="col">Portfolio</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `cpr_tester` WHERE status = 'pending' ORDER BY id ASC";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['education']; ?></td>
                            <td><?php echo $row['skills']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td><?php echo $row['contact_number']; ?></td>
                            <td><?php echo $row['work_experience']; ?></td>
                            <td><a href="<?php echo $row['portfolio_url']; ?>" target="_blank">Portfolio</a></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td>
                               <form action="cpri_res.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <input class="my-2" type="submit" name="approved" value="Approved">
                                <input type="submit" name="deny" value="Deny">
                               </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<?php

if(isset($_POST['approved'])) {
    $id = $_POST['id'];

    $query = "UPDATE cpr_tester SET status = 'approved' WHERE id=$id";
    $result = mysqli_query($conn,$query);
    
    echo"<script>alert('User Approved!!!')</script>
    window.location.href='tester_res.php'";
}

if(isset($_POST['deny'])){
    $id = $_POST['id'];

    $query = "DELETE FROM cpr_tester WHERE id=$id";
    $result = mysqli_query($conn,$query);

    echo"<script>alert('User Die!!!')</script>
    window.location.href='tester_res.php'";
}