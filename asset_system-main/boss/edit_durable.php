<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>

<?php
$sql1 = "SELECT * FROM department";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$Dtype_id = $row1['d_name'];
?>

<?php
$sql2 = "SELECT * FROM category";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
$Ctype_id = $row2['c_name'];
?>

<?php
$durid = $_GET['id'];
$sql6 = "SELECT * FROM durable p,department d, category c  
WHERE p.d_id = d.d_id AND p.c_id = c.c_id AND  dur_id = '$durid' ";
$result6 = mysqli_query($conn, $sql6);
$row6 = mysqli_fetch_array($result6);
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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_durable.php" style="color:danger"> รายการอุปกรณ์สินทรัพย์</a> |<span> แก้ไขข้อมูลสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-danger">
                            <div class="card-header ">
                                <h6 class="m-0"><i class="fa fa-edit"></i> แก้ไขข้อมูลครุภัฑณ์</h6>
                            </div><br>
                            <div class="form-group">
                                <div class="container">
                                    <form action="update_durable.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>หมายเลขสินทรัพย์ <span class="text-danger"> *</span></label>
                                                <input type="text" name="dur_number" class="form-control" onkeypress="return isNumberKey(event)" onkeyup="autoTab2(this,1)" minlength="14" maxlength="17" value="<?= $row6['dur_number'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>รายการ <span class="text-danger"> *</span></label>
                                                <input type="text" name="dur_name" class="form-control" placeholder="กรอกชื่อรายการ" value="<?= $row6['dur_name'] ?>" autocomplete="off" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="province">ประเภทสินทรัพย์ <span class="text-danger"> *</span></label>
                                                <select type="text" name="d_id" id="province" class="form-control" required>
                                                    <option value="" selected disabled><?php echo $row6["d_name"]; ?></option>
                                                    <?php foreach ($result1 as $value) {
                                                        $dtype_id = $value['d_name']; ?>
                                                        <option value="<?php echo $value["d_id"]; ?>" <?php if ($Dtype_id == $dtype_id) {
                                                                                                            echo "selected=selected";
                                                                                                        } ?>>
                                                            <?php echo $value['d_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="amphure">หมวดหมู่สินทรัพย์ <span class="text-danger"> *</span></label>
                                                <select type="text" name="c_id" id="amphure" class="form-control">
                                                    <option value="<?php echo $row6["c_id"]; ?>" ><?php echo $row6["c_name"]; ?></option>
                                                    <?php foreach ($result4 as $value2) {
                                                        $ctype_id = $value2['c_name'];
                                                    ?>
                                                        <option value="<?php echo $value2["c_id"]; ?>" <?php if ($Ctype_id == $ctype_id) {
                                                                                                            echo "selected=selected";
                                                                                                        } ?>>
                                                            <?php echo $value2['c_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>วันที่รับสินทรัพย์ <span class="text-danger"> *</span></label>
                                                <input type="date" name="date" class="form-control" value="<?= $row6['date'] ?>" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label>จำนวน <span class="text-danger"> *</span></label>
                                                <input type="number" name="number" class="form-control" placeholder="กรอกราคาอุปกรณ์วัสดุ" value="<?= $row6['number'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>ราคาต่อหน่วย <span class="text-danger"> *</span></label>
                                                <input type="text" name="price" class="form-control" pattern="[0-9]{1,}" value="<?= $row6['price'] ?>" title="กรุณากรอกจำนวนราคาเป็นตัวเลขเท่านั้น" OnKeyPress="return chkNumber(this)" placeholder="กรอกราคาอุปกรณ์วัสดุ" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>วิธีการได้มา <span class="text-danger"> *</span></label>
                                                <input type="text" name="dur_receive" class="form-control" placeholder="กรอกวิธีการได้มา" value="<?= $row6['dur_receive'] ?>" autocomplete="off" required>
                                            </div>

                                            <!-- <div class="col-md-4">
                                                <label>ใช้ประจำที่ <span class="text-danger"> *</span></label>
                                                <input type="text" name="dur_position" class="form-control" placeholder="กรอกใช้ประจำที่" value="<?= $row6['dur_position'] ?>" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>รายการเปลี่ยนแปลง</label>
                                                <input type="text" name="dur_change" class="form-control" placeholder="กรอกรายการเปลี่ยนแปลง" value="<?= $row6['dur_change'] ?>" autocomplete="off">
                                            </div> -->
                                            <div class="col-md-6">
                                                <label>รายละเอียดสินทรัพย์ <span class="text-danger"> *</span></label><br>
                                                <textarea name="detail" class="form-control" rows="6" autocomplete="off"><?= $row6['detail'] ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label>รูปภาพ<span class="text-danger"> *</span></label><br>
                                                <div align="center">
                                                    <img id="preview" width="100px" src="../img/durable/<?= $row6['photo'] ?>"><br><br>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="file1" class="custom-file-input" id="image" accept="image/*">
                                                    <input type="hidden" name="textimg" class="form-control" value="<?= $row6['photo'] ?>">
                                                    <label class="custom-file-label" for="customFile">เพิ่มรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div align="center">
                                    <br>
                                    <input type="hidden" name="dur_id" value="<?php echo $durid; ?>" />
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                    <button type="reset" class="btn btn-danger rounded-pill" data-dismiss="modal">ล้างค่า</button>
                                </div>
                                </form>
                                <br>
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
<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>

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
            var pattern = new String("____-___-____-___");
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