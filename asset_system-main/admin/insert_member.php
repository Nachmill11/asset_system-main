<?php
include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	echo "</pre>";
// 	exit();
header("Content-type: text/html; charset=utf-8");
$m_email = $_POST['m_email'];
$m_name = $_POST['m_name'];
$m_pass = $_POST['m_pass'];
$m_num = $_POST['m_num'];
$telephone = $_POST['telephone'];
$m_level = $_POST['m_level'];

$pattern_thai = "/^[ก-๏\s]+$/u";
if (!is_null($m_name) && !preg_match($pattern_thai, $m_name)) {
    echo '<script>';
    echo "window.location='list_member.php?act=add&do=thai';";
    echo '</script>';
    exit();
}

$check = "SELECT * FROM member WHERE m_num = '$m_num'";
$query = mysqli_query($conn, $check);
$num = mysqli_num_rows($query);
if ($num > 0) {
    echo '<script>';
    echo "window.location='list_member.php?act=add&do=d';";
    echo '</script>';
} else {
    $sql = "INSERT INTO member (m_email,m_name,m_pass,m_num,telephone,m_level)
        values('$m_email','$m_name','$m_pass','$m_num','$telephone','$m_level')";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
if ($result) {
    echo '<script>';
    echo "window.location='list_member.php?do=success';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='list_member.php?act=add&do=f';";
    echo '</script>';
}
