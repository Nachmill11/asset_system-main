<?php
session_start();
include '../condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
$ids = $_GET['id'];
$m = 1;
$sql2 = "SELECT * FROM product
WHERE pro_id = '$ids'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบเสร็จยืนยันการเบิกวัสดุอุปกรณ์</title>
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
<style type="text/css" media="print">
    @page {
        margin: 0mm;
        margin-right: -6.1cm;
        margin-left: -6.1cm;
        size: A4;
    }

    body {
        margin: 0px;
        font-size: 12px;
    }
   


    th,
    td {
        font-size: 10px;
    }

    @media print {
        #print {
            display: none;
        }
    }
</style>
<?php
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds";
}
?>

<body>
    <br><br>

    <div class="container">
        <div class="text-left">
            <a id="print" href="list_product_detail.php" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
            <button id="print" onclick="window.print()" class="btn btn-warning rounded-pill">พิมพ์ : <i class="fa fa-print"></i></button>
        </div><br>
        <div class="row">
            <div align="right">
                <?php
                date_default_timezone_set('asia/bangkok');
                $date = DateThai(date('d-m-Y h:i:s'));
                ?>
                <p><b>ออกเอกสารฉบับนี้วันที่ <?= $date ?></b></p>
                <p><b>ลงนาม <?= $_SESSION['m_name'] ?></b></p>
            </div>
            <div align="center">
                <p><b>เอกสารรายงานประวัติการเพิ่มวัสดุ</b></p>
                <p><b>รายการ : <?= $row2['pro_name'] ?></b></p>
            </div>
            <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
                <tr>
                    <th class="text-center" style="border:1px solid #000;padding:4px;">ครั้งที่</th>
                    <th class="text-center" style="border:1px solid #000;padding:4px;">วันที่</th>
                    <th class="text-center" style="border:1px solid #000;padding:4px;">จำนวน</th>
                    <th class="text-center" style="border:1px solid #000;padding:4px;">หน่วย</th>
                    <th class="text-center" style="border:1px solid #000;padding:4px;">รับมาจาก</th>
                </tr>
                <?php
                $sql = "SELECT * FROM amount 
                WHERE pro_id = '$ids'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $m ?></td>
                        <td class="text-center" style="border:1px solid #000;padding:4px;"><?= DateThai($row['time']) ?></td>
                        <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $row['amount'] ?></td>
                        <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $row['unit'] ?></td>
                        <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $row['come'] ?></td>
                    </tr>
                <?php
                    $m = $m + 1;
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>

        <hr>
    </div>
</body>
<script>
    window.print();
</script>
</html>