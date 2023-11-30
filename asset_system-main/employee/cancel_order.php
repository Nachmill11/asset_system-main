<?php
include '../condb.php';
$ids = $_GET['id'];

$sql = "UPDATE tb_order SET order_status = 0 WHERE orderID = '$ids' ";
$result = mysqli_query($conn,$sql);

$sql4 =" SELECT * FROM order_detail 
WHERE OrderID = '".$_GET['id']."'";
   $result2 = mysqli_query($conn,$sql4);
   while( $data = mysqli_fetch_array($result2)) {
      
           $pro_id  =$data['pro_id'];
           $order_Qty  =$data['order_Qty'];
                   
           $sql2 ="SELECT * FROM product
                   WHERE pro_id = '$pro_id'";
           $result3 = mysqli_query($conn,$sql2);
           $data2 = mysqli_fetch_array($result3);

           $sql3 = "UPDATE product
                   SET amount =  amount + $order_Qty 
                   WHERE pro_id = '$pro_id'";
           mysqli_query($conn,$sql3);
     
   }
if($result){
    echo '<script>';
    echo "window.location='report_order.php?do=delete';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='report_order.php?act=add&do=f';";
    echo '</script>';
}

mysqli_close($conn);
