<!DOCTYPE html>
<html lang="en">
<?php $menu = "list_order_back"; ?>
<?php
include '../condb.php';
include("head.php");
$ids = $_GET['id'];
$sql1 = "SELECT * FROM durable WHERE dur_id = '$ids'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$Dtype_id = $row1['status'];
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
                                <h4>&nbsp;&nbsp;<b><a href="index.php" style="color:teal">หน้าหลัก /</a> <a href="list_durable.php" style="color:teal"> รายการอุปกรณ์ครุภัณฑ์</a> /<span> ปรับสถานะครุภัณฑ์</span></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <center><br><br>
                            <div class="col-md-5">
                                <div class="card card-teal">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-wrench"></i> ปรับสถานะครุภัณฑ์</h3>
                                    </div>
                                    <form action="update_status_d.php" method="post" class="form-horizontal">
                                        <br>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> หมายเลขครุภัณฑ์ : </div>
                                                </div>
                                                <input type="hidden" required class="form-control" value="<?= $ids ?>" autocomplete="off">
                                                <div class="col-sm-12">
                                                    <input type="text" required class="form-control" value="<?= $row1['dur_number'] ?>" disabled>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> รายการครุภัณฑ์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="4" disabled><?= $row1['dur_name'] ?></textarea>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> สภาพครุภัณฑ์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <select name="status" class="form-control">
                                                        <option selected disabled value="<?php echo $row1['status']; ?>">
                                                            <?php if ($row1['status'] == '1') {
                                                                echo 'ใช้งานได้';
                                                            } elseif ($row1['status'] == '6') {
                                                                echo 'ใช้งานได้';
                                                            } elseif ($row1['status'] == '2') {
                                                                echo 'ชำรุด';
                                                            } elseif ($row1['status'] == '3') {
                                                                echo 'เสื่อมสภาพ';
                                                            } elseif ($row1['status'] == '4') {
                                                                echo 'สูญหาย';
                                                            } elseif ($row1['status'] == '5') {
                                                                echo 'ไม่จำเป็นต้องใช้ในราชการ';
                                                            } else {
                                                                echo 'ไม่มีสถานะ';
                                                            }
                                                            ?>
                                                        <option value="1">ใช้งานได้</option>
                                                        <option value="2">ชำรุด</option>
                                                        <option value="3">เสื่อมสภาพ</option>
                                                        <option value="4">สูญหาย</option>
                                                        <option value="5">ไม่จำเป็นต้องใช้ในราชการ</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <br>

                                        <div class="form-group">
                                            <div class="col-sm-3"> </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="dur_id" value="<?php echo $ids; ?>" />
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