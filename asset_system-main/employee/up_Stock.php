<?php
include '../condb.php';
$ids = $_POST['pid'];
$nums = $_POST['pnum'];

$sql = "UPDATE product SET amount = amount + $nums WHERE pro_id = '$ids' ";
$result = mysqli_query($conn,$sql);

if($result){
    echo "<script> alert('เพิ่มจำนวนสต็อกเรียบร้อยแล้ว'); </script>";
    echo "<script> window.location = 'list_product_detail.php'; </script>";
}else{
    echo "<script> alert('เพิ่มจำนวนสต็อกเรียบร้อยแล้วไม่สำเร็จ'); </script>";
}
?>