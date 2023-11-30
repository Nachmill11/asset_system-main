<!DOCTYPE html>
<html lang="en">
<?php $menu = "report_order_d"; ?>
<?php include("head.php"); ?>

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
    $strMonthCut = Array("","01","02","03","04","05","06","07","08","09","10","11","12");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay/$strMonthThai/$strYear";
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
                                <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a> |<span> รายการยืมสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card">
                            <div class="card-header">
                                <h6 class="m-0"><i class="fas fa-list"></i> รายการยกเลิก</h6>
                            </div>
                            <br>
                            <div>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="report_order_d.php" type="button" class="btn btn-secondary rounded-pill">รายการรออนุมัติ</a>
                                &nbsp;<a href="report_order_yes_d.php" type="button" class="btn btn-secondary rounded-pill">รายการอนุมัติ</a>
                                &nbsp;<a href="report_order_no_d.php" type="button" class="btn btn-secondary rounded-pill">รายการยกเลิก</a>
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
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-sm table-hover dataTable">
                                    <thead>
                                    <tr role="row" class="info text-center" style="color: blue;">
                                            <th>เลขที่ใบเบิก</th>
                                            <th>ชื่อ-นามสกุล</th>
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

                                        if(($ddt1 != "") & ($ddt2 != "")){
                                            echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2 ";
                                            $sql = "SELECT * FROM d_order 
                                            WHERE order_status ='0' AND date_end BETWEEN '$ddt1' AND '$add_date'  AND cus_name = '$cus_name'
                                            ORDER BY date_end DESC";

                                        }else{
                                            $sql = "SELECT * FROM d_order 
                                            WHERE order_status ='0'  AND cus_name = '$cus_name'
                                            ORDER BY date_end DESC";
                                        }
                                        
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $status = $row['order_status'];
                                            $total_price = $row['total_price'];
                                        ?>
                                            <tr class="text-center">
                                            <td><?= $row['orderID'] ?></td>
                                                <td><?= $row['cus_name'] ?></td>
                                                <td><?=  DateThai($row['date_end']); ?></td>
                                                <td>
                                                <?php
                                                    if ($status == 1) {
                                                        echo "<b style='color:gray'><i class='fa fa-close'></i> ติดต่อเจ้าหน้าที่ <b>";
                                                    } else if ($status == 2) {
                                                        echo "<i class='fa fa-check' style='color:green'></i><b style='color:green'> อนุมัติแล้ว <b>";
                                                    } else if ($status == 0) {
                                                        echo "<b style='color:red'><i class='fa fa-close'></i> ยกเลิกรายการ <b>";
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