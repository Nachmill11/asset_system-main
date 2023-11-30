<?php
include '../condb.php';
$ids = $_POST['pid'];
$nums = $_POST['pnum'];
$unit = $_POST['unit'];
$come = $_POST['come'];



$sql = "UPDATE product SET amount = amount + $nums WHERE pro_id = '$ids' ";
$result = mysqli_query($conn,$sql);

$sql2 = "INSERT INTO amount (pro_id,amount,unit,come) values('$ids','$nums','$unit','$come')";
$result2 = mysqli_query($conn,$sql2);

if($result){
    echo '<script>';
    echo "window.location='list_product_detail.php?do=ok';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_product_detail.php?act=add&do=f';";
    echo '</script>';
}
?>