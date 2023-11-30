<?php
ob_start();
session_start();
include '../condb.php';

if(!isset($_SESSION["int"]))    //เช็คว่าแถวเป็นค่าว่างมั๊ย ถ้าว่างให้ทำงานใน {}
{
	 $_SESSION["int"] = 0;
	 $_SESSION["strProduct"][0] = $_GET["id"];   //รหัสสินค้า
	 $_SESSION["Qty"][0] = 1;                   //จำนวนสินค้า
	 header("location:cart_dur.php");
}
else
{
	
	$key = array_search($_GET["id"], $_SESSION["strProduct"]);
	if((string)$key != "")
	{
		 $_SESSION["Qty"][$key] = $_SESSION["Qty"][$key] + 1;
	}
	else
	{
		 $_SESSION["int"] = $_SESSION["int"] + 1;
		 $intNewLine = $_SESSION["int"];
		 $_SESSION["strProduct"][$intNewLine] = $_GET["id"];
		 $_SESSION["Qty"][$intNewLine] = 1;
	}
	 header("location:cart_dur.php");
}

$ids = $_GET['id'];
$sql = "UPDATE durable SET status = 6 WHERE dur_id = '$ids' ";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);

?>