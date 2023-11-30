<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
$pass = $_POST['m_pass'];
$subpass = $_POST['m_subpass'];
$member_id = $_POST['member_id'];

if ($pass == $subpass) {
	$sql_resetpass = " UPDATE member SET
	        m_pass = '$pass'
	        WHERE member_id = '" . $member_id . "' ";
	$resault_resetpass = mysqli_query($conn, $sql_resetpass);

	if ($resault_resetpass) {
		echo '<script>';
		echo "window.location='resetpass_admin.php?do=finish';";
		echo '</script>';
	} else {
		echo '<script>';
		echo "window.location='resetpass_admin.php?do=error';";
		echo '</script>';
	}
}
