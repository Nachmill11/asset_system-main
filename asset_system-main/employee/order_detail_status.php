<!DOCTYPE html>
<html lang="en">
<?php $menu = "list_order_back"; ?>
<?php
include '../condb.php';
include("head.php");


?>

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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_order_back.php" style="color:danger"> รายละเอียดเแจ้งซ่อม</a> |<span> ตรวจสอบสภาพการใช้งาน</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <center><br><br>
                            <div class="col-md-5">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-wrench"></i> แจ้งซ่อม</h3>
                                    </div>
                                    <form action="update_status.php" method="post" class="form-horizontal">
                                        <br>
                                        <div class="col-md-9">
                                            <?php
                                            $ids = $_GET['id'];
                                            $sql = "SELECT * FROM d_order t, d_order_detail d, durable p 
                                    WHERE t.orderID = d.orderID AND d.dur_id = p.dur_id AND d.orderID = '$ids' 
                                    ORDER BY d.dur_id ";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result); ?>
                                            <div class="form-group">
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> หมายเลขใบเบิก : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" required class="form-control" value="<?= $row['orderID'] ?>" autocomplete="off" disabled>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> รายการสินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input class="form-control" rows="4" disabled value="<?= $row['dur_name'] ?>"></input>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> สภาพสินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="4" name="comment" placeholder="รายละเอียดแจ้งซ่อม"><?= $row['comment'] ?></textarea>
                                                </div>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> เปลี่ยนสถานะ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <select name="order_status" class="form-control">
                                                    <option value="" selected disabled>-เลือกตรวจสอบสภาพ-</option>
                                                        <option value="3">แจ้งซ่อม</option>
                                                        <option value="2">รับคืนสินทรัพย์</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-sm-3"> </div>
                                            <div class="col-sm-12">

                                                <input type="hidden" name="orderID" value="<?php echo $ids; ?>" />
                                                <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                                <button type="reset" class="btn btn-danger rounded-pill" data-dismiss="modal">ยกเลิก</button>
                                                <a href="list_durable.php" type="button" class="btn btn-secondary rounded-pill">ย้อนกลับ</a>
                                            </div>
                                        </div>
                                </div>
                                </form>
                        </center>
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