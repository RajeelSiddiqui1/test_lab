<?php
include("conn.php");

$getId = $_GET['id'];
$query = "SELECT *FROM `category` WHERE id =$getId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$folderPath = "../../images/category/".$row['image'];

if(file_exists($folderPath)){
    $query1 = "DELETE FROM `category` WHERE id='$getId'";
    $res = mysqli_query($conn, $query1);
    unlink($folderPath);
    echo "<script>
    alert(' Category was Deleted');
    window.location.href = 'category_detail.php';
    </script>";
}

else{
    echo "<script>
    alert('Something went worng!!!!');
    </script>";
}
?>