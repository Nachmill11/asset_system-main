<?php
include '../condb.php';


$orderID = $_POST['orderID'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
    $new_image_name = 'pay_'.uniqid().".".pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/payment/".$new_image_name;
    move_uploaded_file($_FILES['file2']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

$sql = "INSERT INTO payment(orderID,pay_image)
value('$orderID','$new_image_name')";
$result = mysqli_query($conn,$sql);
if($result){
    echo '<script>';
    echo "window.location='report_order_d.php?do=ok';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='report_order_d.php?act=add&do=f';";
    echo '</script>';
}

mysqli_close($conn);

?>