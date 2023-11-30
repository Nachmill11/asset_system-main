<?php
include '../condb.php';
$id = $_GET['id'];

$sql = "UPDATE tb_order SET order_status = 3 WHERE orderID = '$id' ";
$result = mysqli_query($conn,$sql);


if($result){
    echo "<script>window.location='list_order_back.php';</script>";
}else{
    echo "<script>alert('ไม่สามารถปรับสถานะได้');</script>";
}

mysqli_close($conn);

?>