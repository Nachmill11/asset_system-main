<?php
    include '../condb.php';
    // echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// echo "</pre>";
	// exit();
        $pro_name = $_POST['pro_name'];
        $detail = $_POST['detail'];
        $type_id = $_POST['type_id'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];

        $check = "SELECT * FROM product WHERE pro_name = '$pro_name'";
        $query = mysqli_query($conn,$check);
        $num = mysqli_num_rows($query);
        if($num > 0){
            echo "<script> alert('รายการข้อมูลวัสดุซ้ำ'); </script>";
            echo "<script> window.location = 'addProduct.php'; </script>";
        }

       //อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    $new_image_name = 'pro_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/".$new_image_name;
    move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

        $sql = "INSERT INTO product (pro_name,detail,type_id,price,amount,image)
        values('$pro_name','$detail','$type_id','$price','$amount','$new_image_name')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "<script> alert('บันทึกข้อมูลวัสดุเรียบร้อยแล้ว'); </script>";
            echo "<script> window.location = 'list_product.php'; </script>";
        }else{
            echo "<script> alert('บันทึกข้อมูลวัสดุไม่สำเร็จ'); </script>";
            echo "<script> window.location = 'list_product.php'; </script>";
        }
        mysqli_close($conn);
