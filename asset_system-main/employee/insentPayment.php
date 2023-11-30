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
    echo "<script> alert('บันทึกข้อมูลการชำระเรียบร้อยแล้ว'); </script>";
    echo "<script> window.location = 'report_order.php'; </script>";
}else{
    echo "<script> alert('บันทึกข้อมูลการชำระไม่สำเร็จ'); </script>";
    echo "<script> window.location = 'report_order.php'; </script>";
}

mysqli_close($conn);

?>