<?php

  include '../condb.php';

  if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
  	$id = $_POST['id'];
  	$sql = "SELECT * FROM provinces WHERE province_id='$province_id'";
  	$query = mysqli_query($conn, $sql);
  	echo '<option value="" selected disabled>-เลือกประเภทครุภัณฑ์-</option>';
  	foreach ($query as $value) {
  		echo '<option value="'.$value['name_th'].'">'.$value['name_th'].'</option>';
  	}
  }
?>