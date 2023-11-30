<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_durable.php" style="color:danger"> รายการอุปกรณ์สินทรัพย์</a> |<span> ปรับสถานะสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <center><br>
                            <div class="col-md-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h6 class="card-title"><i class="fa fa-wrench"></i> ปรับสถานะสินทรัพย์</h6>
                                    </div><br>
                                    <form action="update_status_d.php" method="post" class="form-horizontal">
                                        <br>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> หมายเลขสินทรัพย์ : </div>
                                                </div>
                                                <input type="hidden" required class="form-control" value="<?= $ids ?>" autocomplete="off">
                                                <div class="col-sm-12">
                                                    <input type="text" required class="form-control" value="<?= $row1['dur_number'] ?>" disabled>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> รายการสินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" rows="4" disabled><?= $row1['dur_name'] ?></textarea>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> สภาพสินทรัพย์ : </div>
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
                                                            } else {
                                                                echo 'ไม่มีสถานะ';
                                                            }
                                                            ?>
                                                        <option value="1">ใช้งานได้</option>
                                                        <option value="2">ชำรุด</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="dur_id" value="<?php echo $ids; ?>" />
                                                <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                                <button type="reset" class="btn btn-danger rounded-pill" data-dismiss="modal">ล้างค่า</button>
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