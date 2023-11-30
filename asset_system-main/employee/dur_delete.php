<?php
	ob_start();
	session_start();
	
	if(isset($_GET["Line2"]))
	{
		$Line = $_GET["Line2"];
		$_SESSION["strProduct"][$Line] = "";
		$_SESSION["Qty"][$Line] = "";
	}
	header("location:cart_dur.php");

include '../condb.php';
$sql = "UPDATE durable SET status = 1";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);
?>