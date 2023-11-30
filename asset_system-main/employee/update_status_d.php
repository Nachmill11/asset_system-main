<?php
include '../condb.php';


$dur_id = $_POST['dur_id'];
$status = $_POST['status'];

$sql = "UPDATE durable SET 
status = $status
WHERE dur_id = '$dur_id' ";
$result = mysqli_query($conn,$sql);


if($result){
    echo "<script>window.location='list_durable.php';</script>";
}else{
    echo "<script>alert('ไม่สามารถปรับสถานะได้');</script>";
}

mysqli_close($conn);

?>