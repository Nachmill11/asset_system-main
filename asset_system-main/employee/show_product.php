<?php
// เริ่มคำสั่ง Export ไฟล์ PDF
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);
// สิ้นสุดคำสั่ง Export ไฟล์ PDF ในส่วนบน เริ่มกำหนดตำแหน่งเริ่มต้นในการนำเนื้อหามาแสดงผลผ่าน
$mpdf->SetFont('sarabun', '', 16);
ob_start();  //ฟังก์ชัน ob_start()
?>

<?php
include '../condb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
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



<body>
    <div class="container">
        <br>
        <h3 class="text-center" style="border:1px solid #000;padding:4px;"><b>แบบฟอร์มยืม-คืนอุปกรณ์ครุภัณฑ์</b></h3>
        <br>
        ชื่อ-นามสกุล : นัจญมีน ยะระ<br>
        เบอร์โทร : 0632516293<br>
        วันที่ยืม : 12/2/2566 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        วันที่คืน : 15/2/2566<br>
        ดังรายการต่อไปนี้
        <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
            <tr style="border:1px solid #000;padding:4px;">
                <th style="border-right:1px solid #000;padding:4px;text-align:center;" width="10%">ลำดับ</th>
                <th style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">เลขครุภัณฑ์</th>
                <th style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">รายการ</th>
                <!-- <td  width="45%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp;รายละเอียดสินค้า</td> -->     
                <th style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">จำนวน</th>
            </tr>
            <?php
            $total = 0;
            $sumQty = 0;
            $sql = "SELECT * FROM durable ORDER BY dur_id ASC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $total = $sumQty + $row['price'];
                
            ?>
                <tr style="border:1px solid #000;padding:4px;">
                    <td style="border-right:1px solid #000;padding:4px;text-align:center;"><?= $row['dur_id'] ?></td>
                    <td style="border-right:1px solid #000;padding:4px;text-align:center;"><?= $row['dur_number'] ?></td>
                    <td style="border-right:1px solid #000;padding:4px;text-align:center;"><?= $row['dur_name'] ?></td>
                    <td style="border-right:1px solid #000;padding:4px;text-align:center;"><?= $row['number'] ?></td>
                </tr>
            <?php
            }
            mysqli_close($conn)
            ?>
        </table>
        <h6 class="text-end"><b>รวมเป็นเงิน : <?= number_format($total, 2) ?> บาท</b></h6> <br>

        <b class="text-center" style="border:1px solid #000;padding:4px;">&nbsp;&nbsp;&nbsp;&nbsp;1. ลงชื่อยืมอุปกรณ์ครุภัณฑ์&nbsp;&nbsp;&nbsp;&nbsp;</b> <br><br>
        ลงชื่อผู้ยืม................................................   
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ลงชื่อเจ้าหน้าที่................................................ <br> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        (................................................) 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        (................................................)<br>
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        วันที่................................................
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        วันที่.................................................. <br><br><br>

        <b class="text-center" style="border:1px solid #000;padding:4px;">&nbsp;&nbsp;&nbsp;&nbsp;2. ลงชื่อคืนอุปกรณ์ครุภัณฑ์&nbsp;&nbsp;&nbsp;&nbsp;</b> <br><br>
        ลงชื่อผู้คืน................................................   
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ลงชื่อเจ้าหน้าที่................................................ <br> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        (................................................) 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        (................................................)<br>
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        วันที่................................................
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        วันที่.................................................. <br><br><br>
    
        <?php
        // คำสั่งการ Export ไฟล์เป็น PDF
        $html = ob_get_contents();      // เรียกใช้ฟังก์ชัน รับข้อมูลที่จะมาแสดงผล
        $mpdf->WriteHTML($html);        // รับข้อมูลเนื้อหาที่จะแสดงผลผ่านตัวแปร $html
        $mpdf->Output('Report.pdf');  //สร้างไฟล์ PDF ชื่อว่า myReport.pdf
        ob_end_flush();                 // ปิดการแสดงผลข้อมูลของไฟล์ HTML ณ จุดนี้
        ?>
        <br>
        <!--การสร้างลิงค์ เรียกไฟล์ myReport.pdf แสดงผลไฟล์ PDF  -->
        <a href="Report.pdf"><button class="btn btn-primary rounded-pill">Export PDF</button> </a>

    </div>
</body>

</html>