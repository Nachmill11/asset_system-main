<?php
include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	echo "</pre>";
// 	exit();
$type_name = $_POST['type_name'];

$check = "SELECT * FROM type WHERE type_name = '$type_name'";
$query = mysqli_query($conn, $check);
$num = mysqli_num_rows($query);
if ($num > 0) {
    echo '<script>';
	 echo "window.location='list_type.php?act=add&do=d';";
	 echo '</script>';
} else {
    $sql = "INSERT INTO type (type_name)
        values('$type_name')";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
if($result){
    echo '<script>';
    echo "window.location='list_type.php?do=success';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_type.php?act=add&do=f';";
    echo '</script>';
}
?>
