<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php");
include '../condb.php'; ?>
<?php include('date.php'); ?>

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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a> |<span> รายการอุปกรณ์สินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <a href="list_durable.php" type="button" class="btn btn-success btn-sm">รายการทั้งหมด</a>&nbsp;
                            <a href="list_durable_1.php" type="button" class="btn btn-secondary btn-sm">ใช้งานได้
                                &nbsp; <span class="badge badge-danger right" style="font-size: 12px;">
                                    <?php
                                    $check = "SELECT * FROM durable
                                    WHERE status = '1' OR status = '6'";
                                    $qury = mysqli_query($conn, $check);
                                    echo mysqli_num_rows($qury);
                                    ?>
                                </span>
                            </a>&nbsp;
                            <a href="list_durable_2.php" type="button" class="btn btn-secondary btn-sm">ชำรุด
                                &nbsp; <span class="badge badge-danger right" style="font-size: 12px;">
                                    <?php
                                    $check = "SELECT * FROM durable
                                    WHERE status = '2' ";
                                    $qury = mysqli_query($conn, $check);
                                    echo mysqli_num_rows($qury);
                                    ?>
                                </span>
                            </a>&nbsp;
                            <a href="print_report_durable.php" type="button" class="btn btn-warning btn-sm">พิมพ์รายงาน : <i class="fa fa-print"></i></a>
                        </div>
                    </div>
                    </form>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card"><br>
                                    <div class="col-md-12">
                                        <div align="right">
                                            <a href="addDurable.php" class="btn btn-success  rounded-pill">
                                                <i class="fa fa-plus"></i> เพิ่มข้อมูลสินทรัพย์</a>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-hover dataTable">
                                            <thead>
                                                <tr role="row" class="info" align='center' style="color: blue;">
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">หมายเลขสินทรัพย์</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">รายการ</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สภาพ</th>
                                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;">จัดการ</th>
                                                </tr>
                                            </thead>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM durable 
                                                WHERE status = '2' ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($result)) { ?>
                                                    <tr>
                                                        <td align="center"><img src="../img/durable/<?= $row['photo'] ?>" width="100px"></td>
                                                        <td align="center"><?php echo $row['dur_number']; ?></td>
                                                        <td><?php echo $row['dur_name']; ?></td>
                                                        <?php
                                                        $st = $row['status'];
                                                        echo "<td class='hidden' align='center' style='font-size: 20px;'>";
                                                        if ($st == '1') {
                                                            echo "<span class='badge badge-success'>" . "ใช้งานได้";
                                                        } elseif ($st == '2') {
                                                            echo "<span class='badge badge-danger'>" . "ชำรุด";
                                                        } elseif ($st == '3') {
                                                            echo "<span class='badge badge-info'>" . "เสื่อมสภาพ";
                                                        } elseif ($st == '4') {
                                                            echo "<span class='badge badge-primary'>" . "สูญหาย";
                                                        } elseif ($st == '6') {
                                                            echo "<span class='badge badge-success'>" . "ใช้งานได้";
                                                        } else {
                                                            echo "<span class='badge badge-secondary'>" . "ไม่จำเป็นต้องใช้ในราชการ";
                                                        }
                                                        ?>
                                                        <td align='center'>
                                                            <a class="btn btn-info rounded-pill" title="รายละเอียดข้อมูล" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['dur_id']; ?>">
                                                                รายละเอียด : <span class='fa fa-eye'></span>
                                                            </a>
                                                            <a class="btn btn-warning rounded-pill" title="แก้ไขข้อมูล" href="edit_durable.php?id=<?php echo $row['dur_id']; ?>">
                                                                แก้ไข : <span class='fa fa-pencil'></span>
                                                            </a>
                                                            <a class="btn btn-danger rounded-pill" title="ลบข้อมูล" role="button" onclick="del(this.href); return false;" href="del_durable.php?id=<?php echo $row['dur_id']; ?>" onclick="return confirm('ยืนยันการลบข้อมูล !');">
                                                                ลบ : <span class='fas fa-trash-alt' trigger="click"></span>
                                                            </a>
                                                        </td>

                                                        <!-- popup รายละเอียด -->

                                                        <div class="modal fade purple" id="exampleModal<?php echo $row['dur_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                                                                        <div align="center">
                                                                            <a data-bs-dismiss="modal"><i class='fas fa-times'></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="" method="post" class="form-horizontal">
                                                                            <div align="center">
                                                                                <img src="../img/durable/<?= $row['photo']; ?>" height="200">
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <i class="fa fa-success"></i> <label>รายละเอียดข้อมูลสินทรัพย์</label><br>
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col--3">
                                                                                            วันที่รับ<br>
                                                                                            หมายเลขสินทรัพย์<br>
                                                                                            รายการ<br>
                                                                                            จำนวน<br>
                                                                                            ราคาต่อหน่วย<br>
                                                                                            วิธีการได้มา<br>
                                                                                            รายละเอียด<br>
                                                                                        </div>
                                                                                        <div class="col-sm-9">
                                                                                            : <?php echo showThaiDate($row['date']); ?> <br>
                                                                                            : <?php echo $row['dur_number']; ?> <br>
                                                                                            : <?php echo $row['dur_name']; ?><br>
                                                                                            : <?php echo $row['number']; ?><br>
                                                                                            : <?php echo $row['price']; ?><br>
                                                                                            : <?php echo $row['dur_receive']; ?><br>
                                                                                            : <?php echo $row['detail']; ?><br>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
            title: 'ต้องการลบข้อมูลนี้หรือไม่ ?',
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