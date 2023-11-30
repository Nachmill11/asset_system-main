<?php
if (@$_GET['do'] == 'f') {
  echo '<script type="text/javascript">
            swal("", "กรุณาใส่ข้อมูลให้ถูกต้อง !!", "warning");
            </script>';
  echo '<meta http-equiv="refresh" content="5;url=asset.php?act=add" />';
} elseif (@$_GET['do'] == 'd') {
  echo '<script type="text/javascript">
            swal("", "ข้อมูลซ้ำ กรุณาเปลี่ยน  !!", "error");
            </script>';
  echo '<meta http-equiv="refresh" content="5;url=asset.php?act=add" />';
}
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3>&nbsp;&nbsp;<a href="index.php">หน้าหลัก</a> /<a href="asset.php"> ข้อมูลรายการครุภัณฑ์</a> / <span> เพิ่มรายการครุภัณฑ์</span></h3>
        </div>
      </div>
      <hr>

      <center>
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title"><i class="far fa-calendar-alt"></i> เพิ่มรายการครุภัณฑ์</h3>
            </div>
            <form action="asset_add_db.php" method="POST" enctype="multipart/form-data">
              <div align="left">
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6">
                        <label>วันเดือนปี ที่รับ<span class="text-danger"> *</span></label>
                        <input type="date" name="date_get" class="form-control" value="<?php echo date('Y-m-d', strtotime('+543 year')); ?>" required>
                      </div>
                      <div class="col-sm-6">
                        <label>หมายเลขครุภัณฑ์<span class="text-danger"> *</span></label>
                        <input type="text" name="asset_number" class="form-control" placeholder="กรอกหมายเลขครุภัณฑ์" required>
                      </div>
                      <div class="col-sm-6">
                        <label>รายการ<span class="text-danger"> *</span></label>
                        <input type="text" name="asset_name" class="form-control" placeholder="กรอกรายการครุภัณฑ์" required>
                      </div>
                      <div class="col-sm-6">
                        <label>จำนวน<span class="text-danger"> *</span></label>
                        <input type="number" name="number" class="form-control" placeholder="กรอกรายการครุภัณฑ์" required>
                      </div>
                      <?php
                      include('../condb.php');
                      $sql = "SELECT * FROM department";
                      $query = mysqli_query($con, $sql);
                      ?>
                      <div class="col-sm-6">
                        <label for="province">ประเภทครุภัณฑ์<span class="text-danger"> *</span></label>
                        <select type="text" name="d_id" id="province" class="form-control" required>
                          <option value="" selected disabled>-เลือกประเภทครุภัณฑ์-</option>
                          <?php foreach ($query as $value) { ?>
                            <option value="<?php echo $value["d_id"]; ?>"><?php echo $value['d_code']; ?> - <?php echo $value['d_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label for="amphure">หมวดหมู่ครุภัณฑ์<span class="text-danger"> *</span></label>
                        <select name="c_id" id="amphure" class="form-control">
                          <option value="" selected disabled>-เลือกหมวดหมู่ครุภัณฑ์-</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label>ราคาต่อหน่วย<span class="text-danger"> *</span></label>
                        <input type="text" name="price" class="form-control" placeholder="กรอกราต่อหน่วย" required>
                      </div>
                      <div class="col-sm-6">
                        <label>วิธีการได้มา<span class="text-danger"> *</span></label>
                        <input type="text" name="asset_receive" class="form-control" placeholder="กรอกวิธีการได้มา" required>
                      </div>
                      <div class="col-sm-6">
                        <label>ใช้ประจำที่<span class="text-danger"> *</span></label>
                        <input type="text" name="asset_position" class="form-control" placeholder="กรอกใช้ประจำที่" required>
                      </div>
                      <div class="col-sm-6">
                        <label>รายการเปลี่ยนแปลง</label>
                        <input type="text" name="asset_change" class="form-control" placeholder="กรอกรายการเปลี่ยนแปลง">
                      </div>
                      <div class="col-sm-6">
                        <label>สภาพครุภัณฑ์<span class="text-danger"> *</span></label>
                        <select name="status" class="form-control" required>
                          <option value="">--เลือกสภาพครุภัณฑ์--</option>
                          <option value="1">ใช้งานได้</option>
                          <option value="2">ชำรุด</option>
                          <option value="3">เสื่อมสภาพ</option>
                          <option value="4">สูญหาย</option>
                          <option value="5">ไม่จำเป็นต้องใช้ในราชการ</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label>รูปภาพ<span class="text-danger"> *</span></label><br>
                        <div align="center">
                          <img id="preview" width="150" height="150"><br><br>
                        </div>
                        <div class="custom-file">
                          <input type="file" name="photo" class="custom-file-input" id="image" required>
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3"> </div>
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-success">บันทึก</button>
                  <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                  <a href="asset.php" class="btn btn-warning" data-dismiss="modal">ย้อนกลับ</a>
                </div>
              </div>
          </div>
          </form>
      </center>
      <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
      <script type="text/javascript">
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
        $("#image").change(function() {
          readURL(this);
        });
      </script>
      <script src="assets/jquery.min.js"></script>
      <script src="assets/script.js"></script>