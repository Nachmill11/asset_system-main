<?php
include '../condb.php';
$orderID = $_POST['orderID'];
$status = $_POST['status'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
    $new_image_name = 's_'.uniqid().".".pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/file/".$new_image_name;
    move_uploaded_file($_FILES['file2']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

$sql = "UPDATE tb_order SET
status = '$status',
file = '$new_image_name'
WHERE orderID = '$orderID'
";
$result = mysqli_query($conn,$sql);
if($result){
    echo '<script>';
    echo "window.location='report_order.php?do=submit';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='report_order.php?act=add&do=f';";
    echo '</script>';
}

mysqli_close($conn);

?>