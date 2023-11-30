<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>

<head>
    
</head>

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
                                    <span>&nbsp;&nbsp;<a href="#" style="color:danger">หน้าหลัก</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <p>เบิกสินทรัพย์</p>
                                        <h1>
                                            <?php
                                            $check = "SELECT * FROM d_order
                                            WHERE cus_name = '$cus_name'";
                                            $qury = mysqli_query($conn, $check);
                                            echo mysqli_num_rows($qury) . ' รายการ';
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                    <a href="" class="small-box-footer danger"></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <p>แจ้งรอซ่อม</p>
                                        <h1>
                                            <?php
                                            $check = "SELECT * FROM d_order
                                            WHERE cus_name = '$cus_name' AND order_status = '3'"; 
                                            $qury = mysqli_query($conn, $check);
                                            echo mysqli_num_rows($qury) . ' รายการ';
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                    <a href="" class="small-box-footer danger"></a>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="card card">
                                    <div class="card-header">
                                        <h5 class="m-0"><i class="fa fa-list"></i> ประวัติการเบิกสินทรัพย์</h5><br>
                                        <table id="example1" class="table table-sm table-hover dataTable">
                                    <thead>
                                        <tr role="row" class="info text-center" style="color: blue;">
                                            <th>เลขที่ใบเบิก</th>
                                            <th>ชื่อ-นามสกุล</th>
                                            <!-- <th>ราคารวมสุทธิ</th> -->
                                            <th>วันที่เบิก</th>
                                            <th>ดูรายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cus_name = $m_name;
                                            $sql = "SELECT * FROM d_order 
                                            WHERE  cus_name = '$cus_name'
                                            ORDER BY orderID DESC";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $status = $row['order_status'];
                                            
                                            
                                        ?>
                                            <tr class="text-center">
                                                <td><?= $row['orderID'] ?></td>
                                                <td><?= $row['cus_name'] ?></td>
                                                <td><?=  DateThai($row['date_end']); ?></td>
                                               <td>
                                               <a href="report_order_yes_d.php" type="button" class="btn btn-info rounded-pill">ตรวจสอบ : <i class="fa fa-eye"></i></a></td>
                                            </td>
                                            <?php } ?>
                                            </tr>
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
                            </div>
                        </div>
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
        <?php include("script.php"); ?>
    </body>

</html>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    Swal.fire({
        imageUrl: '../img/logo/logo.png',
        imageWidth: 250,
        imageHeight: 250,
        title: 'สวัสดีคุณ "<?= $m_name ?>"',
        text: 'เข้าสู่ระบบบริหารจัดการสินทรัพย์',
        timer: 3000,
        showCancelButton: false,
        showConfirmButton: false
    });
</script>