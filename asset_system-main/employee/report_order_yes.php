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
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("สำเร็จ !!", "อนุมัติรายการเบิกวัสดุเรียบร้อย", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="5;url=report_order.php" />';

  }else if(@$_GET['do']=='delete'){
    echo '<script type="text/javascript">
          swal("ยกเลิกรายการแล้ว", "ไม่สามารถกู้คืนข้อมูลได้", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="5;url=report_order.php" />';
  }

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
        <div class="wrapper">
            <?php include("navbar.php"); ?>
            <?php include("menu.php"); ?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="card card-body rounded-pill">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>&nbsp;&nbsp;<a href="index.php" style="color:teal">หน้าหลัก</a> /<span> รายการเบิกวัสดุ</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card">
                            <div class="card-header">
                                <h5 class="m-0"><i class="fa fa-check"></i> แสดงข้อมูลรายการเบิกวัสดุ</h5>
                            </div>
                            <br>
                            <div>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="report_order.php" type="button" class="btn btn-secondary rounded-pill">รายการรออนุมัติ</a>
                                &nbsp;<a href="report_order_yes.php" type="button" class="btn btn-secondary rounded-pill">รายการอนุมัติ</a>
                                &nbsp;<a href="report_order_no.php" type="button" class="btn btn-secondary rounded-pill">รายการยกเลิก</a>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ddt1 = @$_POST['dt1'];
                                        $ddt2 = @$_POST['dt2'];
                                        $add_date = date('Y/m/d', strtotime($ddt2 . "+1 days"));
                                        $cus_name = $m_name;

                                        if (($ddt1 != "") & ($ddt2 != "")) {
                                            echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2 ";
                                            $sql = "SELECT * FROM tb_order 
                                            WHERE NOT order_status = '1' AND reg_date BETWEEN '$ddt1' AND '$add_date' AND cus_name = '$cus_name'
                                            ORDER BY orderID DESC";
                                        } else {
                                            $sql = "SELECT * FROM tb_order 
                                            WHERE   cus_name = '$cus_name'
                                            ORDER BY orderID DESC";
                                        }

                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $status = $row['order_status'];
                                            
                                            
                                        ?>
                                            <tr class="text-center">
                                                <td><?= $row['orderID'] ?></td>
                                                <td><?= $row['cus_name'] ?></td>
                                                
                                                
                                                <td><?=  DateThai($row['reg_date']); ?></td>
                                                <td>
                                                    <?php
                                                    if ($status == 1) {
                                                        echo "<b style='color:gray'><i class='fa fa-close'></i> ติดต่อเจ้าหน้าที่ <b>";
                                                    } else if ($status == 2) {
                                                        echo "<i class='fa fa-check' style='color:green'></i><b style='color:green'> อนุมัติแล้ว <b>";
                                                    } else if ($status == 0) {
                                                        echo "<b style='color:red'><i class='fa fa-close'></i> ยกเลิกการเบิกวัสดุ <b>";
                                                    }
                                                    ?>
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
            title: 'ต้องการยกเลิกเบิกครุภัณฑ์หรือไม่ ?',
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