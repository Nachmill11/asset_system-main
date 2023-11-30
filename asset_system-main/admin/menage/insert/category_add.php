<?php
if (@$_GET['do'] == 'f') {
  echo '<script type="text/javascript">
            swal("", "กรุณาใส่ข้อมูลให้ถูกต้อง !!", "warning");
            </script>';
  echo '<meta http-equiv="refresh" content="5;url=category.php">';
} elseif (@$_GET['do'] == 'd') {
  echo '<script type="text/javascript">
            swal("", "ข้อมูลซ้ำ กรุณาเปลี่ยน  !!", "error");
            </script>';
  echo '<meta http-equiv="refresh" content="5;url=category.php">';
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
          <h3>&nbsp;&nbsp;<a href="index.php">หน้าหลัก</a> /<a href="department.php"> ข้อมูลหมวดหมู่ครุภัณฑ์</a> / <span> เพิ่มหมวดหมู่ครุภัณฑ์</span></h3>
        </div>
      </div>
      <hr>
      <br><br><br>
      <center>
        <div class="col-md-5">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title"><i class="far fa-calendar-alt"></i> เพิ่มหมวดหมู่ครุภัณฑ์</h3>
            </div>

            <form action="category_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
              <br>
              <div class="col-md-9">
                <div class="form-group">
                  <div align="left">
                    <div class="col-sm-6 control-label"> ประเภทครุภัณฑ์ : </div>
                  </div>
                  <div class="col-sm-12">

                    <?php
                    include '../condb.php';
                    $ss = "SELECT * FROM department";
                    $dd = mysqli_query($con, $ss); ?>
                    <select name="province_id" class="form-control" required>
                      <option value="" selected disabled>-เลือกประเภทครุภัณฑ์-</option>
                      <?php foreach ($dd as $row_em) { ?>
                        <option value="<?php echo $row_em["d_id"]; ?>"><?php echo $row_em["d_code"]; ?> -&nbsp;<?php echo $row_em["d_name"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-9">
                <div class="form-group">
                  <div align="left">
                    <div class="col-sm-6 control-label"> หมวดหมู่ครุภัณฑ์ : </div>
                  </div>
                  <div class="col-sm-12">
                    <input type="text" name="c_name" required class="form-control" minlength="2" placeholder="กรอกชื่อหมวดครุภัณฑ์">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3"> </div>
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <a href="category.php" class="btn btn-warning" data-dismiss="modal">ย้อนกลับ</a>
                  </div>
                </div>
              </div>
            </form>
      </center>