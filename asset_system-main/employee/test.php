<?php
include '../condb.php';
include("head.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
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
                                    <h4>&nbsp;&nbsp;<b><a href="index.php" style="color:teal">หน้าหลัก</a> /<span> รายการประเภทครุภัณฑ์</span></b></h4>
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
        <?php include("script2.php"); ?>
    </body>

</html>