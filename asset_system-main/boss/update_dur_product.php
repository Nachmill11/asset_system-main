<?php
include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	print_r($_FILES);
// 	echo "</pre>";
// 	exit();
$status = $_POST['status'];
$sql = "UPDATE durable SET
        date = '$date',
        dur_number = '$dur_number',
        dur_name  = '$dur_name',
        number = '$number',
        d_id = '$d_id',
        c_id = '$c_id',
        price = '$price',
        dur_receive = '$dur_receive',
        dur_position = '$dur_position',
        dur_change = '$dur_change',
        status = '$status',
        detail = '$detail',
        photo = '$new_image_name'
        WHERE dur_id = '$dur_id' ";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script> alert('แก้ไขข้อมูลเรียบร้อยแล้ว'); </script>";
    echo "<script> window.location = 'list_durable.php'; </script>";
} else {
    echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
    echo "<script> window.location = 'list_durable.php'; </script>";
}
mysqli_close($conn);
