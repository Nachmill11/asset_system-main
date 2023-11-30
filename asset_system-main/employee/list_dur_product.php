<!DOCTYPE html>
<html lang="en">
<?php $menu = "list_dur_category"; ?>
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
                  <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a><span></span> | รายการประเภทสินทรัพย์</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card card">
              <div class="card-body">
              <div class="form-group">
                            <div class="form-group row">
                                <div class="col-md-6">
                                </div>
                                <div align="right" class="col">
                                    <a href="cart_dur.php" type="button" class="btn btn-primary rounded-pill"><i class='fas fa-calendar-plus'></i> รายการยืมอุปกรณ์สินทรัพย์</a>
                                </div>
                            </div>
                        </div>
                <table id="example1" class="table table-sm table-hover dataTable">
                  <thead>
                    <tr role="row" class="info text-center" style="color: blue;">
                      <th>#</th>
                      <th>หมายเลขสินทรัพย์</th>
                      <th>รายการ</th>
                      <th>ราคา/หน่วย</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($_GET['s'])) {
                      include '../condb.php';
                      $s = $_GET['s'];
                      $sql = "SELECT * FROM durable AS f
                    INNER JOIN category AS c ON f.c_id=c.c_id
                    WHERE status = '1' AND c.c_id = '$s'";
                      $result = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_array($result)) {
                        $price = $row['price'];
                    ?>
                        <tr>
                          <td class="text-center"><img src="../img/durable/<?= $row['photo'] ?>" width="100px"></td>
                          <td><?= $row['dur_number'] ?></td>
                          <td><?= $row['dur_name'] ?></td>
                          <td class="text-center"><?= number_format($price, 2) ?></td>
                          <td align="center">
                            <a class="btn btn-success rounded-pill " href="order_dur.php?id=<?= $row['dur_id'] ?>">เบิก : <i class="fa fa-external-link"></i></a>
                            <a class="btn btn-info rounded-pill" title="รายละเอียดข้อมูล" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['dur_id'] ?>">
                              รายละเอียด : <span class='fa fa-eye'></span>
                            </a>
                          </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $row['dur_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                                <div align="center">
                                  <a data-bs-dismiss="modal"><i class='fas fa-times'></i></a>
                                </div>
                              </div>
                              <div class="modal-body">
                                <div align="center">
                                  <img src="../img/durable/<?= $row['photo']; ?>" height="200">
                                </div><br>
                                <i class="fa fa-success"></i> <label>รายละเอียดข้อมูลสินทรัพย์</label><br>
                                <div class="container">
                                  <div class="row">

                                    <div class="col--3">
                                      หมายเลขสินทรัพย์<br>
                                      รายการ<br>
                                      รายละเอียด<br>
                                    </div>

                                    <div class="col-sm-9">
                                      : <?php echo $row['dur_number']; ?> <br>
                                      : <?php echo $row['dur_name']; ?><br>
                                      : <?php echo $row['detail']; ?><br>
                                    </div>
                                  </div>
                                </div>
                                <br><br>
                              </div>
                            </div>
                          </div>
                        <?php
                      }
                        ?>

                  </tbody>
                </table>
                <?php
                      mysqli_close($conn);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("footer.php"); ?>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    <?php include("script.php"); ?>
  </body>
<?php } ?>

</html>