<?php
session_start();
include '../condb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสินทรัพย์</title>
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
        size: A4 landscape;
    }

    @page {
        size: landscape;
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

<body class="landscape">
    <br><br>

    <div class="container">
        <div class="text-left">
            <a id="print" href="list_durable.php" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
            <button id="print" onclick="window.print()" class="btn btn-warning rounded-pill">พิมพ์ : <i class="fa fa-print"></i></button>
        </div><br>
        <form action="print_report_durable.php" method="GET">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="col-xs-2">
                            <?php
                            include '../condb.php';
                            $sql2 = "SELECT * FROM department";
                            $query = mysqli_query($conn, $sql2);
                            ?>
                            <select type="text" name="s" id="print" class="form-control" onchange="window.location.href='print_report_durable.php?ss='+this.value">>
                                <option value="" selected disabled>-เลือกประเภทสินทรัพย์-</option>
                                <?php foreach ($query as $value) { ?>
                                    <option value="<?php echo $value["d_id"]; ?>"><?php echo $value["d_name"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="print" class="form-control" name="s" placeholder="ค้นหาชื่อรายการ" autocomplete="off">
                    </div>
                    <div class="col">
                        <button class="btn btn-info" id="print" type="submit" name="act" value="s" onClick="this.form.action='print_report_durable_s.php'" ;>ค้นหา</button>
                        <a class="btn btn-info" id="print" href="print_report_durable.php">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <div class="row">
            <div align="center">
                <?php $date = date("Y") + 543; ?>
                <p><b>เอกสารตรวจสอบนำเข้าสินทรัพย์</b></p>
                <p><b>บริษัท ยะลานํารุ่ง จํากัด</b></p>
            </div>
            <?php
            if (isset($_GET['ss'])) {
                include '../condb.php';
                $ss = $_GET['ss'];
                $sql = "SELECT * FROM durable p , department d
            WHERE p.d_id = d.d_id AND d.d_id = '$ss' 
            ORDER BY dur_id ASC";
                $result = mysqli_query($conn, $sql);
            ?>
                <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
                    <tr>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">วัน เดือน ปีที่รับ</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">หมายเลขสินทรัพย์</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">รายการ</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">จำนวน</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">ราคาต่อหน่วย</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">วิธีการได้มา</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">สภาพสินทรัพย์</th>
                    </tr>
                    <?php
                    while ($rs = mysqli_fetch_array($result)) {
                        $price = $rs['price'];
                    ?>
                        <tr>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= showThaiDate($rs['date']) ?></td>
                            <td style="border:1px solid #000;padding:4px;"><?= $rs['dur_number'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['dur_name'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['number'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= number_format($price, 2) ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['dur_receive'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;">
                                <?php
                                $st = $rs['status'];
                                if ($st == '1') {
                                    echo "ใช้งานได้";
                                } elseif ($st == '2') {
                                    echo "ชำรุด";
                                } elseif ($st == '3') {
                                    echo "เสื่อมสภาพ";
                                } elseif ($st == '4') {
                                    echo "สูญหาย";
                                } elseif ($st == '6') {
                                    echo "ใช้งานได้";
                                } else {
                                    echo "ไม่จำเป็นต้องใช้ในราชการ";
                                }
                                ?>
                            </td>

                        </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            <?php } else { ?>
                <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
                    <tr>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">วัน เดือน ปีที่รับ</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">หมายเลขสินทรัพย์</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">รายการ</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">จำนวน</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">ราคาต่อหน่วย</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">วิธีการได้มา</th>
                        <th class="text-center" style="border:1px solid #000;padding:4px;">สภาพสินทรัพย์</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM durable";
                    $result = mysqli_query($conn, $sql);
                    while ($rs = mysqli_fetch_array($result)) {
                        $price = $rs['price'];
                    ?>
                        <tr>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= showThaiDate($rs['date']) ?></td>
                            <td style="border:1px solid #000;padding:4px;"><?= $rs['dur_number'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['dur_name'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['number'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= number_format($price, 2) ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;"><?= $rs['dur_receive'] ?></td>
                            <td class="text-center" style="border:1px solid #000;padding:4px;">
                                <?php
                                $st = $rs['status'];
                                if ($st == '1') {
                                    echo "ใช้งานได้";
                                } elseif ($st == '2') {
                                    echo "ชำรุด";
                                } elseif ($st == '3') {
                                    echo "เสื่อมสภาพ";
                                } elseif ($st == '4') {
                                    echo "สูญหาย";
                                } elseif ($st == '6') {
                                    echo "ใช้งานได้";
                                } else {
                                    echo "ไม่จำเป็นต้องใช้ในราชการ";
                                }
                                ?>
                            </td>

                        </tr>
                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            <?php } ?>
        </div>

        <hr>
    </div>
</body>

</html>