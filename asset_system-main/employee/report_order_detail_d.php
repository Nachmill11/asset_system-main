<?php
include '../condb.php';
$ids = $_GET['id'];
$sql1 = "SELECT * FROM d_order WHERE orderID = '$ids' ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$status = $row1['status'];

$sql3 = "SELECT * FROM d_order WHERE orderID= '$ids' ";
$result3 = mysqli_query($conn, $sql3);
$rs = mysqli_fetch_array($result3);

$m = 1;
?>
<!DOCTYPE html>
<html lang="en">
<?php $menu = "report_order_d"; ?>
<?php include("head.php"); ?>
<head>
<body>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);

        body {
            font-family: 'Itim', cursive;
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">
            <?php include("navbar.php"); ?>
            <?php include("menu.php"); ?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="card card-body rounded-pill">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>&nbsp;&nbsp;<a href="index.php" style="color:teal">หน้าหลัก</a> <a href="report_order_detail_d.php" style="color:teal">/ รายการอนุมัติเบิกครุภัณฑ์</a> / <span> รายละเอียดเบิกครุภัณฑ์</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="card card">
                        <div class="card-header">
                            <h5 class="m-0"><i class="fas fa-list"></i> รายละเอียดเบิกครุภัณฑ์</h5>
                        </div>
                        <br>
                        <div>
                            &nbsp;&nbsp;&nbsp;<a href="report_order_d.php" type="button" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
                        </div>
                        <div class="card-body">
                            <h5>เลขที่ใบเบิกครุภัณฑ์ : <?= $ids ?></h5>
                            <h5>ชื่อ-นามสกุล : <?= $rs['cus_name'] ?> </h5>
                            <h5>เบอร์โทรศัพท์ : <?= $rs['telephone'] ?> </h5>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr role="row" class="info text-center" style="color: blue;">
                                        <th class="text-center" width="10%" >ลำดับ</th>
                                        <th class="text-center">รายการ</th>
                                        <th class="text-center" width="15%" >ราคา</th>
                                        <th class="text-center" width="10%" >จำนวน</th>
                                        <th class="text-center" width="15%" >ราคารวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM d_order t, d_order_detail d, durable p 
                                    WHERE t.orderID = d.orderID AND d.dur_id = p.dur_id AND d.orderID = '$ids'
                                    ORDER BY d.dur_id ";
                                    $result = mysqli_query($conn, $sql);
                                    $sum_total = 0;
                                    
                                    while ($row = mysqli_fetch_array($result)) {
                                        $sum_total = $row['total_price'];
                                        $Total = $row['Total'];
                                        $orderPrice = $row['orderPrice'];
                                    ?>
                                        <tr class="text-center">
                                            <td class="text-center"><?= $m ?></td>
                                            <td><?= $row['dur_name'] ?></td>
                                            <td><?= number_format($orderPrice, 2) ?></td>
                                            <td><?= $row['order_Qty'] ?></td>
                                            <td><?= number_format($Total, 2) ?></td>
                                        <?php } ?>
                                        </tr>
                                        <?php $m = $m + 1; ?>
                                </tbody>
                                <?php
                                mysqli_close($conn);
                                ?>
                            </table><br>
                            <div align="right">
                            <h6 class="text-end" id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;"><b> รวมเป็นเงิน <?= number_format($sum_total, 2) ?> บาท</b></h6>
                            </div><hr>
                            <form action="insentFile_d.php" method="POST" enctype="multipart/form-data">
                                    <div class="alert alert-success text-center" role="alert">
                                        แนบส่งหลักฐาน
                                    </div>
                                    <table class="table table-striped">
                                        <tr class="text-center">
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">แนบไฟล์</th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">เหตุผลที่ไม่ผ่าน</th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">จัดการข้อมูล</th>
                                        </tr>
                                        <tr class="text-center">
                                            <td>
                                                <?php
                                                if (empty($row1['file'])) { ?>
                                                    <h6 style='color:red'>ยังไม่ส่งหลักฐาน</h6>
                                                <?php    } else { ?>
                                                    <?php
                                                    if ($status == 1) {
                                                        echo "<b style='color:green'><i class='fa fa-check'></i> ผ่าน <b>";
                                                    } else if ($status == 2) {
                                                        echo "<b style='color:red'><i class='fa fa-close'></i> ไม่ผ่าน <b>";
                                                    } else if ($status == 3) {
                                                        echo "<b style='color:gray'><i class='fa fa-close'></i> รอตรวจสอบ <b>";
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (empty($row1['file'])) { ?>
                                                    <input type="file" name="file2" class="form-control" required><br>
                                                <?php    } else { ?>
                                                    <i class='far fa-file-pdf' style='font-size:24px;color:red'></i>&nbsp;&nbsp;
                                                    <a style='font-size:16px;' href="../img/file/<?= $row1['file']; ?>" target='_blank'>ดูไฟล์เอกสารแนบ</a>
                                                    <input type="file" name="file2" class="form-control" required><br>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (empty($row1['comment'])) { ?>
                                                    <p>-</p>
                                                <?php    } else { ?>
                                                    <p style='color:red'><?= $row1['comment']; ?></p>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="orderID" value="<?= $ids ?>">
                                                <input type="hidden" name="status" value="3">
                                                <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                        </div>
                    </div>
                </div>
                <div>
                    </a>
                </div>
            </div>
            </section>
        </div>
        </div>
        
                    <!-- ส่วนท้าย -->
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        </div>
        <?php include("script2.php"); ?>
    </body>

</html>