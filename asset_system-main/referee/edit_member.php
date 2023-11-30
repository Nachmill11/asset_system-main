<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>
<?php include("../condb.php"); ?>
<?php
$ids = $_GET['id'];
?>

<body>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);

        body {
            font-family: 'Itim', cursive;
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <?php
    $sql = "SELECT * FROM member WHERE member_id = '$ids'";
    $result = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_array($result);
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
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก |</a> <a href="list_member.php" style="color:danger"> จัดการข้อมูลผู้ใช้งาน</a> |<span> แก้ไขสถานะ</span></ห>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <center><br><br>
                            <div class="col-md-5">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h6 class="m-0" align="left"><i class="fa fa-edit"></i> แก้ไขสถานะผู้เข้าใช้งาน</h6>
                                    </div>
                                    <form action="update_member.php" method="post" class="form-horizontal"  enctype="multipart/form-data">
                                        <br>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12" align="left">
                                                            <label>อีเมล</label>
                                                            <input type="text" class="form-control" value="<?= $rs['m_email'] ?>" disabled>
                                                        </div>
                                                        <div class="col-12" align="left">
                                                            <label>ชื่อ-นามสกุล</label>
                                                            <input type="text" class="form-control" value="<?= $rs['m_name'] ?>" disabled>
                                                        </div>
                                                        <div class="col-12" align="left">
                                                            <label>บัตรประจำตัวประชาชน<span class="text-danger"> *</span></label>
                                                            <?php
                                                            if (empty($rs['m_num'])) { ?>
                                                                <input type="text" class="form-control" placeholder="ยังไม่ระบุข้อมูล" disabled>
                                                            <?php  } else { ?>
                                                                <input type="text" class="form-control" value="<?= $rs['m_num'] ?>" disabled>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-12" align="left">
                                                            <label>สถานะ<span class="text-danger"> *</span></label>
                                                            <select name="m_level" class="form-control">
                                                                <option value="<?php echo $rs['m_level']; ?>">
                                                                    <?php if ($rs['m_level'] == 'admin') {
                                                                        echo 'ผู้ดูแลระบบ';
                                                                    } elseif ($rs['m_level'] == 'boss') {
                                                                        echo 'หัวหน้าสาขา';
                                                                    } elseif ($rs['m_level'] == 'referee') {
                                                                        echo 'กรรมการบริษัท';
                                                                    } elseif ($rs['m_level'] == 'employee') {
                                                                        echo 'พนักงาน';
                                                                    } else {
                                                                        echo '-โปรดเลือก-';
                                                                    }
                                                                    ?>
                                                                <option value="admin">ผู้ดูแลระบบ</option>
                                                                <option value="boss">หัวหน้าสาขา</option>
                                                                <option value="referee">กรรมการบริษัท</option>
                                                                <option value="employee">พนักงาน</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="hidden" name="member_id" value="<?= $ids ?>">
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