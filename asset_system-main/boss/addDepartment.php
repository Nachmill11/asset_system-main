<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>

<body>
    <?php
    include('../condb.php');
    $query = "SELECT MAX(d_id) as d_code FROM department";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $maxId  = $row['d_code'];
    $maxId = ($maxId + 1);
    $maxId = substr("00" . $maxId, -2);
    $nextId = $maxId;
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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_department.php" style="color:danger"> ประเภทสินทรัพย์</a> |<span> เพิ่มประเภทสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-5">
                        <center><br><br>
                            <div class="col-md-5">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h6 class="card-title"><i class="fa fa-plus"></i>&nbsp; เพิ่มประเภทสินทรัพย์</h6>
                                    </div>
                                    <form action="insert_department.php" method="post" class="form-horizontal"><br>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> ชื่อประเภทสินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" name="d_code" required class="form-control" value="<?PHP echo $nextId; ?>" readonly>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-6 control-label"> ชื่อประเภทสินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" name="d_name" required class="form-control" placeholder="กรอกชื่อประเภทสินทรัพย์" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="form-group">
                                            <div class="col-sm-3"> </div>
                                            <div class="col-sm-12">
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