<?php
include "config.php";
$conn = mysqli_connect($server,$user,$pass,$db);
$id = $_GET['id']; 

$del = mysqli_query($conn,"DELETE FROM proinfo where id = '$id'");

if($del)
{	
	
    mysqli_close($conn); 
	echo "<script>alert('Product deleted successfully');
	window.location.href='delpro.php';</script>";
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>