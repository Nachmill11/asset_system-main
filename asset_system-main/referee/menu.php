<aside class="main-sidebar sidebar-light-danger elevation-4">

  <body>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@500&display=swap');

      body {
        font-family: 'Bai Jamjuree', sans-serif;
      }
    </style>
    <li href="" class="brand-link">
      <img src="../img/logo/logo.png" class="brand-image">
      &nbsp;<h7 class="brand-text font-weight-light">&nbsp;<b>AMC SYSTEM</b></h7>
    </li>
    <?php include '../condb.php'; ?>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" align="center">
          <?php
          if (empty($row['m_img'])) { ?>
            <img src="../img/user.png" class="brand-image img-circle" alt="User Image" width='40%'>
          <?php  } else { ?>
            <img src="../m_img/<?= $row['m_img']; ?>" class="brand-image img-circle" alt="User Image" width='40%'>
          <?php
          }
          ?>
        </div>
        <div class="info" align="center">
          <a class="d-block" style="color:"> คุณ : <?php echo $_SESSION['m_name']; ?> </a>
          <?php
          $st = $row['m_level'];
          echo "<td class='hidden' align='center' style='font-size: 22px;'>";
          if ($st == 'admin') {
            echo "<span class='badge badge-success'>" . "ผู้ดูแลระบบ";
          } elseif ($st == 'boss') {
            echo "<span class='badge badge-success'>" . "หัวหน้าสาขา";
          } elseif ($st == 'referee') {
            echo "<span class='badge badge-success'>" . "กรรมการบริษัท";
          } elseif ($st == 'employee') {
            echo "<span class='badge badge-success'>" . "พนักงาน";
          }
          ?>
          </a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php $page = basename($_SERVER['PHP_SELF']); ?>
          <li class="nav-item
                        <?php if (
                          $page == 'index.php'
                        ) : echo 'menu-open';
                        endif; ?>">
          <li class="nav-item">
            <a href="index.php" class="nav-link <?php if ($menu == "index") {
                                                  echo "active";
                                                } ?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>หน้าหลัก</p>
            </a>

            <!-- สินทรัพย์ -->
          <li class="nav-item
                      <?php if (
                        $page == 'list_department.php'
                        or $page == 'list_category.php'
                        or $page == 'list_durable.php'
                      ) : echo 'menu-open';
                      endif; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                จัดการข้อมูลสินทรัพย์
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="list_department.php" class="nav-link
                      <?php if (
                        $page == 'list_department.php'
                      ) : echo 'active';
                      endif; ?>">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>ประเภทสินทรัพย์</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="list_category.php" class="nav-link
                      <?php if (
                        $page == 'list_category.php'
                      ) : echo 'active';
                      endif; ?>">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>หมวดหมู่สินทรัพย์</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="list_durable.php" class="nav-link
                      <?php if (
                        $page == 'list_durable.php'
                      ) : echo 'active';
                      endif; ?>">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>รายการอุปกรณ์สินทรัพย์</p>
                </a>
              </li>
            </ul>
          </li>

            <!-- สมาชิก -->
          <li class="nav-item">
            <a href="list_member.php" class="nav-link <?php if ($menu == "list_member") {
                                                        echo "active";
                                                      } ?> ">
              <i class="nav-icon 	fa fa-users"></i>
              <p>ข้อมูลพนักงาน</p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="list_dur_category.php" class="nav-link <?php if ($menu == "list_dur_category") {
                                                              echo "active";
                                                            } ?> ">
              <i class="nav-icon fas fa-external-link-alt"></i>
              <p>เบิกสินทรัพย์</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="report_order_d.php" class="nav-link <?php if ($menu == "report_order_d") {
                                                            echo "active";
                                                          } ?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>รออนุมัติสินทรัพย์</p>
              <span class="badge badge-warning right rounded-pill" style="font-size: 12px;">
                <?php
                $check = "SELECT * FROM d_order
                WHERE order_status ='1'";
                $qury = mysqli_query($conn, $check);
                echo mysqli_num_rows($qury);
                ?>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_order_back.php" class="nav-link <?php if ($menu == "list_order_back") {
                                                            echo "active";
                                                          } ?> ">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>รายการแจ้งซ่อม</p>
              <span class="badge badge-warning right rounded-pill" style="font-size: 12px;">
                <?php
                $check = "SELECT * FROM d_order
                WHERE order_status ='3'";
                $qury = mysqli_query($conn, $check);
                echo mysqli_num_rows($qury);
                ?>
            </a>
          </li>


          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
          </li>
        </ul>
      </nav>
    </div>
    </script>
</aside>