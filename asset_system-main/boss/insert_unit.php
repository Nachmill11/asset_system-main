<?php
include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	echo "</pre>";
// 	exit();
$unit_name = $_POST['unit_name'];

$check = "SELECT * FROM unit WHERE unit_name = '$unit_name'";
$query = mysqli_query($conn, $check);
$num = mysqli_num_rows($query);
if ($num > 0) {
    echo '<script>';
	 echo "window.location='list_unit.php?act=add&do=d';";
	 echo '</script>';
} else {
    $sql = "INSERT INTO unit (unit_name)
        values('$unit_name')";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
if($result){
    echo '<script>';
    echo "window.location='list_unit.php?do=success';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_unit.php?act=add&do=f';";
    echo '</script>';
}
?>
