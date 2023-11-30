<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();

$c_id = $_POST['c_id'];
$d_id = $_POST['d_id'];
$c_name = $_POST['c_name'];
$province_id = $_POST['province_id'];
$textimg = $_POST['textimg'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['doc_file']['tmp_name'])) {
    $new_image_name = 'cat_' . uniqid() . "." . pathinfo(basename($_FILES['doc_file']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/category/" . $new_image_name;
    move_uploaded_file($_FILES['doc_file']['tmp_name'], $image_upload_path);
} else {
    $new_image_name = "$textimg";
}

$sql = "UPDATE category SET 
	d_id = '$d_id',
	c_name = '$c_name',
    province_id = '$province_id',
    doc_file = '$new_image_name'
	WHERE c_id = '$c_id'
    ";

$result = mysqli_query($conn, $sql);

if($result){
    echo '<script>';
    echo "window.location='list_category.php?do=finish';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_category.php?act=add&do=f';";
    echo '</script>';
}
