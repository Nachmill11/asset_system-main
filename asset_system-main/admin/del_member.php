<?php
include '../condb.php';

$ids = $_GET['id'];

$sql = "DELETE FROM member WHERE member_id= '$ids' ";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);


if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_member.php?do=delete';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_member.php'; ";
    echo "</script>";
}
