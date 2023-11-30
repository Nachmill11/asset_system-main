<?php
include '../condb.php';
$id = $_GET['id'];

$sql = "UPDATE d_order SET order_status = 3 WHERE orderID = '$id' ";
$result = mysqli_query($conn,$sql);


if($result){
    echo '<script>';
    echo "window.location='list_order_back.php?do=success';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_order_back.php?act=add&do=f';";
    echo '</script>';
}

mysqli_close($conn);

?>