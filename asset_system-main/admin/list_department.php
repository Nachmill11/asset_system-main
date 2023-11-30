<!DOCTYPE html>
<html lang="en">
<?php $menu = "index"; ?>
<?php include("head.php"); ?>

<body>
    <body class="hold-transition sidebar-mini layout-fixed">
    <?php 
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("สำเร็จ !!", "เพิ่มประเภทสินทรัพย์เรียบร้อย", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="2;url=list_department.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("สำเร็จ !!", "แก้ไขข้อมูลเรียบร้อย", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="2;url=list_department.php" />';

  }else if(@$_GET['do']=='delete'){
    echo '<script type="text/javascript">
          swal("ลบสำเร็จ !!", "ลบข้อมูลเรียบร้อย", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="2;url=list_department.php" />';

  }else if(@$_GET['do']=='d'){
        echo '<script type="text/javascript">
              swal("มีข้อมูลอยู่ในระบบแล้ว !!", "กรุณากรอกข้อมูลใหม่อีกครั้ง", "warning");
              </script>';
        echo '<meta http-equiv="refresh" content="1;url=list_department.php" />';
    
    }else if(@$_GET['do']=='error'){
    echo '<script type="text/javascript">
          swal("ไม่สามารถลบได้ !!", "มีข้อมูลที่กำลังใช้งานอยู่ในระบบ", "error");
          </script>';
    echo '<meta http-equiv="refresh" content="2;url=list_department.php" />';
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
                                <span>&nbsp;&nbsp;<a href="index.php" style="color:danger">หน้าหลัก</a> |<span> ประเภทสินทรัพย์</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="card card">
                        <div class="card-body">
                            <div align="right">
                                <a href="addDepartment.php" class="btn btn-success rounded-pill">
                                    <i class="fa fa-plus"></i>&nbsp; เพิ่มข้อมูลประเภทสินทรัพย์</a>
                            </div>
                            <hr>
                            <table id="example1" class="table table-bordered table-hover dataTable">
                                <thead>
                                    <tr role="row" class="info text-center" style="color: blue;">
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รหัสประเภท</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 40%;">ชื่อประเภทสินทรัพย์</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">เพิ่มหมวดหมู่สินทรัพย์</th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;">จัดการข้อมูล</th>
                                </thead>
                                    <?php
                                    $sql = "SELECT * FROM department";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $row['d_code'] ?></td>
                                            <td><?= $row['d_name'] ?></td>
                                            <td class="text-center">
                                                <a style="color:gray" title="เพิ่มหมวดหมู่สินทรัพย์" href="addCategory.php?=&ID=<?php echo $row['d_id']; ?>">
                                                    <i  style='font-size:24px' class="fa fa-plus-circle"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-warning rounded-pill" href="edit_department.php?=&ID=<?php echo $row['d_id']; ?> ">แก้ไข : <span class='fa fa-pencil'></span></a>
                                                <a class="btn btn-danger rounded-pill" role="button" onclick="del(this.href); return false;" href="del_department.php?id=<?= $row['d_id'] ?> ">ลบ : <span class='fas fa-trash-alt' trigger="click"></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
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
            title: 'ต้องการลบข้อมูลนี้หรือไม่?',
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