<?php
include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	echo "</pre>";
// 	exit();
$member_id = $_POST['member_id'];
$m_level = $_POST['m_level'];

$sql = "UPDATE member SET 
m_level = $m_level
WHERE member_id = '$member_id' ";
$result = mysqli_query($conn,$sql);


if($result){
    echo '<script>';
    echo "window.location='list_member.php?do=f';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_member.php?act=add&do=f';";
    echo '</script>';
}

mysqli_close($conn);

?>