<?php
include '../condb.php';

// echo "<pre>";
// 	print_r($_POST);
// 	print_r($_FILES);
// 	echo "</pre>";
// 	exit();
$member_id = $_POST['member_id'];
$m_level = $_POST['m_level'];

$sql = "UPDATE member SET
m_level = '$m_level'
WHERE member_id = '$member_id'";
$result = mysqli_query($conn,$sql);


if($result){
    echo "<script>window.location='list_member.php?do=success';</script>";
}else{
    echo "<script>alert('ไม่สามารถปรับสถานะได้');</script>";
}

mysqli_close($conn);
