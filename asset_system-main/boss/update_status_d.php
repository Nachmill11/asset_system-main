<?php
include '../condb.php';


$dur_id = $_POST['dur_id'];
$status = $_POST['status'];

$sql = "UPDATE durable SET 
status = $status
WHERE dur_id = '$dur_id' ";
$result = mysqli_query($conn,$sql);


if($result){
    echo '<script>';
    echo "window.location='list_durable.php?do=status';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_durable.php?act=add&do=f';";
    echo '</script>';
}

mysqli_close($conn);

?>