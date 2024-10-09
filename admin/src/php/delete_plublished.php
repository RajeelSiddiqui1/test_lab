<?php
include("conn.php");

$getid = $_GET['id'];

$query = "SELECT *FROM `show_tester_to_user` WHERE id = $getid";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$folder_Path = "../../../images/show_tester_to_users/".$row['image'];

if(file_exists($folder_Path)){
    $query1 = "DELETE FROM `show_tester_to_user` WHERE id='$getId'";
    $result = mysqli_query($conn,$query1);
    unlink($folder_Path);
    echo "<script>
    alert(' Un-Published');
    window.location.href = 'testerlist.php';
    </script>";
}
else{
    echo "<script>
    alert(' Error');
    window.location.href = 'testerlist.php';
    </script>";
 
}