<?php
    include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	print_r($_FILES);
// 	echo "</pre>";
// 	exit();
        $company_id = $_POST['company_id'];
        $com_name = $_POST['com_name'];
        $com_name_s = $_POST['com_name_s'];
        $com_date = $_POST['com_date'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $line = $_POST['line'];
        $address_c = $_POST['address_c'];

        $sql = "UPDATE company SET
        com_name = '$com_name',
        com_name_s = '$com_name_s',
        com_date  = '$com_date',
        tel = '$tel',
        email = '$email',
        line = '$line',
        address_c = '$address_c'
        WHERE company_id = '$company_id' ";

        $result = mysqli_query($conn,$sql);
       
        if($result){
			echo '<script>';
			echo "window.location='company.php?do=success';";
			echo '</script>';
		}else{
			echo '<script>';
			echo "window.location='company.php?do=wrong';";
			echo '</script>';
		}
        mysqli_close($conn);
