<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
</head>

<body>
  <?php include '../condb.php';
  $sql = "SELECT * FROM member WHERE member_id = '$member_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  ?>
  <nav class="main-header navbar navbar-expand navbar-danger navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <lord-icon src="https://cdn.lordicon.com/vmibgbhr.json" trigger="click" colors="primary:white" style="width:25px;height:25px"></lord-icon>
        </a>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" style="color:white">ระบบบริหารจัดการสินทรัพย์บริษัท ยะลานํารุ่ง จํากัด</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt" style="color:white"></i>
        </a>
      </li>

      <ul class="navbar-nav" <ul class="navbar-nav">
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">


            <li class="dropdown user user-menu">
              <a style="color:white" class="nav-link dropdown-toggle  href=" #" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['m_name']; ?>&nbsp;
                <?php
                if (empty($row['m_img'])) { ?>
                  <img src="../img/user.png" class="rounded-circle" height="30">
                <?php  } else { ?>
                  <img src="../m_img/<?= $row['m_img']; ?>" class="rounded-circle" height="30">
                <?php
                }
                ?>
              </a>

              <ul class="dropdown-menu">
                <li class="user-header">
                  <?php
                  if (empty($row['m_img'])) { ?>
                    <img src="../img/user.png" class="img-circle">
                  <?php  } else { ?>
                    <img src="../m_img/<?= $row['m_img']; ?>" class="img-circle" alt="User Image user-image">
                  <?php
                  }
                  ?>

                  <p><b style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-50">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                      </svg> พนักงาน</b><br>
                    <?php echo $row['m_email']; ?><br>
                    <?php echo $row['m_name']; ?><br>
                  </p><br>
                <li></li>

                <hr>
                <li align="center">
                  <a class="dropdown-item" href="list_form.php"><i class="fas fa-user"></i> ข้อมูลส่วนตัว</a>
                  <a class="dropdown-item" onclick="loguot()" role="button"><i class="nav-icon fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                </li>
                <br>
              </ul>
        </div>
      </ul>


      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="text/javascript">
        function loguot() {
          Swal.fire({
            title: 'ต้องการออกจากระบบหรือไม่ ?',
            showDenyButton: true,
            confirmButtonText: `ตกลง`,
            denyButtonText: `ยกเลิก`,
            icon: 'warning'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "../logout.php";
            }
          });
        }
      </script>
      <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
      <script type="text/javascript">
        $(function() {


          var nowDateTime = new Date("<?= date("m/d/Y H:i:s") ?>");
          var d = nowDateTime.getTime();
          var mkHour, mkMinute, mkSecond;
          setInterval(function() {
            d = parseInt(d) + 1000;
            var nowDateTime = new Date(d);
            mkHour = new String(nowDateTime.getHours());
            if (mkHour.length == 1) {
              mkHour = "0" + mkHour;
            }
            mkMinute = new String(nowDateTime.getMinutes());
            if (mkMinute.length == 1) {
              mkMinute = "0" + mkMinute;
            }
            mkSecond = new String(nowDateTime.getSeconds());
            if (mkSecond.length == 1) {
              mkSecond = "0" + mkSecond;
            }
            var runDateTime = mkHour + ":" + mkMinute + ":" + mkSecond;
            $("#css_time_run").html(runDateTime);
          }, 1000);


        });
      </script>
      <?php
      echo "<meta charset='utf-8'>";
      function ThDate()
      {
        $ThDay = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
        $ThMonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $week = date("w");
        $months = date("m") - 1;
        $day = date("d");
        $years = date("Y") + 543;
        return "$ThDay[$week]
		 $day
		 $ThMonth[$months]
		 $years";
      }
      ?>
    </ul>
  </nav>
</body>

</html>