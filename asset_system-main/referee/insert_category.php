<?php
	session_start();
	echo '<meta charset="utf-8">';
	include('../condb.php');
	// echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// echo "</pre>";
	// exit();
	if ($_SESSION['m_level'] != 'admin') {
		Header("Location: index.php");
	}
	
	$d_id = $_POST['d_id'];
	$c_name = $_POST['c_name'];
	$province_id = $_POST['province_id'];
	
	if (is_uploaded_file($_FILES['doc_file']['tmp_name'])) {
        $new_image_name = 'cat_'.uniqid().".".pathinfo(basename($_FILES['doc_file']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "../img/category/".$new_image_name;
        move_uploaded_file($_FILES['doc_file']['tmp_name'],$image_upload_path);
        } else {
        $new_image_name = "";
        }

	$check = "
	SELECT  c_name
	FROM category 
	WHERE c_name = '$c_name' 
	";
	$result1 = mysqli_query($conn, $check);
	$num = mysqli_num_rows($result1);

	if ($num > 0) {
		echo '<script>';
		echo "window.location='list_category.php?act=add&do=d';";
		echo '</script>';
	} else {

		$sql = "INSERT INTO category 
	(	
		d_id,
		c_name,
		province_id,
		doc_file
    )
	VALUES
	(	
		'$d_id',
		'$c_name',
		'$province_id',
		'$new_image_name'
    )";
		$result = mysqli_query($conn, $sql);
	}
	mysqli_close($conn);
	if($result){
		echo '<script>';
		echo "window.location='list_category.php?do=success';";
		echo '</script>';
		}else{
		echo '<script>';
		echo "window.location='list_category.php?act=add&do=f';";
		echo '</script>';
	}
