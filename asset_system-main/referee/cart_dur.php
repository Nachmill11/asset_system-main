<!DOCTYPE html>
<html lang="en">
<?php $menu = "list_dur_category"; ?>
<?php include("head.php");
include '../condb.php'; ?>

<body>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php include("navbar.php"); ?>
            <?php include("menu.php"); ?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card">
                        <div class="card-header">
                            <form action="insert_cart_dur.php" id="form1" method="POST">
                                <h6 class="m-0"><i class='fas fa-calendar-plus'></i> รายการข้อมูลอุปกรณ์สินทรัพย์</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr align="center">
                                    <th style="color: blue;">ลำดับที่</th>
                                    <th style="color: blue;">รูปภาพ</th>
                                    <th style="color: blue;">หมายเลขสินทรัพย์</th>
                                    <th style="color: blue;">รายการ</th>
                                    <th style="color: blue;">ราคา</th>
                                    <th style="color: blue;">ลบรายการ</th>
                                </tr>

                                <?php
                                $Total = 0;
                                $sumPrice = 0;
                                $m = 1;
                                $sumTotal = 0;

                                if (isset($_SESSION["int"])) { //ถ้าไม่เป็นว่างให้ทำงานใน {}

                                    for ($i = 0; $i <= (int)$_SESSION["int"]; $i++) {
                                        if (($_SESSION["strProduct"][$i]) != '') {
                                            $sql1 = "SELECT * FROM durable WHERE dur_id = '" . $_SESSION["strProduct"][$i] . "' ";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $row_pro = mysqli_fetch_array($result1);
                                            $price = $row_pro['price'];

                                            $_SESSION["price"] = $row_pro['price'];
                                            $Total = $_SESSION["Qty"][$i];
                                            $sum = $Total * $row_pro['price'];
                                            $sumPrice = (float) $sumPrice + $sum;
                                            $_SESSION["sum_price"] = $sumPrice;
                                            $sumTotal = $sumTotal + $Total;
                                ?>
                                            <tr align="center">
                                                <td><?= $m ?></td>
                                                <td><img src="../img/durable/<?= $row_pro['photo'] ?>" width="80px"></td>
                                                <td>
                                                    <?= $row_pro['dur_number'] ?>
                                                </td>
                                                <td>
                                                    <?= $row_pro['dur_name'] ?>
                                                </td>
                                                <td><?= number_format($price, 2) ?></td>

                                                <input type="hidden" name="status" value="1">
                                                <td><a href="dur_delete.php?Line2=<?= $i ?>"><img src="../img/delete.png" width="30px"></i></a></td>

                                            </tr>
                                <?php
                                            $m = $m + 1;
                                        }
                                    }
                                }    //---endif
                                ?>
                                <tr>
                                    <td class="text-end" colspan="4"><b>รวมเป็นเงิน</b></td>
                                    <td class="text-center"><b><?= number_format($sumPrice, 2) ?></b></td>
                                    <td><b>บาท</b></td>
                                </tr>
                            </table>
                            <p class="text-end">จำนวนสินทรัพย์ทั้งหมด <?= $sumTotal ?> ชิ้น </p>
                            <hr>

                            <div class="alert alert-danger h7" role="alert">
                                ข้อมูลสำหรับผู้ยืมสินทรัพย์
                            </div>
                            <?php $sql2 = "SELECT * FROM member WHERE member_id = '$member_id' ";
                            $result2 = mysqli_query($conn, $sql2);
                            $row_mem = mysqli_fetch_array($result2);
                            $telephone =  $row_mem['telephone']; ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        ชื่อ-นามสกุล :
                                        <input type="text" name="cus_name" class="form-control" required value="<?= $row_mem['m_name']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        เบอร์โทรศัพท์ :
                                        <?php
                                        if (empty($telephone)) { ?>
                                            <input type="text" name="telephone" class="form-control" placeholder="กรุณากรอกเบอร์โทร" disabled>
                                            <span class="text-danger">กรุณากรอกข้อมูลให้ครบถ้วน </span><a href="list_form.php">&nbsp;&nbsp;<i style='font-size:18px' class="fa fa-plus-circle"></i></a>
                                        <?php  } else { ?>
                                            <input type="text" name="telephone" class="form-control" value="<?= $telephone ?>" readonly>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-2">
                                        วันคืน :
                                        <input type="date" name="date_end" class="form-control" required>
                                    </div>
                                    <div class="col-md-5">
                                        <label></label>
                                        <div style="text-align: right;">
                                            <a href="list_dur_category.php" type="button" class="btn btn-outline-secondary rounded-pill">เลือกอุปกรณ์สินทรัพย์ </a> |
                                            <button type="submit" name="submit" role="button" class="btn btn-outline-success rounded-pill">ยืนยันการยืม</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <?php
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        </div>
        </div>
        </section>
        </div>
        <?php include("footer.php"); ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        </div>
        <?php include("script.php"); ?>
    </body>

</html>