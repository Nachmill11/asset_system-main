<?php
include '../condb.php';
$ids = $_GET['id'];

$sql = "UPDATE d_order SET order_status = 2 WHERE orderID = '$ids' ";
$result = mysqli_query($conn,$sql);
if($result){
    echo '<script>';
    echo "window.location='report_order_d.php?do=success';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='report_order_d.php?act=add&do=f';";
    echo '</script>';
}


mysqli_close($conn);

?>