<?php
include '../condb.php';


$orderID = $_POST['orderID'];
$status = $_POST['status'];
$comment = $_POST['comment'];

//อัพโหลดรูปภาพ


$sql = "UPDATE d_order SET
status = '$status',
comment = '$comment'
WHERE orderID = '$orderID'
";
$result = mysqli_query($conn,$sql);
if($result){
    echo '<script>';
    echo "window.location='report_order_d.php?do=submit';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='report_order_d.php?act=add&do=f';";
    echo '</script>';
}

mysqli_close($conn);

?>