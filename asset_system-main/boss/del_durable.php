<?php
include '../condb.php';
$ids = $_GET['id'];

	$sql = "DELETE FROM durable WHERE dur_id= '$ids' ";
	$result = mysqli_query($conn, $sql);	
	mysqli_close($conn);
	
	if($result){
        echo '<script>';
        echo "window.location='list_durable.php?do=delete';";
        echo '</script>';
        }else{
        echo '<script>';
        echo "window.location='list_durable.php?act=add&do=f';";
        echo '</script>';
    }
?>

