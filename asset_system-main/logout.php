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
    body {
      font-family: 'Itim', cursive;
      font-family: 'Kanit', sans-serif;
    }
</style>
  <body>
  <?php
session_start();
session_destroy();  
// header("Location: login.php");	
?>

<script type="text/javascript">
  Swal.fire({
    title : "ออกจากระบบสำเร็จ",
    text : "",
    icon : "success",
    timer: 2000,
    showConfirmButton: false
}).then((result) => {
  if (result) {
    window.location.href = "index.php";
  } 
});
</script>
  </body>
</html>

