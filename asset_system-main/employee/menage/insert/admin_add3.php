<meta charset="UTF-8">
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<?php
if (@$_GET['do'] == 'f') {
  echo '<script type="text/javascript">
            swal("", "กรุณาใส่ข้อมูลให้ถูกต้อง !!", "warning");
            </script>';
  echo '<meta http-equiv="refresh" content="2;url=admin.php?act=add" />';
} elseif (@$_GET['do'] == 'd') {
  echo '<script type="text/javascript">
            swal("", "ข้อมูลซ้ำ กรุณาเปลี่ยน  !!", "error");
            </script>';
  echo '<meta http-equiv="refresh" content="1;url=admin.php?act=add" />';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <h3>&nbsp;&nbsp;<a href="index.php">หน้าหลัก</a> /<a href="admin.php"> ข้อมูลสมาชิก</a> / <span> เพิ่มข้อมูลสมาชิก</span></h3>
          </div>
        </div>
        <hr>
        <center>
          <div class="col-md-5">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-unlock-alt"></i> เพิ่มข้อมูลสมาชิก</h3>
              </div>
              <form action="admin_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <br>
                <div class="col-md-9">
                  <div class="form-group">
                    <div align="left">
                      <div class="col-sm-6 control-label"> ชื่อผู้เข้าใช้งาน </div>
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="m_name" id="" class="form-control" placeholder="กรอกชื่อ-นามสกุล" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div align="left">
                      <div class="col-sm-6 control-label"> อีเมล </div>
                    </div>
                    <div class="col-sm-12">
                      <input type="text" name="m_email" id="" class="form-control" placeholder="กรอกอีเมลเข้าใช้งาน" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div align="left">
                      <div class="col-sm-6 control-label"> รหัสผ่านใหม่ </div>
                    </div>
                    <div class="col-sm-12">
                      <input type="password" name="m_pass" class="form-control rounded-left" placeholder="กรอกข้อมูลรหัสผ่านใหม่" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div align="left">
                      <div class="col-sm-6 control-label"> สถานะ </div>
                    </div>
                    <div class="col-sm-12">
                      <select name="m_level" class="form-control" required>
                        <option value="member">สมาชิก</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3"> </div>
                  <div class="col-sm-6">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <a href="admin.php" class="btn btn-warning" data-dismiss="modal">ย้อนกลับ</a>
                  </div>
                </div>
            </div>
            </form>
        </center>
        <script>
          $('#email').keyup(function() {
            var value = $(this).val();
            if (value == "") {
              $('#message_email').html(' กรุณากรอกอีเมล @');
              $('#message_email').addClass('fa fa-times');
              $('#message_email').addClass('text-danger');

              $('#message_email').removeClass('fas fa-check');
              $('#message_email').removeClass('text-success');
            } else {
              $.ajax({
                method: 'post',
                url: 'function_ajax.php',
                data: {
                  value: value,
                  function: 'checkemail'
                },
                success: function(data) {
                  if (data > 0) {
                    $('#message_email').addClass('fas fa-times');
                    $('#message_email').addClass('text-danger');
                    $('#message_email').html(' อีเมลนี้มีผู้ใช้งานแล้ว');
                    $('.btn-save').attr('disabled', true);

                    $('#message_email').removeClass('fas fa-check');
                    $('#message_email').removeClass('text-success');
                  } else {
                    $('#message_email').addClass('fas fa-check');
                    $('#message_email').addClass('text-success');
                    $('#message_email').html(' อีเมลนี้สามารถใช้งานได้');
                    $('.btn-save').attr('disabled', false);

                    $('#message_email').removeClass('fas fa-times');
                    $('#message_email').removeClass('text-danger');

                  }
                }
              })
            }
          });
        </script>
</body>

</html>

</div>
</form>
</div>
</div>