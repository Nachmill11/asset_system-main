<?php
include '../condb.php';
$ids = $_GET['id'];

$sql = "UPDATE d_order SET order_status = 0 WHERE orderID = '$ids' ";
$result = mysqli_query($conn,$sql);

$sql2 =" SELECT * FROM d_order_detail
 WHERE orderID = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sql2);
    while( $data = mysqli_fetch_array($result)) { 
        $dur_id  =$data['dur_id'];
            $sql2 ="SELECT * FROM durable
                    WHERE dur_id = '$dur_id'";
            $result2 = mysqli_query($conn,$sql);

            $sql3 = "UPDATE durable
                    SET status = '1'
                    WHERE dur_id = '$dur_id'";
            mysqli_query($conn,$sql3);
      
    }
    if($result){
        echo '<script>';
        echo "window.location='report_order_d.php?do=delete';";
        echo '</script>';
        }else{
        echo '<script>';
        echo "window.location='report_order_d.php?act=add&do=f';";
        echo '</script>';
    } 

mysqli_close($conn);

?>