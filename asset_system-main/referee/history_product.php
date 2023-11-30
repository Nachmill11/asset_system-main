<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>
<?php
$m = 1;
$ids = $_GET['id'];
$sql1 = "SELECT * FROM product WHERE pro_id = '$ids' ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
?>

<body>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);

        body {
            font-family: 'Itim', cursive;
            font-family: 'Kanit', sans-serif;
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
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds";
}
?>
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
                                    <h4>&nbsp;&nbsp;<a href="index.php" style="color:teal">หน้าหลัก /</a> <a href="list_product_detail.php" style="color:teal"> รายการวัสดุ</a> /<span> ประวัติการเพิ่มวัสดุ</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card">
                            <br>
                            <div align="left">
                                &nbsp;&nbsp;&nbsp;<a href="list_product_detail.php" type="button" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
                                <a href="print_history_product.php?id=<?= $row1['pro_id']?>" type="button" class="btn btn-warning rounded-pill">พิมพ์รายงาน : <i class="fa fa-print"></i></a>
                            </div>
                            <div class="card-body">
                                <h4>รหัสวัสดุ : <?= $row1['pro_id'] ?></h4>
                                <h4>ชื่อรายการ : <?= $row1['pro_name'] ?></h4>

                                <table id="example1" class="table table-sm table-hover dataTable">
                                    <thead>
                                        <tr role="row" class="info text-center" style="color: blue;">
                                            <th style="width: 10%;">ครั้งที่</th>
                                            <th style="width: 25%;">วันที่รับ</th>
                                            <th style="width: 15%;">จำนวน</th>
                                            <th style="width: 15%;">หน่วย</th>
                                            <th>รับมาจาก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM amount 
                                        WHERE pro_id = '$ids'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $m ?></td>
                                                <td class="text-center"><?= DateThai($row['time']) ?></td>
                                                <td class="text-center"><?= $row['amount'] ?></td>
                                                <td class="text-center"><?= $row['unit'] ?></td>
                                                <td><?= $row['come'] ?></td>
                                            </tr>
                                        <?php
                                            $m = $m + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                mysqli_close($conn);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>
        <?php include("script.php"); ?>
    </body>

</html>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function del(mypage) {
        Swal.fire({
            title: 'ต้องการลบหน่วยนับวัสดุหรือไม่ ?',
            showDenyButton: true,
            confirmButtonText: `ยืนยัน`,
            denyButtonText: `ยกเลิก`,
            icon: 'warning'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = mypage;
            }
        });
    }
</script>