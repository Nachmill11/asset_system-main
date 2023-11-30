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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_department.php" style="color:danger"> ประเภทสินทรัพย์</a> |<span> เพิ่มหมวดหมู่สินทรัพย์</span></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-2">
                        <center><br><br>
                            <div class="col-md-6">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h6 class="card-title"><i class="fa fa-plus"></i>&nbsp; เพิ่มหมวดหมู่ครุภัณฑ์</h6>
                                    </div>
                                    <form action="insert_category.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <br>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <?php
                                                    include('../condb.php');
                                                    $ID = $_GET['ID'];
                                                    $sql = "SELECT * FROM department WHERE d_id=$ID";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_array($result);
                                                    ?>
                                                    <div align="left">
                                                        <div class="col-sm-12 control-label">ชื่อประเภทสินทรัพย์ : </div>
                                                    </div>
                                                    <input type="hidden" name="d_id" value="<?php echo $row['d_code']; ?>">
                                                    <input type="hidden" name="province_id" value="<?php echo $row['d_id']; ?>">
                                                    <input type="text" class="form-control" required value="<?php echo $row['d_code']; ?> -&nbsp;<?php echo $row['d_name']; ?>" disabled>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-12 control-label"> ชื่อหมวดหมู่สินทรัพย์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" name="c_name" required class="form-control" placeholder="กรอกชื่อหมวดหมู่สินทรัพย์" autocomplete="off">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>รูปภาพ<span class="text-danger"> *</span></label><br>
                                                    <div align="center">
                                                        <img id="preview" width="150" height="150"><br><br>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" name="doc_file" class="custom-file-input" id="image" required>
                                                        <label class="custom-file-label" for="customFile">เพิ่มรูปภาพ</label>
                                                    </div>
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