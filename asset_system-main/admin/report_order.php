<!DOCTYPE html>
<html lang="en">
<?php $menu = "report_order"; ?>
<?php include("head.php"); ?>

<body>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);

        body {
            font-family: 'Itim', cursive;
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <body class="hold-transition sidebar-mini layout-fixed">

        <?php
        if (@$_GET['do'] == 'success') {
            echo '<script type="text/javascript">
          swal("สำเร็จ !!", "อนุมัติรายการเบิกวัสดุเรียบร้อย", "success");
          </script>';
            echo '<meta http-equiv="refresh" content="5;url=report_order.php" />';
        } else if (@$_GET['do'] == 'delete') {
            echo '<script type="text/javascript">
          swal("ยกเลิกรายการแล้ว", "ไม่สามารถกู้คืนข้อมูลได้", "success");
          </script>';
            echo '<meta http-equiv="refresh" content="5;url=report_order.php" />';
        }else if (@$_GET['do'] == 'submit') {
            echo '<script type="text/javascript">
          swal("ส่งหลักฐานเรียบร้อย !!", "สามารถอนุมัติรายการนี้ได้", "success");
          </script>';
            echo '<meta http-equiv="refresh" content="5;url=report_order.php" />';
        }


        function DateThai($strDate)
        {
            $strYear = date("Y", strtotime($strDate)) + 543;
            $strMonth = date("n", strtotime($strDate));
            $strDay = date("j", strtotime($strDate));
            $strHour = date("H", strtotime($strDate));
            $strMinute = date("i", strtotime($strDate));
            $strSeconds = date("s", strtotime($strDate));
            $strMonthCut = array("", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
            $strMonthThai = $strMonthCut[$strMonth];
            return "$strDay/$strMonthThai/$strYear";
        }
        ?>
        <div class="wrapper">
            <?php include("navbar.php"); ?>
            <?php include("menu.php"); ?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="card card-body rounded-pill">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>&nbsp;&nbsp;<a href="index.php" style="color:teal">หน้าหลัก</a> /<span> รายการอนุมัติเบิกวัสดุ</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card">
                            <div class="card-header">
                                <h5 class="m-0"><i class="fas fa-remove"></i> แสดงข้อมูลส่งหลักฐานการเบิกวัสดุ (ยังไม่ส่งหลักฐาน)</h5>
                            </div>
                            <br>
                            <div>
                                &nbsp;&nbsp;&nbsp;<a href="report_order_yes.php" type="button" class="btn btn-secondary rounded-pill">ส่งหลักฐานแล้ว</a>
                                &nbsp;<a href="report_order.php" type="button" class="btn btn-secondary rounded-pill">ยังไม่ส่งหลักฐาน</a>
                                &nbsp;<a href="report_order_no.php" type="button" class="btn btn-secondary rounded-pill">ยกเลิกการเบิกวัสดุ</a>
                            </div>
                            <br>
                            <div>
                                <form name="form1" method="POST" action="report_order.php">
                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;<div class="col-sm-2">
                                            <input type="date" name="dt1" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="date" name="dt2" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary rounded-pill"><i class="fas fa-search"></i></button>
                                            <a href="report_order.php" class="btn btn-primary rounded-pill">ทั้งหมด</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-hover dataTable">
                                    <thead>
                                        <tr role="row" class="info text-center" style="color: blue;">
                                            <th>เลขที่ใบเบิกวัสดุ</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <!-- <th>ราคารวมสุทธิ</th> -->
                                            <th>วันที่เบิก</th>
                                            <th>สถานะ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ddt1 = @$_POST['dt1'];
                                        $ddt2 = @$_POST['dt2'];
                                        $add_date = date('Y/m/d', strtotime($ddt2 . "+1 days"));

                                        if (($ddt1 != "") & ($ddt2 != "")) {
                                            echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2 ";
                                            $sql = "SELECT * FROM tb_order 
                                            WHERE order_status ='1' AND reg_date BETWEEN '$ddt1' AND '$add_date' 
                                            ORDER BY reg_date DESC";
                                        } else {
                                            $sql = "SELECT * FROM tb_order 
                                            WHERE order_status ='1' ORDER BY reg_date DESC";
                                        }

                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $status = $row['order_status'];
                                            $file = $row['file'];
                                            $sta_confirm = $row['status'];

                                        ?>
                                            <tr class="text-center">
                                                <td><?= $row['orderID'] ?></td>
                                                <td><?= $row['cus_name'] ?></td>
                                                <td><?= DateThai($row['reg_date']); ?></td>
                                                <td>
                                                    <?php
                                                    if ($status == 1) {
                                                        echo "<b style='color:gray'><i class='fa fa-close'></i> ยังไม่ส่งหลักฐาน <b>";
                                                    } else if ($status == 2) {
                                                        echo "<i class='fa fa-check' style='color:green'></i><b style='color:green'> อนุมัติแล้ว <b>";
                                                    } else if ($status == 0) {
                                                        echo "<b style='color:red'><i class='fa fa-close'></i> ยกเลิกการเบิกวัสดุ <b>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="print_order_report.php?id=<?= $row['orderID'] ?>" type="button" class="btn btn-warning rounded-pill btn-sm"">พิมพ์ : <i class=" fa fa-print"></i></a>
                                                    <?php
                                                    if (empty( $sta_confirm == 1 )) { ?>
                                                       <a type="button" class="btn btn-secondary btn-sm rounded-pill  disabled">อนุมัติ : <i class='fas fa-remove'></i></a>
                                                    <?php  } else { ?>
                                                        <a href="pay_order.php?id=<?= $row['orderID'] ?>" type="button" class="btn btn-success btn-sm rounded-pill " onclick="del1(this.href); return false;">อนุมัติ : <i class='fas fa-check'></i></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <a href="report_order_detail.php?id=<?= $row['orderID'] ?>" type="button" class="btn btn-info rounded-pill btn-sm"">รายละเอียด : <i class='fa fa-eye'></i></a>
                                                <a href=" cancel_order.php?id=<?= $row['orderID'] ?>" type="button" class="btn btn-danger btn-sm rounded-pill" onclick="del(this.href); return false;">ยกเลิก : <i class='fas fa-trash-alt'></i></a>
                                                </td>
                                            <?php } ?>
                                            </tr>
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
    function del1(mypage) {
        Swal.fire({
            title: 'ต้องการอนุมัติหรือไม่ ?',
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

    function del(mypage) {
        Swal.fire({
            title: 'ต้องการยกเลิกเบิกวัสดุหรือไม่ ?',
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