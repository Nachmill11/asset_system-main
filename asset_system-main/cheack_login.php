<!DOCTYPE html>
<html lang="en">
<head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
<style>
    @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);
    body{
      font-family: 'Itim', cursive;
      font-family: 'Kanit', sans-serif;
    }
</style>
<body>
<?php
session_start();
if (isset($_POST['m_email'])) {
    include "condb.php";
    $m_email = mysqli_real_escape_string($conn, $_POST['m_email']);
    $m_pass = mysqli_real_escape_string($conn, $_POST['m_pass']);
   
   $sql = "SELECT * FROM member
    WHERE m_email ='" . $m_email . "'
    AND m_pass='" . $m_pass . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        if (isset($_POST['m_email']) && isset($_POST['m_pass'])) {
            $_SESSION["member_id"] = $row["member_id"];
            $_SESSION["m_level"] = $row["m_level"];
            $_SESSION["m_name"] = $row["m_name"];
            
        }?>
      
<?php 
$_SESSION['alert'] = '1';
if ($_SESSION['m_level'] == 'admin') {?>
      <script type="text/javascript">
        Swal.fire({
            title : "เข้าสู่ระบบสำเร็จ",
            text : "ยินดีต้อนรับเข้าสู่ระบบบริหารจัดการสินทรัพย์",
            icon : "success",
            timer: 3000,
            showConfirmButton: false
      }).then((result) => {
        if (result) {
          window.location.href = "admin/index.php";
        }
      });
      </script>
<?php }?>


<?php if ($_SESSION['m_level'] == 'boss') {?>
          <script type="text/javascript">
          Swal.fire({
            title : "เข้าสู่ระบบสำเร็จ",
            text : "ยินดีต้อนรับเข้าสู่ระบบบริหารจัดการสินทรัพย์",
            icon : "success",
            timer: 3000,
            showConfirmButton: false
          }).then((result) => {
          if (result) {
            window.location.href = "boss/index.php";
          }
          });
          </script>
<?php }?>

<?php if ($_SESSION['m_level'] == 'referee') {?>
          <script type="text/javascript">
          Swal.fire({
            title : "เข้าสู่ระบบสำเร็จ",
            text : "ยินดีต้อนรับเข้าสู่ระบบบริหารจัดการสินทรัพย์",
            icon : "success",
            timer: 3000,
            showConfirmButton: false
        }).then((result) => {
          if (result) {
            window.location.href = "referee/index.php";
          }
        });
        </script>
<?php }?>

<?php if ($_SESSION['m_level'] == 'employee') {?>
          <script type="text/javascript">
          Swal.fire({
            title : "เข้าสู่ระบบสำเร็จ",
            text : "ยินดีต้อนรับเข้าสู่ระบบบริหารจัดการสินทรัพย์",
            icon : "success",
            timer: 3000,
            showConfirmButton: false
        }).then((result) => {
          if (result) {
            window.location.href = "employee/index.php";
          }
        });
        </script>
<?php }?>


<?php } else {?>
  <script type="text/javascript">
          Swal.fire({
            title : "อีเมลหรือรหัสผ่านไม่ถูกต้อง",
            text : "กรุณาลองเข้าสู่ระบบอีกครั้งในภายหลัง",
            icon : "error",
            timer: 3000,
            showConfirmButton: false
        }).then((result) => {
          if (result) {
            window.location.href = "index.php";
          }
        });
        </script>
<?php }?>

<?php } else {

    Header("Location: index.php");

}?>

</body>
</html>
