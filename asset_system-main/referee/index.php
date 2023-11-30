<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- วัสดุ -->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['สินทรัพย์', 'จำนวน'],
                <?php
                $sql = "SELECT * FROM durable";
                $result = mysqli_query($conn, $sql);
                while ($sql2 = mysqli_fetch_array($result)) {
                    echo '["' . $sql2['dur_name'] . '", ' . $sql2['number'] . '],';
                }
                ?>

            ]);

            var options = {
                chart: {
                    title: 'สินทรัพย์',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
   
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                $sql = "SELECT * FROM durable";
                $result = mysqli_query($conn, $sql);
                while ($sql2 = mysqli_fetch_array($result)) {
                    echo '["' . $sql2['dur_name'] . '", ' . $sql2['number'] . '],';
                }
                ?>
            ]);

            var options = {
                title: 'ชื่อสินทรัพย์',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</head>

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
                                    <div class="col-md-6">
                                        <div class="card card">
                                            <div class="card-header">
                                                <h5 class="m-0"><i class="fa fa-bar-chart"></i> สินทรัพย์ (แท่ง)</h5>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <div id="columnchart_material" style="width: 550x; height: 350px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- กราฟ 1 -->
                                    <div class="col-md-6">
                                        <div class="card card">
                                            <div class="card-header">
                                                <h5 class="m-0"><i class="fa fa-pie-chart"></i> สินทรัพย์ (วงกลม)</h5>
                                            </div>
                                            <br>
                                            <div class="card-body text-center">
                                                <div id="piechart_3d" style="width: 550px; height: 350px;"></div>
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