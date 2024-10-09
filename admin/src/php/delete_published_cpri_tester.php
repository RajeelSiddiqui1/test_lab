<?php
include("conn.php");

$getid = $_GET['id'];
$query = "DELETE FROM `cpri_show_to_user` WHERE id = $getid";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<script>
alert('Un Published');
window.location.href='Published_cpri_tester.php';
</script>";
} else {
    echo "<script>alert('Error during insertion.');</script>";
}