<!DOCTYPE html>
<html lang="en">
<?php $menu = "list_dur_category"; ?>
<?php include("head.php"); ?>

<body>
    <body class="hold-transition sidebar-mini layout-fixed">
        <?php
        if (@$_GET['do'] == 'success') {
            echo '<script type="text/javascript">
          swal("บันทึกการเบิกสินทรัพย์เรียบร้อยแล้ว", "กรุณาติดต่อเจ้าหน้าที่เพื่อดำเนินการ", "success");
          </script>';
            echo '<meta http-equiv="refresh" content="5;url=list_dur_category.php" />';
        } ?>
        <div class="wrapper">
            <?php include("navbar.php"); ?>
            <?php include("menu.php"); ?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="card card-body rounded-pill">
                            <div class="row">
                                <div class="col-sm-12">
                                    <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a> |<span> รายการยืมสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM category AS c
        INNER JOIN department AS d ON c.d_id=d.d_id
        ORDER BY c_id ASC";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <div class="card card-body">
                        <?php
                        include('../condb.php');
                        $sql = "SELECT * FROM department";
                        $query = mysqli_query($conn, $sql);
                        ?>
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <select type="text" name="ss" id="province" class="form-control" required onchange="window.location.href='list_dur_category.php?ss='+this.value">
                                        <option value="" selected disabled>-เลือกประเภทสินทรัพย์-</option>
                                        <?php foreach ($query as $value) { ?>
                                            <option value="<?php echo $value["d_id"]; ?>"><?php echo $value["d_code"]; ?> - <?php echo $value["d_name"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-secondary rounded-pill" href="list_dur_category.php">ทั้งหมด</a>
                                </div>
                                <div align="right" class="col">
                                    <a href="cart_dur.php" type="button" class="btn btn-primary rounded-pill"><i class='fas fa-calendar-plus'></i> รายการยืมอุปกรณ์สินทรัพย์</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['ss'])) {
                            include('../condb.php');
                            $ss = $_GET['ss'];
                            $query = "SELECT * FROM category AS c
            INNER JOIN department AS d ON c.d_id=d.d_id
            WHERE d.d_id = '$ss'
            ORDER BY c_id ASC";
                            $result = mysqli_query($conn, $query);
                        ?>
                            <table id="example1" class="table table-bordered table-hover dataTable">
                                <thead>
                                    <tr role="row" class="info" align='center' style="color: blue;">
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">#</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รหัสประเภทสินทรัพย์</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ชื่อหมวดหมู่สินทรัพย์</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <td align='center'>
                                                <img src="../img/category/<?= $row['doc_file']; ?>" class="img-fluid rounded shadow" width="80px" height="80px">
                                            </td>
                                            <td align='center'>
                                                <a style="color: black;" href="department.php" title="<?php echo $row['d_name']; ?>"><?php echo $row['d_code']; ?></a>
                                            </td>
                                            <td align='center'>
                                                <?php echo $row['c_name']; ?>
                                            </td>
                                            <form action="list_dur_product.php" method="get">
                                                <td align='center'>
                                                    <button class="btn btn-info rounded-pill" type="submit" name="s" value="<?php echo $row['c_id']; ?>"> เลือกอุปกรณ์ : <i class="fa fa-search"></i></button>
                                                </td>
                                            </form>
                                        <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
                        <?php   } else {   ?>
                            <table id="example1" class="table table-bordered table-hover dataTable">
                                <thead>
                                    <tr role="row" class="info" align='center' style="color: blue;">
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">#</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รหัสประเภทสินทรัพย์</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ชื่อหมวดหมู่สินทรัพย์</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <td align='center'>
                                                <img src="../img/category/<?= $row['doc_file']; ?>" width="80px" height="80px">
                                            </td>
                                            <td align='center'>
                                                <a style="color: black;" href="department.php" title="<?php echo $row['d_name']; ?>"><?php echo $row['d_code']; ?></a>
                                            </td>
                                            <td align='center'>
                                                <?php echo $row['c_name']; ?>
                                            </td>
                                            <form action="list_dur_product.php" method="get">
                                                <td align='center'>
                                                    <button class="btn btn-info rounded-pill" type="submit" name="s" value="<?php echo $row['c_id']; ?>"> เลือกอุปกรณ์ : <i class="fa fa-external-link"></i></button>
                                                </td>
                                            </form>
                                        <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
                            <?php
                            mysqli_close($conn);
                            ?>
                        <?php } ?>
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