<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include('../condb.php');
  $member_id = $_SESSION['member_id'];
  $m_name = $_SESSION['m_name'];
  $m_level = $_SESSION['m_level'];
  if ($m_level != 'employee') {
    Header("Location: ../logout.php");
  }
  $sql = "SELECT m_name,m_img,m_email FROM member WHERE member_id=$member_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $m_img = $row['m_img'];
  $m_name = $row['m_name'];
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="../img/logo/logo.png" />
  <title>AMC SYSTEM | ระบบสินทรัพย์</title>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@500&display=swap');

      body {
        font-family: 'Bai Jamjuree', sans-serif;
      }
    </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="font-6/css/all.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script rel="stylesheet" href="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <script rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    th,
    td {
      white-space: nowrap;
    }
  </style>
</head>