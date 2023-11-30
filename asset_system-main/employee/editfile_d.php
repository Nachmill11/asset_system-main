<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>
<?php
$ids = $_GET['id'];
$sql1 = "SELECT * FROM d_order WHERE orderID = '$ids' ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
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
                                    <h4>&nbsp;&nbsp;<a href="index.php" style="color:teal">หน้าหลัก /</a> <a href="report_order_d.php" style="color:teal"> รายการอนุมัติยืมครุภัณฑ์</a> /<span> ตรวจสอบ</span></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-2">
                        <center><br><br>
                            <div class="col-md-6">
                                <div class="card card-teal">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-pencil"></i>&nbsp; ตรวจสอบอนุมัติ</h3>
                                    </div><br>
                                    <div align="left">
                                        &nbsp;&nbsp;&nbsp;<a href="report_order_d.php" type="button" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
                                    </div>
                                    <form action="updateFile_d.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <br>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div align="left">
                                                    <div class="col-sm-12 control-label"> เลขที่ใบยืมครุภัณฑ์ : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" value="<?= $row1['orderID'] ?>" readonly>
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-12 control-label"> ดูไฟล์เอกสารแนบ : </div>
                                                </div><br>
                                                <div class="col-sm-12">
                                                    <i class='far fa-file-pdf' style='font-size:56px;color:red'></i>&nbsp;&nbsp;<br>
                                                    <a style='font-size:16px;' href="../img/file/<?= $row1['file']; ?>" target='_blank'>ดูไฟล์เอกสารแนบ</a>
                                                    <input type="hidden" name="textimg" class="form-control" value="<?= $row1['file']; ?>">
                                                </div><br>
                                                <div align="left">
                                                    <div class="col-sm-12 control-label"> อนุมัติไฟล์เอกสารแนบ : </div>
                                                </div><br>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="radio" name="status" value="1">
                                                            <label>ผ่าน</label>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="radio" name="status" value="2">
                                                            <label>ไม่ผ่าน</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div align="left">
                                                    <div class="col-sm-12 control-label"> เหตุผลที่ไม่ผ่าน : </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea name="comment" class="form-control" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-sm-3"> </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="orderID" value="<?= $ids ?>">
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