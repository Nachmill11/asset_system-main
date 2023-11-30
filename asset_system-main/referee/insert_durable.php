<?php
include '../condb.php';
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();

function convertDate($string)
{
    $exp = explode("-", $string);
    list($year, $month, $day) = $exp;
    $year = $year - 543;
    return "{$year}-{$month}-{$day}";
}

$date = convertDate($_POST["date"]);
$dur_number = $_POST['dur_number'];
$dur_name = $_POST['dur_name'];
$number = $_POST['number'];
$d_id = $_POST['d_id'];
$c_id = $_POST['c_id'];
$price = $_POST['price'];
$dur_receive = $_POST['dur_receive'];
// $dur_position = $_POST['dur_position'];
// $dur_change = $_POST['dur_change'];
$status = $_POST['status'];
$detail = $_POST['detail'];

$check = "SELECT * FROM durable WHERE dur_number = '$dur_number'";
$query = mysqli_query($conn, $check);
$num = mysqli_num_rows($query);
if ($num > 0) {
    echo '<script>';
	 echo "window.location='list_durable.php?act=add&do=d';";
	 echo '</script>';
}

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'du_' . uniqid() . "." . pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/durable/" . $new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'], $image_upload_path);
} else {
    $new_image_name = "";
}

$sql = "INSERT INTO durable (date,dur_number,dur_name,number,d_id,c_id,price,dur_receive,status,detail,photo)
        values('$date','$dur_number','$dur_name','$number','$d_id','$c_id','$price','$dur_receive','$status','$detail','$new_image_name')";
$result = mysqli_query($conn, $sql);
if($result){
    echo '<script>';
    echo "window.location='list_durable.php?do=success';";
    echo '</script>';
    }else{
    echo '<script>';
    echo "window.location='list_durable.php?act=add&do=f';";
    echo '</script>';
}
mysqli_close($conn);
