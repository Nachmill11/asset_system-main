<?php
include '../condb.php';

// echo "<pre>";
// 	print_r($_POST);
// 	print_r($_FILES);
// 	echo "</pre>";
// 	exit();

$orderID = $_POST['orderID'];
$order_status = $_POST['order_status'];
$comment = $_POST['comment'];


$sql = "UPDATE d_order SET
order_status = '$order_status',
comment = '$comment'
WHERE orderID = '$orderID'";
 $result = mysqli_query($conn,$sql);


if($result){
    echo "<script>window.location='list_order_back.php?do=success';</script>";
}else{
    echo "<script>alert('ไม่สามารถปรับสถานะได้');</script>";
}

mysqli_close($conn);
