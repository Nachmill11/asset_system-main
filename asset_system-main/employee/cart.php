<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php");
include '../condb.php'; ?>

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
                            <form action="insert_cart.php" id="form1" method="POST">
                                <h5 class="m-0"><i class="fas fa-list"></i> รายการเบิกวัสดุ</h5>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped">
                                <tr align="center">
                                    <th style="color: blue;">ลำดับที่</th>
                                    <th style="color: blue;">ชื่อวัสดุ</th>
                                    <th style="color: blue;">ราคา</th>
                                    <th style="color: blue;">จำนวน</th>
                                    <th style="color: blue;">ราคารวม</th>
                                    <th style="color: blue;">หน่วย</th>
                                    <th style="color: blue;">นำออก</th>
                                </tr>

                                <?php
                                $Total = 0;
                                $sumPrice = 0;
                                $m = 1;
                                $sumTotal = 0;

                                if (isset($_SESSION["intLine"])) { //ถ้าไม่เป็นว่างให้ทำงานใน {}

                                    for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
                                        if (($_SESSION["strProductID"][$i]) != '') {
                                            $sql1 = "SELECT * FROM product p, unit c WHERE p.unit_id = c.unit_id AND pro_id = '" . $_SESSION["strProductID"][$i] . "' ";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $row_pro = mysqli_fetch_array($result1);
                                            $price = $row_pro['price'];
                                            $amount = $row_pro['amount'];

                                            $_SESSION["price"] = $row_pro['price'];
                                            $Total = $_SESSION["strQty"][$i];
                                            $sum = $Total * $row_pro['price'];
                                            $sumPrice = (float) $sumPrice + $sum;
                                            $_SESSION["sum_price"] = $sumPrice;
                                            $sumTotal = $sumTotal + $Total;

                                ?>
                                            <tr align="center">
                                                <td><?= $m ?></td>
                                                <td>
                                                    <img src="../img/<?= $row_pro['image'] ?>" width="80px" height="100" class="border">
                                                    <?= $row_pro['pro_name'] ?>
                                                </td>
                                                <td><?= number_format($price, 2) ?></td>
                                                <td>
                                                    <?php if ($_SESSION["strQty"][$i] <= $amount - 1) { ?>
                                                        <a href="order.php?id=<?= $row_pro['pro_id'] ?>" class="btn btn-secondary">+</a>&nbsp;
                                                    <?php } ?>
                                                    <?= $_SESSION["strQty"][$i] ?> &nbsp;
                                                    <?php if ($_SESSION["strQty"][$i] > 1) { ?>
                                                        <a href="order_del.php?id=<?= $row_pro['pro_id'] ?>" class="btn btn-secondary">-</a>
                                                    <?php } ?>
                                                </td>
                                                <td><?= number_format($sum, 2) ?></td>
                                                <td><?= $row_pro['unit_name'] ?></td>
                                                <td><a href="pro_delete.php?Line=<?= $i ?>"><img src="../img/delete.png" width="30px"></i></a></td>
                                            </tr>
                                <?php
                                            $m = $m + 1;
                                        }
                                    }
                                }    //---endif
                                ?>
                                <tr>
                                    <td class="text-end" colspan="4"><b>รวมเป็นเงิน</b></td>
                                    <td></td>
                                    <td class="text-center"><b><?= number_format($sumPrice, 2) ?></b></td>
                                    <td><b>บาท</b></td>
                                </tr>
                            </table>
                            <p class="text-end">จำนวนวัสดุทั้งหมด <?= $sumTotal ?> ชิ้น </p>
                            <div class="alert alert-success h7" role="alert">
                                ข้อมูลสำหรับผู้เบิกวัสดุ
                            </div>
                            <?php $sql2 = "SELECT * FROM member WHERE member_id = '$member_id' ";
                            $result2 = mysqli_query($conn, $sql2);
                            $row_mem = mysqli_fetch_array($result2);
                            $telephone =  $row_mem['telephone']; ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        ชื่อ-นามสกุล :
                                        <input type="text" name="cus_name" class="form-control" value="<?= $row_mem['m_name']; ?>" readonly>
                                    </div>
                                    <div class="col-md-3">
                                    เบอร์โทรศัพท์ :
                                        <?php
                                        if (empty($telephone)) { ?>
                                             <input type="text" name="telephone" class="form-control" placeholder="กรุณากรอกเบอร์โทร" disabled>
                                             <span class="text-danger">กรุณากรอกข้อมูลให้ครบถ้วน </span><a href="list_form.php">&nbsp;&nbsp;<i  style='font-size:18px' class="fa fa-plus-circle"></i></a>
                                        <?php  } else { ?>
                                            <input type="text" name="telephone" class="form-control" value="<?= $telephone ?>" readonly>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- <div class="col-md-2">
                                        วันคืน :
                                        <input type="date" name="date_end" class="form-control" required>
                                    </div> -->
                                    <div class="col-md-7">
                                        <label></label>
                                        <div style="text-align: right;">
                                            <a href="list_product.php" type="button" class="btn btn-outline-secondary rounded-pill"><i class="fa fa-plus"></i> เลือกวัสดุ </a> |
                                            <button type="submit" name="submit" role="button" class="btn btn-outline-success rounded-pill">ยืนยันการเบิก</button>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  function del(mypage) {
    Swal.fire({
      title: 'ยืนยันการทำรายการหรือไม่ ?',
      showDenyButton: true,
      confirmButtonText: `ยืนยัน`,
      denyButtonText: `ยกเลิก`,
      icon: 'warning'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = mypage;
      }
    });
  }
</script>