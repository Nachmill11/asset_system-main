<?php
session_start();
include '../condb.php';
    $cus_name = $_POST['cus_name'];
    $telephone = $_POST['telephone'];
    $date_end = $_POST['date_end'];

    $sql = "INSERT into d_order(cus_name,telephone,date_end,total_price,order_status)
    values('$cus_name', '$telephone', '$date_end', '". $_SESSION["sum_price"] . "', '1')";
    mysqli_query($conn,$sql);

    $orderID = mysqli_insert_id($conn);
    $_SESSION["order_id"] = $orderID;    //สร้างตัวแปรดึงข้อมูล

    for ($i = 0; $i <= (int)$_SESSION["int"]; $i++) {
        if (($_SESSION["strProduct"][$i]) != '') {
            //ดึงข้อมูลสินค้า
            $sql1 = "SELECT * FROM durable WHERE dur_id = '" . $_SESSION["strProduct"][$i] . "' ";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($result1);
            $price = $row1['price'];
            $total = $_SESSION["Qty"][$i] * $price;

            $sql2 = "INSERT into d_order_detail(orderID,dur_id,orderPrice,order_Qty,Total)
            values('$orderID', '" . $_SESSION["strProduct"][$i] . "', '$price', '" . $_SESSION["Qty"][$i] . "', '$total')";
            if(mysqli_query($conn,$sql2));{
                //  echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
                echo '<script>';
                echo "window.location='list_dur_category.php?do=success';";
                echo '</script>';
            }
        }
    }

    //-------Line Notify

    if(isset($_POST['submit'])){
       $date = date("d-m-Y");
    
        $sToken = "ouH7wTvMpBx8A2gbSOH0wojZfp5XrbRbccE5vpn7gjY"; 
        $sMessage = "\n";
        $sMessage = "มีรายการเบิกอุปกรณ์ครุภัณฑ์\n";
        $sMessage .= "วันที่ : " . $date . "\n";
        $sMessage .= "เลขที่ใบเบิกวัสดุ : " . $_SESSION["order_id"] . "\n";
        $sMessage .= "ชื่อ : " . $cus_name . "\n";
        $sMessage .= "เบอร์โทรศัพท์ : " . $telephone . "\n";
    
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 
    
        if($result){
            $_SESSION['success'] = "ส่งข้อมูลการแจ้งเตือน Line Notify เรียบร้อยแล้ว";
        }else{
            $_SESSION['error'] = "ส่งข้อมูลการแจ้งเตือน Line Notify ไม่สำเร็จ";
        }
        curl_close( $chOne );   
    
    }

    mysqli_close($conn);
    unset($_SESSION["int"]);
    unset($_SESSION["strProduct"]);
    unset($_SESSION["Qty"]);
    unset($_SESSION["sum_price"]);
    
?>