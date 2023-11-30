<?php
include '../condb.php';
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();
$pro_name = $_POST['pro_name'];
$detail = $_POST['detail'];
$type_id = $_POST['type_id'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$unit_id = $_POST['unit_id'];

$check = "SELECT * FROM product WHERE pro_name = '$pro_name'";
$query = mysqli_query($conn, $check);
$num = mysqli_num_rows($query);
if ($num > 0) {
    echo '<script>';
    echo "window.location='list_product_detail.php?act=add&do=d';";
    echo '</script>';
}

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_' . uniqid() . "." . pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/" . $new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'], $image_upload_path);
} else {
    $new_image_name = "";
}

$sql = "INSERT INTO product (pro_name,detail,type_id,price,amount,unit_id,image)
        values('$pro_name','$detail','$type_id','$price','$amount','$unit_id','$new_image_name')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo '<script>';
    echo "window.location='list_product_detail.php?do=success';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='list_product_detail.php?act=add&do=f';";
    echo '</script>';
}
mysqli_close($conn);
