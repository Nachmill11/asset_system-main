<?php
session_start();
include '../condb.php';
$ids = $_GET['id'];
$sql = "SELECT * FROM tb_order WHERE orderID= '$ids' ";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];
$m = 1;

$sql3 = "SELECT * FROM member";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จยืนยันการเบิกครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap');

    body {
        font-family: 'Sarabun', sans-serif;
    }
</style>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
<style type="text/css" media="print">
@page 
    {
        size: auto;   /* กำหนดขนาดของหน้าเอกสารเป็นออโต้ครับ */
        margin: 8mm;  /* กำหนดขอบกระดาษเป็น 0 มม. */
    }

    body 
    {
        margin: 8px;  /* เป็นการกำหนดขอบกระดาษของเนื้อหาที่จะพิมพ์ก่อนที่จะส่งไปให้เครื่องพิมพ์ครับ */
    }
    @media print{
		#print{
		   display: none; /* ซ่อน  */
		}
	}
</style>
<?php 
function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay/$strMonthThai/$strYear";
	}
  ?>
<body>
    <br><br>
    <div class="container">
    <div class="text-left">
        <a  id="print" href="report_order.php" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
        <button id="print" onclick="window.print()" class="btn btn-warning rounded-pill">พิมพ์ : <i class="fa fa-print"></i></button>
    </div><br>
        <div class="row">
            <h5 class="text-center" style="border:1px solid #000;padding:4px;"><b>แบบฟอร์มเบิกวัสดุ</b></h5>
            <div id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
                เลขที่ใบเบิกวัสดุ : <?= $rs['orderID'] ?> <br>
                ชื่อ-นามสกุล : <?= $rs['cus_name'] ?> <br>
                เบอร์โทรศัพท์ : <?= $rs['telephone'] ?> <br>
                วันเบิก : <?=  DateThai($rs['reg_date']); ?>   
            </div>
            <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
                <tr>
                    <th class="text-center" width="10%" style="border:1px solid #000;padding:4px;">ลำดับ</th>
                    <th class="text-center" style="border:1px solid #000;padding:4px;">รายการ</th>
                    <th class="text-center" width="15%" style="border:1px solid #000;padding:4px;">ราคา</th>
                    <th class="text-center" width="10%" style="border:1px solid #000;padding:4px;">จำนวน</th>
                    <th class="text-center" width="10%" style="border:1px solid #000;padding:4px;">หน่วย</th>
                    <th class="text-center" width="15%" style="border:1px solid #000;padding:4px;">ราคารวม</th>
                </tr>
                <?php
                $sql1 = "SELECT * FROM order_detail d,product p,unit c WHERE d.pro_id = p.pro_id AND p.unit_id = c.unit_id AND d.orderID= '$ids' ";
                $result1 = mysqli_query($conn, $sql1);
                while ($row = mysqli_fetch_array($result1)) {
                    $orderPrice = $row['orderPrice'];
                    $Total = $row['Total'];
                ?>
                    <tr>
                        <td  class="text-center" style="border:1px solid #000;padding:4px;"><?= $m ?></td>
                        <td style="border:1px solid #000;padding:4px;"><?= $row['pro_name'] ?></td>
                        <td  class="text-center" style="border:1px solid #000;padding:4px;"><?= number_format($orderPrice,2) ?></td>
                        <td  class="text-center" style="border:1px solid #000;padding:4px;"><?= $row['order_Qty'] ?></td>
                        <td  class="text-center" style="border:1px solid #000;padding:4px;"><?= $row['unit_name'] ?></td>
                        <td  class="text-center" style="border:1px solid #000;padding:4px;"><?= number_format($Total,2) ?></td>
                    </tr>
                <?php $m = $m + 1;
                } ?>
            </table>
            <h6 class="text-end" id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;"><b> รวมเป็นเงิน <?= number_format($total_price, 2) ?> บาท</b></h6>
        </div>
    
    <hr>
    
    <b class="text-left" style="border:1px solid #000;padding:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อเบิกวัสดุ&nbsp;&nbsp;&nbsp;&nbsp;</b> <br><br><br>
    <div class="text-center">
        ลงชื่อผู้เบิก................................................   
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ลงชื่อเจ้าหน้าที่................................................ <br> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        (&nbsp;&nbsp;<?= $rs['cus_name'] ?>&nbsp;&nbsp;) 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        (&nbsp;&nbsp;<?php echo $_SESSION['m_name']; ?>&nbsp;&nbsp;) <br>
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        วันที่................................................
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        วันที่.................................................. <br><br><br>
        </div>

    </div>
</body>
<script>
    window.print();
</script>

</html>