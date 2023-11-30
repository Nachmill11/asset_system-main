<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>
<?php
include('../condb.php');
$ID = $_GET['ID'];
$sql1 = "SELECT * FROM department WHERE d_id=$ID";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
?>

<body>
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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_department.php" style="color:danger"> ประเภทสินทรัพย์</a> |<span> แก้ไขประเภทสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <center><br><br>
                            <div class="col-md-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h6 class="card-title"><i class="fa fa-pencil"></i>&nbsp; แก้ไขประเภทสินทรัพย์</h6>
                                    </div>
                                    <form action="update_department.php" method="post" class="form-horizontal">
                                        <br>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> รหัสประเภทสินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" name="d_code" class="form-control" value="<?php echo $row1['d_code']; ?>" readonly>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> ชื่อประเภทสินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" name="d_name" required class="form-control" value="<?php echo $row1['d_name']; ?>" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3"> </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="d_id" value="<?php echo $ID; ?>" />
                                                <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                                <button type="reset" class="btn btn-danger rounded-pill" data-dismiss="modal">ล้างค่า</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                        </center>
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