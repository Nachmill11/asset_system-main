<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>

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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_durable.php" style="color:danger"> รายการอุปกรณ์สินทรัพย์</a> |<span> เพิ่มข้อมูลสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-danger">
                            <div class="card-header ">
                                <h6 class="m-0"><i class="fa fa-plus"></i> เพิ่มข้อมูลสินทรัพย์</h6>
                            </div>
                            <br>
                            <div>
                            <div class="container">
                                <form action="insert_durable.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>หมายเลขสินทรัพย์ <span class="text-danger"> *</span></label>
                                            <input type="text" name="dur_number" class="form-control" o placeholder="กรอกหมายเลขสินทรัพย์" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>รายการ <span class="text-danger"> *</span></label>
                                            <input type="text" name="dur_name" class="form-control" placeholder="กรอกชื่อรายการ" autocomplete="off" required>
                                        </div>

                                        <?php
                                        include('../condb.php');
                                        $sql = "SELECT * FROM department";
                                        $query = mysqli_query($conn, $sql);
                                        ?>
                                        <div class="col-md-6">
                                            <label for="province">ประเภทสินทรัพย์ <span class="text-danger"> *</span></label>
                                            <select type="text" name="d_id" id="province" class="form-control" required>
                                                <option value="" selected disabled>-เลือกประเภทสินทรัพย์-</option>
                                                <?php foreach ($query as $value) { ?>
                                                    <option value="<?php echo $value["d_id"]; ?>"><?php echo $value['d_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="amphure">หมวดหมู่สินทรัพย์ <span class="text-danger"> *</span></label>
                                            <select name="c_id" id="amphure" class="form-control">
                                                <option value="" selected disabled>-เลือกหมวดหมวดหมู่สินทรัพย์-</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>วันที่รับสินทรัพย์ <span class="text-danger"> *</span></label>
                                            <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d', strtotime('+543 year')); ?>" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label>จำนวน <span class="text-danger"> *</span></label>
                                            <input type="number" name="number" class="form-control" placeholder="กรอกราคาอุปกรณ์สินทรัพย์" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>ราคาต่อหน่วย <span class="text-danger"> *</span></label>
                                            <input type="text" name="price" class="form-control" pattern="[0-9]{1,}" title="กรุณากรอกจำนวนราคาเป็นตัวเลขเท่านั้น" OnKeyPress="return chkNumber(this)" placeholder="กรอกราคาอุปกรณ์สินทรัพย์" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>วิธีการได้มา <span class="text-danger"> *</span></label>
                                            <input type="text" name="dur_receive" class="form-control" placeholder="กรอกวิธีการได้มา" autocomplete="off" required>
                                        </div>

                                        <!-- <div class="col-md-4">
                                            <label>ใช้ประจำที่ <span class="text-danger"> *</span></label>
                                            <input type="text" name="dur_position" class="form-control" placeholder="กรอกใช้ประจำที่" autocomplete="off" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>รายการเปลี่ยนแปลง</label>
                                            <input type="text" name="dur_change" class="form-control" placeholder="กรอกรายการเปลี่ยนแปลง" autocomplete="off">
                                        </div> -->

                                        <div class="col-md-6">
                                            <label>รายละเอียดสินทรัพย์ <span class="text-danger"> *</span></label><br>
                                            <textarea name="detail" class="form-control" rows="6" placeholder="กรอกข้อมูลรายละเอียดรายการสินทรัพย์" autocomplete="off"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>รูปภาพ<span class="text-danger"> *</span></label><br>
                                            <div align="center">
                                                <img id="preview" width="100" height="100"><br><br>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="file1" class="custom-file-input" id="image" required>
                                                <label class="custom-file-label" for="customFile">เพิ่มรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div align="center">
                                <br>
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="btn btn-success rounded-pill">บันทึก</button>
                                <button type="reset" class="btn btn-danger rounded-pill" data-dismiss="modal">ยกเลิก</button>
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

