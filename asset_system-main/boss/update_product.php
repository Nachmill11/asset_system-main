<?php
    include '../condb.php';
// echo "<pre>";
// 	print_r($_POST);
// 	print_r($_FILES);
// 	echo "</pre>";
// 	exit();
        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $detail = $_POST['detail'];
        $type_id = $_POST['type_id'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $unit_id = $_POST['unit_id'];
        $textimg = $_POST['textimg'];

       
       //อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$textimg";
    }

        $sql = "UPDATE  product SET
        pro_name = '$pro_name',
        detail = '$detail',
        type_id  = '$type_id',
        price = '$price',
        amount = '$amount',
        unit_id = '$unit_id',
        image = '$new_image_name'
        WHERE pro_id = '$pro_id' ";

        $result = mysqli_query($conn,$sql);
       
       	
	if($result){
		echo '<script>';
		echo "window.location='list_product_detail.php?do=finish';";
		echo '</script>';
		}else{
		echo '<script>';
		echo "window.location='list_product_detail.php?act=add&do=f';";
		echo '</script>';
	}
        mysqli_close($conn);
