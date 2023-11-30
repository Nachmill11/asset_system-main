<?php
session_start();
include '../condb.php';


$sql3 = "SELECT * FROM member";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานการออกสินทรัพย์</title>
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
    @page {
        size: auto;
        /* กำหนดขนาดของหน้าเอกสารเป็นออโต้ครับ */
        margin: 8mm;
        /* กำหนดขอบกระดาษเป็น 0 มม. */
    }

    body {
        margin: 8px;
        /* เป็นการกำหนดขอบกระดาษของเนื้อหาที่จะพิมพ์ก่อนที่จะส่งไปให้เครื่องพิมพ์ครับ */
    }

    @media print {
        #print {
            display: none;
            /* ซ่อน  */
        }
    }
</style>
<?php
function showThaiDate($date)
{
    $__thai_month = [
        "01" => 'ม.ค.',
        "02" => 'ก.พ.',
        "03" => 'มี.ค.',
        "04" => 'เม.ย.',
        "05" => 'พ.ค.',
        "06" => 'มิ.ย.',
        "07" => 'ก.ค.',
        "08" => 'ส.ค.',
        "09" => 'ก.ย.',
        "10" => 'ต.ค.',
        "11" => 'พ.ย.',
        "12" => 'ธ.ค.',
    ];

    $exp = explode("-", $date);
    list($year, $month, $day) = $exp;

    $year = $year + 543;
    return "{$day} {$__thai_month[$month]} {$year}";
}
?>

<body>
    <br><br>
    <div class="container">
        <div class="text-left">
            <a id="print" href="report_order_d.php" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
            <button id="print" onclick="window.print()" class="btn btn-warning rounded-pill">พิมพ์ : <i class="fa fa-print"></i></button>
        </div><br>
        <div align="center">
                <?php $date = date("Y") + 543; ?>
                <p><b>เอกสารตรวจสอบนำออกสินทรัพย์</b></p>
                <p><b>บริษัท ยะลานํารุ่ง จํากัด</b></p>
            </div>
        <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
            <tr>
                <th class="text-center" style="border:1px solid #000;padding:4px;">วัน เดือน ปีที่ออก</th>
                <th class="text-center" style="border:1px solid #000;padding:4px;">เลขที่ใบเบิก</th>
                <th class="text-center" style="border:1px solid #000;padding:4px;">รายการ</th>
                <th class="text-center" style="border:1px solid #000;padding:4px;">ชื่อ-นามสกุล</th>
                <th class="text-center" style="border:1px solid #000;padding:4px;">สถานะ</th>
            </tr>
            <?php
            $sql = "SELECT * FROM d_order t, d_order_detail d, durable p 
            WHERE t.orderID = d.orderID AND d.dur_id = p.dur_id AND NOT order_status = '1'
            ORDER BY t.orderID ASC";
            $result = mysqli_query($conn, $sql);
            while ($rs = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td class="text-center" style="border:1px solid #000;padding:4px;"><?= showThaiDate($rs['date_end']) ?></td>
                    <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['orderID'] ?></td>
                    <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['dur_name'] ?></td>
                    <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['cus_name'] ?></td>
                    <td class="text-center" style="border:1px solid #000;padding:4px;">
                        <?php
                        $st = $rs['order_status'];
                        if ($st == '2') {
                            echo "อนุมัติแล้ว";
                        } else if ($st == '3') {
                            echo "อนุมัติแล้ว";
                        }else if ($st == '4') {
                            echo "อนุมัติแล้ว";
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    </div>
</body>
<script>
    window.print();
</script>

</html>