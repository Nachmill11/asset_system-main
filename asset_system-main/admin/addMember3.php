<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
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
    include('../condb.php');
    $code = "amc";
    $mail = "@localhost.com";
    $query = "SELECT MAX(member_id) as m_email FROM member";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $maxId  = $row['m_email'];
    $maxId = ($maxId + 1);
    $nextEmail = $code . $maxId . $mail;
    $nextPassword = $code . $maxId;
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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_member.php" style="color:danger"> จัดการข้อมูลผู้ใช้งาน</a> |<span> เพิ่มข้อมูลเจ้าหน้าที่</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <center><br><br>
                            <div class="col-md-8">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h6 class="m-0" align="left">+<i class="fa fa-user"></i> เพิ่มข้อมูลกรรมการบริษัท</h6>
                                    </div>
                                    <form action="insert_member.php" method="post" class="form-horizontal">
                                        <br>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-6" align="left">
                                                            <label>อีเมล</label>
                                                            <input type="text" name="m_email" class="form-control" value="<?= $nextEmail ?>" readonly >
                                                        </div>
                                                        <div class="col-6" align="left">
                                                            <label>รหัสผ่าน</label>
                                                            <input type="text" name="m_pass" class="form-control" value="<?= $nextPassword ?>" readonly>
                                                        </div>
                                                        <div class="col-12" align="left">
                                                            <label>ชื่อ-นามสกุล (ไทย) <span class="text-danger"> *</span></label>
                                                            <input type="text" name="m_name" class="form-control" placeholder="กรอกชื่อ-นามสกุล" autocomplete="off" required>
                                                        </div>
                                                        <div class="col-12" align="left">
                                                            <label>บัตรประจำตัวประชาชน<span class="text-danger"> *</span></label>
                                                            <input type="number" name="m_num" class="form-control"  maxlength="13" placeholder="กรอกหมายเลขบัตรประจำตัวประชาชน" autocomplete="off" required >
                                                        </div>
                                                        <div class="col-6" align="left">
                                                            <label>โทร<span class="text-danger"> *</span></label>
                                                            <input type="number" name="telephone" class="form-control" placeholder="กรอกเบอร์โทร" autocomplete="off" maxlength="10" placeholder="กรอกข้อมูลโทรศัพท์" autocomplete="off">
                                                        </div>
                                                        <div class="col-6" align="left">
                                                            <label>สถานะ<span class="text-danger"> *</span></label>
                                                            <select class="form-control" name="m_level"">
                                                                <option selected disabled="disabled">เลือกสถานะ</option>
                                                                <option value="referee">กรรมการบริษัท</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12" align="left">
                                                            <p><span class="text-danger">*หมายเหตุ</span> <br>
                                                                อีเมลและรหัสผ่านจะสร้างขึ้นอัตโนมัติใช้งานระบบนี้เท่านั้น สมาชิกสามารถนำไปเปลี่ยนได้</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
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

    function chkNumber(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }
</script>