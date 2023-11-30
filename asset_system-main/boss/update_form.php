<?php
include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	print_r($_FILES);
// 	echo "</pre>";
// 	exit();
$member_id = $_POST['member_id'];
$m_email = $_POST['m_email'];
$m_name = $_POST['m_name'];
$address = $_POST['address'];
$m_num = $_POST['m_num'];
$telephone = $_POST['telephone'];
$m_line = $_POST['m_line'];
$m_img2 = $_POST['m_img2'];
$date = $_POST['date'];

if ($date > date('Y-m-d')) {
    echo '<script>';
    echo "window.location='list_form.php?do=date';";
    echo '</script>';
    exit();
}

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['m_img']['tmp_name'])) {
    $new_image_name = 'mem_' . uniqid() . "." . pathinfo(basename($_FILES['m_img']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../m_img/" . $new_image_name;
    move_uploaded_file($_FILES['m_img']['tmp_name'], $image_upload_path);
} else {
    $new_image_name = "$m_img2";
}

$sql = "UPDATE member SET
        m_email = '$m_email',
        m_name = '$m_name',
        address  = '$address',
        m_num = '$m_num',
        telephone = '$telephone',
        m_line = '$m_line',
        m_img = '$new_image_name',
        date = '$date'
        WHERE member_id = '$member_id' ";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo '<script>';
    echo "window.location='list_form.php?do=finish';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='list_form.php?do=wrong';";
    echo '</script>';
}
mysqli_close($conn);
