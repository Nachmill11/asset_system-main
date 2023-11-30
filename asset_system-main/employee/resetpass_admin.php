<!DOCTYPE html>
<html lang="en">
<?php include('head.php');  ?>
<style>
  @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);

  body {
    font-family: 'Itim', cursive;
    font-family: 'Kanit', sans-serif;
  }

  #check_password,
  span {
    font-family: 'Itim', cursive;
    font-family: 'Kanit', sans-serif;
  }
</style>

<body class="hold-transition skin-purple sidebar-mini">
  <?php
  if (@$_GET['do'] == 'finish') {
    echo '<script type="text/javascript">
        swal("สำเร็จ !!", "แก้ไขรหัสผ่านเรียบร้อย", "success");
        </script>';
    echo '<meta http-equiv="refresh" content="5;url=resetpass_admin.php" />';
  } else if (@$_GET['do'] == 'error') {
    echo '<script type="text/javascript">
        swal("เปลี่ยนรหัสผ่านของคุณไม่สำเร็จ", "กรุณาตรวจสอบใหม่อีกครั้ง !!", "error");
        </script>';
    echo '<meta http-equiv="refresh" content="5;url=resetpass_admin.php" />';
  }
  ?>
  <div class="wrapper">
    <?php include("navbar.php"); ?>
    <?php include("menu.php"); ?>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="card card-body rounded-pill">
            <div class="row">
              <div class="col-sm-12">
                <h4>&nbsp;&nbsp;<a href="index.php" style="color:teal">หน้าหลัก</a> /<span> เปลี่ยนรหัสผ่าน</span></h4>
              </div>
            </div>
          </div><br>
          <?php
          include('../condb.php');
          $sql_admin = "SELECT * FROM member WHERE member_id = '" . $member_id . "'";
          $resault_admin = mysqli_query($conn, $sql_admin);
          $row = mysqli_fetch_array($resault_admin); ?>

          <center>
            <div class="col-md-5">
              <div class="card card-teal">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-unlock-alt"></i> เปลี่ยนรหัสผ่าน</h3>
                </div>
                <form action="resetpass_admin_db.php" method="POST" enctype="multipart/form-data" name="add" class="form-horizontal" id="add">
                  <input type="hidden" name="member_id" id="member_id" class="form-control" value="<?php echo $row['member_id']; ?>" readonly="readonly">
                  <br>
                  <div align="left" class="col">
                    <a href="javascript:history.back(1)" type="button" class="btn btn-secondary rounded-pill">ย้อนกลับ : <i class="fa fa-mail-reply"></i></a>
                  </div><hr>
                  <div class="col-md-9">
                    <div class="form-group">
                      <div align="left">
                        <div class="col-sm-6 control-label"> อีเมล </div>
                      </div>
                      <div class="col-sm-12">
                        <input type="text" name="m_email" id="" class="form-control" required value="<?php echo $row['m_email']; ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <div align="left">
                        <div class="col-sm-6 control-label"> รหัสผ่านใหม่ </div>
                      </div>
                      <div class="col-sm-12">
                        <input type="password" name="m_pass" id="password" class="form-control rounded-left" placeholder="กรอกข้อมูลรหัสผ่านใหม่" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div align="left">
                        <div class="col-sm-6 control-label"> ยืนยันรหัสผ่านใหม่ </div>
                      </div>
                      <div class="col-sm-12">
                        <input type="password" name="m_subpass" id="confirmpassword" class="form-control" required placeholder="ยืนยันรหัสผ่านใหม่อีกครั้ง" required>
                        <div align="left">
                          <span id="check_password"></span>
                        </div>
                      </div>
                    </div><hr>
                    <div class="form-group">
                      <div class="col-sm-3"> </div>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                      </div>
                    </div>
                  </div>
                </form>
          </center>
        </div>
      </section>
    </div>
    <?php include("footer.php"); ?>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <?php include("script.php"); ?>
  <script>
    $('#password').keyup(function() {
      var value = $(this).val();
      console.log(value)
      if ($('#confirmpassword').val() == "") {
        if (value != "") {
          $('#check_password').html(' กรุณากรอกคอนเฟิร์มพาสเวิร์ด')
          $('#check_password').addClass('text-danger');
          $('#confirmpassword').attr('disabled', false);
        } else {
          $('#confirmpassword').attr('disabled', true);
        }
      } else {
        if (value == $('#confirmpassword').val()) {
          $('#check_password').addClass('text-success');
          $('#check_password').html(' รหัสผ่านของคุณตรงกัน สามารถใช้ได้')

          $('#check_password').removeClass('text-danger');
          $('.btn-save').attr('disabled', false);
        } else {
          $('#check_password').addClass('text-danger');
          $('#check_password').html(' รหัสผ่านของคุณไม่ตรงกัน, กรุณาใส่อีกครั้ง')

          $('#check_password').removeClass('text-success');
        }
      }
    });
    $('#confirmpassword').keyup(function() {
      var value = $(this).val();
      console.log(value)
      if (value == $('#password').val()) {
        $('#check_password').addClass('text-success');
        $('#check_password').html(' รหัสผ่านของคุณตรงกัน สามารถใช้ได้')

        $('#check_password').removeClass('text-danger');
        $('.btn-save').attr('disabled', false);
      } else {
        $('#check_password').addClass('text-danger');
        $('#check_password').html(' รหัสผ่านของคุณไม่ตรงกัน, กรุณาใส่อีกครั้ง')

        $('#check_password').removeClass('text-success');
      }

    });
  </script>
</body>

</html>