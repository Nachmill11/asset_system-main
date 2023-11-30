<?php
include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	print_r($_FILES);
// 	echo "</pre>";
// 	exit();

$dur_id = $_POST['dur_id'];
$date = $_POST["date"];
$dur_number = $_POST['dur_number'];
$dur_name = $_POST['dur_name'];
$number = $_POST['number'];
$d_id = $_POST['d_id'];
$c_id = $_POST['c_id'];
$price = $_POST['price'];
$dur_receive = $_POST['dur_receive'];
$status = $_POST['status'];
$detail = $_POST['detail'];
$textimg = $_POST['textimg'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'du_' . uniqid() . "." . pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/durable/" . $new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'], $image_upload_path);
} else {
    $new_image_name = "$textimg";
}

$sql = "UPDATE durable SET
        date = '$date',
        dur_number = '$dur_number',
        dur_name  = '$dur_name',
        number = '$number',
        d_id = '$d_id',
        c_id = '$c_id',
        price = '$price',
        dur_receive = '$dur_receive',
        status = '$status',
        detail = '$detail',
        photo = '$new_image_name'
        WHERE dur_id = '$dur_id' ";

$result = mysqli_query($conn, $sql);

if($result){
    echo '<script>';
    echo "window.location='list_durable.php?do=finish';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_durable.php?act=add&do=f';";
    echo '</script>';
}
mysqli_close($conn);
