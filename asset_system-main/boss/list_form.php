<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include 'head.php'; ?>
<style>
    @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);

    body,
    h3 {
        font-family: 'Itim', cursive;
        font-family: 'Kanit', sans-serif;
    }
</style>
<?php include '../condb.php';
$sql = "SELECT * FROM member WHERE member_id = '" . $member_id . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php

    if (@$_GET['do'] == 'success') {
        echo '<script type="text/javascript">
        swal("", "เพิ่มข้อมูลสำเร็จ !!", "success");
        </script>';
        echo '<meta http-equiv="refresh" content="2;url=list_form.php" />';
    } else if (@$_GET['do'] == 'finish') {
        echo '<script type="text/javascript">
        swal("สำเร็จ !!", "บันทึกข้อมูลส่วนตัวเรียบร้อย", "success");
        </script>';
        echo '<meta http-equiv="refresh" content="2;url=list_form.php" />';
    } else if (@$_GET['do'] == 'date') {
        echo '<script type="text/javascript">
        swal("สำเร็จ !!", "ไม่สามารถระบุวันเกิดในอนาคตได้ !", "error");
        </script>';
        echo '<meta http-equiv="refresh" content="2;url=list_form.php" />';
    } else if (@$_GET['do'] == 'wrong') {
        echo '<script type="text/javascript">
        swal("กรอกข้อมูลผิดพลาด", "", "error");
        </script>';
        echo '<meta http-equiv="refresh" content="2;url=list_form.php" />';
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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a> |<span> ข้อมูลส่วนตัว</span></span>
                                </div>
                            </div>
                        </div>
                        <form action="update_form.php" method="post" enctype="multipart/form-data">
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
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <br><br>
                                                    <h4 align="center" class="text-teal">รูปภาพประจำตัว</h4>
                                                    <hr>
                                                    <div class="form-group">
                                                        <center>
                                                            <p class="my-2">
                                                                <?php
                                                                if (empty($row['m_img'])) { ?>
                                                                    <img src="../img/user.png" id="preview" width="350" height="350">;
                                                                <?php    } else { ?>
                                                                    <img src="../m_img/<?= $row['m_img']; ?>" id="preview" width="350" height="350">
                                                                <?php
                                                                }
                                                                ?>
                                                            </p>
                                                        </center>
                                                        <label class="form-label">เปลี่ยนรูปภาพ</label>
                                                        <input type="file" name="m_img" id="image" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="callout callout-success">
                                                    <div class="card-body">
                                                        <h4 align="center" class="text-teal">กรอกประวัติส่วนตัว</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <i class="fa fa-user"></i> <label> ชื่อ-นามสกุล<span class="text-danger"> *</span></label>
                                                                    <input type="text" name="m_name" class="form-control" value="<?php echo $row['m_name']; ?>" placeholder="กรอกข้อมูลชื่อ-นามสกุล" autocomplete="off" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <i class="far fa-address-card"></i> <label>เลขบัตรประจำตัว<span class="text-danger"> *</span></label>
                                                                    <input type="text" name="m_num" class="form-control" value="<?php echo $row['m_num']; ?>" onkeypress="return isNumberKey(event)" onkeyup="autoTab2(this,1)" minlength="13" maxlength="17" placeholder="กรอกข้อมูลเลขบัตรประจำตัว" autocomplete="off" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <i class="fas fa-birthday-cake"></i> <label>วันเกิด<span class="text-danger"> *</span></label>
                                                                    <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <i class="fas fa-phone"></i> <label>โทรศัพท์<span class="text-danger"> *</span></label>
                                                                    <input type="text" name="telephone" class="form-control" value="<?php echo $row["telephone"]; ?>" onkeyup="autoTab2(this,2)" onkeypress="return isNumberKey(event)" minlength="10" maxlength="12" placeholder="กรอกข้อมูลโทรศัพท์" autocomplete="off" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <i class="fas fa-envelope"></i> <label>อีเมล<span class="text-danger"> *</span></label>
                                                                    <input type="text" name="m_email" class="form-control" value="<?php echo $row['m_email']; ?>" placeholder="กรอกข้อมูลอีเมล" autocomplete="off" required>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="m_line" value="1">
                                                            <!-- <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <i class="fab fa-line"></i> <label> Line ID<span class="text-danger"> *</span></label>
                                                                    <input type="text" name="m_line" class="form-control" value="<?php echo $row["m_line"]; ?>" placeholder="กรอกข้อมูล Line ID" autocomplete="off" required>
                                                                </div>
                                                            </div> -->
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <i class="fas fa-home"></i> <label> ข้อมูลที่อยู่ส่วนตัว<span class="text-danger"> *</span></label>
                                                                    <textarea name="address" class="form-control" rows="4" placeholder="กรอกข้อมูลที่อยู่ส่วนตัว" autocomplete="off" required><?php echo $row['address']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr><br>
                                                        <div class="form-group">
                                                            <input type="hidden" name="m_img2" value="<?php echo $row['m_img']; ?>">
                                                            <input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />
                                                            <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                                            <button type="reset" class="btn btn-danger rounded-pill" data-dismiss="modal">ยกเลิก</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    <div>
                                                    </div>
                                                </div>
                                                </center>
                                            </div>
                </section>
            </div>
            <?php include "footer.php"; ?>
            <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <?php include "script.php"; ?>
    <script type="text/javascript">
        function autoTab2(obj, typeCheck) {

            if (typeCheck == 1) {
                var pattern = new String("_-____-_____-__-_");
                var pattern_ex = new String("-");
            } else {
                var pattern = new String("___-___-____");
                var pattern_ex = new String("-");
            }
            var returnText = new String("");
            var obj_l = obj.value.length;
            var obj_l2 = obj_l - 1;
            for (i = 0; i < pattern.length; i++) {
                if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                    returnText += obj.value + pattern_ex;
                    obj.value = returnText;
                }
            }
            if (obj_l >= pattern.length) {
                obj.value = obj.value.substr(0, pattern.length);
            }
        }
    </script>

    <script language="javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <script>
        picker_date(document.getElementById("my_date"), {
            year_range: "-65:+10"
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>