<!DOCTYPE html>
<html lang="en">
<?php $menu = "list_product"; ?>
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

    <?php
    if (@$_GET['do'] == 'success') {
      echo '<script type="text/javascript">
          swal("บันทึกการเบิกวัสดุเรียบร้อยแล้ว", "กรุณาติดต่อเจ้าหน้าที่เพื่อดำเนินการ", "success");
          </script>';
      echo '<meta http-equiv="refresh" content="5;url=list_product.php" />';
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
                  <h4>&nbsp;&nbsp;<a href="index.php" style="color:teal">หน้าหลัก</a> /<span> รายการเบิกวัสดุ</span></h4>
                </div>
              </div>
            </div>
          </div>
          <?php
          $query = "SELECT * FROM type AS p
        INNER JOIN product AS t ON p.type_id = t.type_id
        INNER JOIN unit AS u ON t.unit_id = u.unit_id
        ORDER BY pro_id ASC";
          $result = mysqli_query($conn, $query);
          ?>
          <div class="card card-body">
            <?php
            include('../condb.php');
            $sql = "SELECT * FROM type";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="form-group">
              <div class="form-group row">
                <div class="col-md-4">
                  <select type="text" name="ss" id="province" class="form-control" required onchange="window.location.href='list_product.php?ss='+this.value">
                    <option value="" selected disabled>-เลือกประเภทวัสดุ-</option>
                    <?php foreach ($query as $value) { ?>
                      <option value="<?php echo $value["type_id"]; ?>"><?php echo $value["type_name"]; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <a class="btn btn-secondary rounded-pill" href="list_product.php">ทั้งหมด</a>
                </div>
                <div align="right" class="col">
                  <a href="cart.php" type="button" class="btn btn-primary rounded-pill"><i class='fas fa-calendar-plus'></i> รายการเบิกวัสดุ</a>
                </div>
              </div>
            </div>
            <?php
            if (isset($_GET['ss'])) {
              include('../condb.php');
              $ss = $_GET['ss'];
              $query = "SELECT * FROM product p,type t ,unit u
              WHERE p.type_id = t.type_id AND p.unit_id = u.unit_id AND t.type_id = '$ss' ORDER BY pro_id ASC";
              $result = mysqli_query($conn, $query);
            ?>
              <table id="example1" class="table table-sm table-hover dataTable">
                <thead>
                  <tr role="row" class="info text-center" style="color: blue;">
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รหัสวัสดุ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รูปภาพ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อรายการ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ประเภทวัสดุ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จำนวน</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">หน่วย</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;">จัดการ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                    $amount1 = $row['amount'];
                    $price = $row['price']; ?>
                    <tr class="text-center">
                      <td><?= $row['pro_id'] ?></td>
                      <td><img src="../img/<?= $row['image'] ?>" width="80" height="80"></td>
                      <td><?= $row['pro_name'] ?></td>
                      <td class="text-center"><?= $row['type_name'] ?></td>
                      <td class="text-center"><?= $row['amount'] ?></td>
                      <td class="text-center"><?= $row['unit_name'] ?></td>
                      <div>
                      <td>
                        <?php
                        if ($amount1 <= 0) { ?>
                          <a class="btn btn-danger rounded-pill disabled" href="order.php?id=<?= $row['pro_id'] ?>">หมด : <i class="fa fa-remove"></i></a>
                        <?php
                        } else { ?>
                          <a class="btn btn-success rounded-pill " href="order.php?id=<?= $row['pro_id'] ?>">เบิก : <i class="fa fa-external-link"></i></a>
                        <?php }  ?>
                        <a class="btn btn-info rounded-pill" title="รายละเอียดข้อมูล" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['pro_id']; ?>">
                          รายละเอียด : <span class='fa fa-eye'></span>
                        </a>
                      </td>
                      <!-- Modal -->
                      <div class="modal fade purple" id="exampleModal<?php echo $row['pro_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                              <div align="center">
                                <a data-bs-dismiss="modal"><i class='fas fa-times'></i></a>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div align="center">
                                <img src="../img/<?= $row['image'] ?>" height="200">
                              </div>
                              <div class="card-body">
                                <i class="fa fa-success"></i> <label>รายละเอียดข้อมูลวัสดุ</label><br>
                                <div class="container">
                                  <div class="row">
                                    <div class="col--3">
                                      รหัสวัสดุ<br>
                                      ชื่อรายการ<br>
                                      ประเภท<br>
                                      ราคา<br>
                                      รายละเอียด<br>
                                    </div>
                                    <div class="col-sm-9">
                                      : <?php echo $row['pro_id']; ?> <br>
                                      : <?php echo $row['pro_name']; ?><br>
                                      : <?php echo $row['type_name']; ?><br>
                                      : <?= number_format($price, 2) ?> บาท<br>
                                      : <?php echo $row['detail']; ?><br>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                      <?php } ?>
                    </tr>
                </tbody>
              </table>
            <?php   } else {   ?>
              <table id="example1" class="table table-sm table-hover dataTable">
                <thead>
                  <tr role="row" class="info" align='center' style="color: blue;">
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รหัสวัสดุ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รูปภาพ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อรายการ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ประเภทวัสดุ</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">จำนวน</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">หน่วย</th>
                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;">จัดการ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) {
                    $amount1 = $row['amount'];
                    $price = $row['price']; ?>
                    <tr>
                      <td><?= $row['pro_id'] ?></td>
                      <td><img src="../img/<?= $row['image'] ?>" width="80" height="80"></td>
                      <td><?= $row['pro_name'] ?></td>
                      <td class="text-center"><?= $row['type_name'] ?></td>
                      <td class="text-center"><?= $row['amount'] ?></td>
                      <td class="text-center"><?= $row['unit_name'] ?></td>
                      <td class="text-center">
                        <?php
                        if ($amount1 <= 0) { ?>
                          <a class="btn btn-danger rounded-pill disabled" href="order.php?id=<?= $row['pro_id'] ?>">หมด : <i class="fa fa-remove"></i></a>
                        <?php
                        } else { ?>
                          <a class="btn btn-success rounded-pill " href="order.php?id=<?= $row['pro_id'] ?>">เบิก : <i class="fa fa-external-link"></i></a>
                        <?php }  ?>
                        <a class="btn btn-info rounded-pill" title="รายละเอียดข้อมูล" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['pro_id']; ?>">
                          รายละเอียด : <span class='fa fa-eye'></span>
                        </a>
                      </td>
                      <!-- Modal -->
                      <div class="modal fade purple" id="exampleModal<?php echo $row['pro_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                              <div align="center">
                                <a data-bs-dismiss="modal"><i class='fas fa-times'></i></a>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div align="center">
                                <img src="../img/<?= $row['image'] ?>" height="200">
                              </div>
                              <div class="card-body">
                                <i class="fa fa-success"></i> <label>รายละเอียดข้อมูลวัสดุ</label><br>
                                <div class="container">
                                  <div class="row">
                                    <div class="col--3">
                                      รหัสวัสดุ<br>
                                      ชื่อรายการ<br>
                                      ประเภท<br>
                                      ราคา<br>
                                      รายละเอียด<br>
                                    </div>
                                    <div class="col-sm-9">
                                      : <?php echo $row['pro_id']; ?> <br>
                                      : <?php echo $row['pro_name']; ?><br>
                                      : <?php echo $row['type_name']; ?><br>
                                      : <?= number_format($price, 2) ?> บาท<br>
                                      : <?php echo $row['detail']; ?><br>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
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