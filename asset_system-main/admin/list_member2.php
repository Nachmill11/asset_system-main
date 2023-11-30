<!DOCTYPE html>
<html lang="en">
<?php $menu = "list_member"; ?>
<?php include("head.php"); ?>

<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@500&display=swap');

    body {
      font-family: 'Bai Jamjuree', sans-serif;
    }
  </style>

  <body class="hold-transition sidebar-mini layout-fixed">

    <?php

    if (@$_GET['do'] == 'success') {
      echo '<script type="text/javascript">
        swal("", "เพิ่มข้อมูล และอนุมัติเรียบร้อย !!", "success");
        </script>';
      echo '<meta http-equiv="refresh" content="3;url=list_member.php" />';
    } else if (@$_GET['do'] == 'finish') {
      echo '<script type="text/javascript">
        swal("สำเร็จ !!", "แก้ไขรหัสผ่านเรียบร้อย", "success");
        </script>';
      echo '<meta http-equiv="refresh" content="3;url=list_member.php" />';
    } else if (@$_GET['do'] == 'wrong') {
      echo '<script type="text/javascript">
        swal("เปลี่ยนรหัสผ่านของคุณไม่สำเร็จ", "กรุณาตรวจสอบใหม่อีกครั้ง !!", "error");
        </script>';
      echo '<meta http-equiv="refresh" content="3;url=list_member.php" />';
    }
    ?>
    <div class="wrapper">
      <?php include("navbar.php"); ?>
      <?php include("menu.php"); ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="card card-body rounded-pill">
              <div class="row">
                <div class="col-sm-12">
                  <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a> /<span> จัดการข้อมูลผู้ใช้งาน</span></span>
                </div>
              </div>
            </div>
          </div>
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
              </div>

              <!-- เจ้าหน้าที่ -->
              <?php
              $query = "SELECT * FROM member 
          WHERE m_level = 'boss'
          ORDER BY member_id DESC";
              $result = mysqli_query($conn, $query);
              ?>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="card card-body">
                    <div align="right">
                      <a href="addMember2.php" class="btn btn-success rounded-pill">
                        <i class="fa fa-plus"></i> เพิ่มข้อมูลหัวหน้าสาขา</a>
                    </div>
                    <hr>
                    <table id="example1" class="table table-sm table-hover dataTable">
                      <thead>
                        <tr role="row" class="info" align='center' style="color: blue;">
                          <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูปภาพ</th>
                          <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อผู้เข้าใช้งาน</th>
                          <th tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อ-นามสกุล</th>
                          <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
                          <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">จัดการข้อมูล</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                          <tr>
                            <td align='center'>
                              <?php
                              if (empty($row['m_img'])) { ?>
                                <img src="../img/user.png" class="rounded-circle" width="50%">
                              <?php  } else { ?>
                                <img src="../m_img/<?= $row['m_img']; ?>" width="50%">
                              <?php
                              }
                              ?>
                            </td>
                            <td align='center'>
                              <?php echo $row['m_email']; ?>
                            </td>
                            <td align='center'>
                              <?php echo $row['m_name']; ?>
                            </td>
                            <?php
                            $st = $row['m_level'];
                            echo "<td class='hidden' align='center' style='font-size: 22px;'>";
                            if ($st == 'admin') {
                              echo "<span class='badge badge-success'>" . "ผู้ดูแลระบบ";
                            } elseif ($st == 'boss') {
                              echo "<span class='badge badge-primary'>" . "หัวหน้าสาขา";
                            } elseif ($st == 'referee') {
                              echo "<span class='badge badge-warning'>" . "กรรมการบริษัท";
                            } elseif ($st == 'employee') {
                              echo "<span class='badge badge-info'>" . "พนักงาน";
                            }
                            ?>
                            <td align='center'>
                              <a class="btn btn-info rounded-pill" title="รายละเอียดข้อมูล" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['member_id']; ?>">
                                รายละเอียด : <span class='fa fa-eye'></span>
                              </a>
                              <a class="btn btn-warning rounded-pill" title="แก้ไขข้อมูล" href="edit_member.php?id=<?php echo $row['member_id']; ?>">
                                แก้สถานะ : <span class='fa fa-pencil'></span>
                              </a>
                              <a class="btn btn-danger rounded-pill" title="ลบข้อมูล" role="button" onclick="del(this.href); return false;" href="del_member.php?id=<?php echo $row['member_id']; ?>">
                                ลบ : <span class='fas fa-trash-alt' trigger="click"></span>
                              </a>
                            </td>
                  </div>
                  <!-- popup รายละเอียด -->

                  <div class="modal fade purple" id="exampleModal<?php echo $row['member_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">รายละเอียดสมาชิก<h4>
                              <a data-bs-dismiss="modal"><i class='	fas fa-times'></i></a>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post" class="form-horizontal">
                            <div align="center">
                              <?php
                              if (empty($row['m_img'])) { ?>
                                <img src="../img/user.png" class="rounded-circle" height="150">
                              <?php  } else { ?>
                                <img src="../m_img/<?= $row['m_img']; ?>" class="rounded-circle" height="150">
                              <?php
                              }
                              ?>
                            </div>
                            <div class="card-body">
                              <i class="fa fa-user"></i> <label>ข้อมูลส่วนตัว</label><br>
                              <div class="container">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <b>ชื่อ-นามสกุล</b><br>
                                    <b>บัตรประจำตัว</b><br>
                                    <b>วันเกิด</b><br>
                                    <b>ที่อยู่</b><br>
                                    <b>เบอร์โทร</b><br>
                                  </div>
                                  <div class="col-sm-9">
                                    : <?php echo $row['m_name']; ?> <br>
                                    : <?php echo $row['m_num']; ?> <br>
                                    : <?php echo $row['date']; ?><br>
                                    : <?php echo $row['address']; ?><br>
                                    : <?php echo $row['telephone']; ?><br>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              </center>
                            </div>
                          <?php } ?>
                          </tr>
                          </tbody>
                          </table>
                        </div>
                      </div>
          </section>
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
  function del(mypage) {
        Swal.fire({
            title: 'ต้องการลบข้อมูลผู้ใช้งานหรือไม่ ?',
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