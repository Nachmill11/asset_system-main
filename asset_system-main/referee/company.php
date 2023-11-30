<!DOCTYPE html>
<html lang="en">
<?php $menu = "company"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'head.php'; ?>
    <?php include '../condb.php';
    $sql = "SELECT * FROM company";
    $result = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_array($result);
    ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php

    if (@$_GET['do'] == 'success') {
        echo '<script type="text/javascript">
        swal("", "บันทึกข้อมูลสำเร็จ !!", "success");
        </script>';
        echo '<meta http-equiv="refresh" content="3;url=company.php" />';
    } else if (@$_GET['do'] == 'finish') {
        echo '<script type="text/javascript">
        swal("สำเร็จ !!", "บันทึกข้อมูลส่วนตัวเรียบร้อย", "success");
        </script>';
        echo '<meta http-equiv="refresh" content="3;url=company.php" />';
    } else if (@$_GET['do'] == 'wrong') {
        echo '<script type="text/javascript">
        swal("กรอกข้อมูลผิดพลาด", "", "error");
        </script>';
        echo '<meta http-equiv="refresh" content="3;url=company.php" />';
    }
    ?>

    <div class="wrapper">
        <?php include("navbar.php"); ?>
        <?php include("menu.php"); ?>

        <body class="app hold-transition sidebar-mini layout-fixed">
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="card card-body rounded-pill">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a> /<span> ข้อมูลบริษัท</span></span>
                                </div>
                            </div>
                        </div>
                        <form action="update_company.php" method="post" enctype="multipart/form-data">
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h4 align="center" class="text-primary">กรอกข้อมูลบริษัท</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label> ชื่อบริษัท</label>
                                                                <input type="text" name="com_name" class="form-control" value="<?php echo $rs['com_name']; ?>" placeholder="กรอกบริษัท" autocomplete="off">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>ชื่อสาขา</label>
                                                                <input type="text" name="com_name_s" class="form-control" value="<?php echo $rs['com_name_s']; ?>" placeholder="กรอกชื่อสาขา" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>วันที่ก่อตั้ง</label>
                                                                <input type="date" name="com_date" class="form-control" value="<?php echo $rs['com_date']; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>โทร</label>
                                                                <input type="text" name="tel" class="form-control" value="<?php echo $rs["tel"]; ?>" maxlength="10" placeholder="กรอกข้อมูลโทรศัพท์" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>อีเมล</label>
                                                                <input type="text" name="email" class="form-control" value="<?php echo $rs['email']; ?>" placeholder="กรอกข้อมูลอีเมล" autocomplete="off">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Line ID</label>
                                                                <input type="text" name="line" class="form-control" value="<?php echo $rs["line"]; ?>" placeholder="กรอกข้อมูล Line ID" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>ข้อมูลที่ตั้งบริษัท</label>
                                                                <textarea name="address_c" class="form-control" rows="4" placeholder="กรอกข้อมูลที่อยู่ส่วนตัว" autocomplete="off"><?php echo $rs['address_c']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr><br>
                                                    <div class="form-group text-center">
                                                        <input type="hidden" name="company_id" value="<?php echo $rs['company_id']; ?>" />
                                                        <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                                        <button type="reset" class="btn btn-danger rounded-pill" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                                </form>
                                                <div>
                                                </div>
                                                </center>
                                            </div>
                </section>
            </div>
            <?php include "footer.php"; ?>
            <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <?php include "script.php"; ?>

</body>

</html>