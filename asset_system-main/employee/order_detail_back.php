<?php
include '../condb.php';
include("head.php");
$ids = $_GET['id'];
$sql1 = "SELECT * FROM tb_order WHERE orderID = '$ids' ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);


$sql2 = "SELECT * FROM durable ";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดเบิกวัสดุอุปกรณ์</title>
</head>
<?php $menu = "list_order_back"; ?>
<style>
    @import url(https://fonts.googleapis.com/css2?family=Itim&family=Kanit);

    body {
        font-family: 'Itim', cursive;
        font-family: 'Kanit', sans-serif;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("navbar.php"); ?>
        <?php include("menu.php"); ?>
        <div class="content-wrapper">
            <div class="container-fluid mt-4">

                <div class="col-md-12">
                    <div class="card card">
                        <div class="card-header">
                            <h6 class="m-0"><i class="fas fa-list"></i> รายละเอียดเแจ้งซ่อม</h6>
                        </div>
                        <br>
                        <div class="card-body">
                            <h5>เลขที่ใบเบิกสินทรัพย์ : <?= $ids ?></h5>
                            <hr>
                            <table class="table table-hover">
                                <thead>
                                    <tr role="row" class="info text-center" style="color: blue;">
                                        <th>รหัสสินทรัพย์</th>
                                        <th>ชื่อรายการ</th>
                                        <th>จำนวน</th>
                                        <th>ตรวจสอบสภาพสินทรัพย์</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM d_order t, d_order_detail d, durable p 
                                    WHERE t.orderID = d.orderID AND d.dur_id = p.dur_id AND d.orderID = '$ids' 
                                    ORDER BY d.dur_id ";
                                    $result = mysqli_query($conn, $sql);
                                    $sum_total = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $sum_total = $row['total_price'];
                                        $Total = $row['Total'];
                                        $orderPrice = $row['orderPrice'];
                                        $name = $row['cus_name'];

                                    ?>
                                        <tr class="text-center">
                                            <td><?= $row['dur_id'] ?></td>
                                            <td><?= $row['dur_name'] ?></td>
                                            <td><?= $row['order_Qty'] ?></td>
                                            <td><a href="order_detail_status.php?id=<?= $row['orderID'] ?>" class="btn btn-warning rounded-pill">ตรวจสอบ : <i class="fa fa-wrench"></i></a>
                                            </td>
                                        <?php } ?>
                                        </tr>
                                </tbody>
                                <?php
                                mysqli_close($conn);
                                ?>
                            </table><br>
                            <b>รวมเป็นเงินสุทธิ <?= number_format($sum_total, 2) ?> บาท</b>
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
            </section>
        </div>
        <?php include("script2.php"); ?>
</body>

</html>