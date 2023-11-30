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
                                    <span>&nbsp;&nbsp;<a href="#" style="color:danger">หน้าหลัก</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">

                            </div>
                        </div>
                        <!-- วัสดุ -->

                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-3 col-3">
                                        <div class="small-box bg-danger ">
                                            <div class="inner">
                                                <h3>
                                                    <div>
                                                        <?php
                                                        $check = "SELECT * FROM member
                                                        WHERE m_level = 'admin'";
                                                        $qury = mysqli_query($conn, $check);
                                                        echo mysqli_num_rows($qury) . ' คน';
                                                        ?>
                                                    </div>
                                                </h3>
                                                <p>จำนวนผู้ดูแลระบบ</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <a href="list_member.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-3">
                                        <div class="small-box bg-danger ">
                                            <div class="inner">
                                                <h3>
                                                    <div>
                                                        <?php
                                                        $check = "SELECT * FROM member
                                                        WHERE m_level = 'boss'";
                                                        $qury = mysqli_query($conn, $check);
                                                        echo mysqli_num_rows($qury) . ' คน';
                                                        ?>
                                                    </div>
                                                </h3>
                                                <p>จำนวนหัวหน้าสาขา</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <a href="list_member2.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-3">
                                        <div class="small-box bg-danger ">
                                            <div class="inner">
                                                <h3>
                                                    <div>
                                                        <?php
                                                        $check = "SELECT * FROM member
                                                        WHERE m_level = 'referee'";
                                                        $qury = mysqli_query($conn, $check);
                                                        echo mysqli_num_rows($qury) . ' คน';
                                                        ?>
                                                    </div>
                                                </h3>
                                                <p>จำนวนกรรมการบริษัท</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <a href="list_member3.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-3">
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>
                                                    <div>
                                                        <?php
                                                        $check = "SELECT * FROM member
                                                        WHERE m_level ='employee' ";
                                                        $qury = mysqli_query($conn, $check);
                                                        echo mysqli_num_rows($qury) . ' คน';
                                                        ?>
                                                </h3>
                                                <p>จำนวนพนักงาน</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <a href="list_member4.php" class="small-box-footer">ดูรายละเอียด <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>


                                    <!-- กราฟ 1 -->
                                    <div class="col-md-12">
                                        <div class="card card">
                                            <div class="card-body text-center">
                                                <img src="../images/bg.png" width="90%">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                </div>
            </div>
        </div>
        </div>
        </div>


        <!-- ส่วนท้าย -->
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['alert'])) { ?>
    <script type="text/javascript">
        Swal.fire({
            imageUrl: '../img/logo/logo.png',
            imageWidth: 250,
            imageHeight: 250,
            title: 'สวัสดีคุณ "<?= $m_name ?>"',
            text: 'เข้าสู่ระบบบริหารจัดการสินทรัพย์',
            timer: 3000,
            showCancelButton: false,
            showConfirmButton: false
        });
    </script>

<?php
    unset($_SESSION['alert']);
} ?>