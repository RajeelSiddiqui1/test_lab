<?php
include("conn.php");

$getid = $_GET['id'];

$query = "SELECT *FROM `category` WHERE id = $getid";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);


$Folder_Path = "../../../images/category/".$row['c_image'];

if(file_exists($Folder_Path)){
    $query1 = "DELETE FROM `category` WHERE id='$getid'";
    $result = mysqli_query($conn,$query1);
    unlink($Folder_Path);

    echo "<script>
    alert(' Category was Deleted');
    window.location.href = 'category_details.php';
    </script>";
}

else{
    echo "<script>
    alert('Something went worng!!!!');
    </script>";
}

