<?php
session_start();
include "config.php";
$conn = mysqli_connect($server,$user,$pass,$db);
	$bname=$_GET['bidder_id'];
    $id  = $_SESSION['id'];
	$sqld="UPDATE proinfo SET status='SOLD' where id='$id' ";
$res1=mysqli_query($conn,$sqld);
$sqle="UPDATE bidinfo SET status='SOLD' where product_id='$id'";
$res2=mysqli_query($conn,$sqle);
$sqlf="UPDATE proinfo SET sold_to='$bname' where id='$id'";

$res3=mysqli_query($conn,$sqlf);
if(!$res3)
	echo "error";
echo '<script>alert("ACCEPTED BID AMOUNT !! READY TO SELL!!");
       window.location.href="mypro.php";</script>';

       ?>
