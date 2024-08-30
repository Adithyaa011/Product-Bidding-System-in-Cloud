<!DOCTYPE html>
<html>
<head>
<title>ADD PRODUCTS</title>
<link rel="stylesheet" type="text/css" href="bgstyle.css">
<link rel="stylesheet" type="text/css" href="navigation.css">
</head>
<body>
	<header>
	<div class="navbar">
	<img class="logo" src="Bidzz.jpg" alt="Bidzz">
	<div class="dd">
		<button class="dbt">Account</button>
		<div class="dd-content" style="right:0;">
		<a href="profile.php">My Profile</a>
		<a href="mypro.php">My Products</a>
		<a href="bidproducts.php">Bidded Products</a>
		<a href="logout.html">Log Out</a>
		</div>
	</div>	
	<a href="aboutus.html">About Us</a>
	<div class="dd">
		<button class="dbt">Auction</button>
		<div class="dd-content">
		<a href="addpro.php">Add Products</a>
		<a href="delpro.php">Delete Products</a>
		</div>
	</div>
	<a href="home.html">Home</a>	
	</div>
	</header>
<center>
<div class="ma">
<table width="50%" height="60%">
<form action=" " method="POST">
<tr>
<td>ENTER PRODUCT NAME : </td>
<td><input type="text" name="pname" id="pname" required></td>
</tr>
<tr>
<td>ENTER PRODUCT DESCRIPTION: </td>
<td><textarea name="pdesc" id="pdes" rows="3" cols="30" required></textarea></td>
</tr>
<tr>
<td>ENTER MINIMUM BID AMOUNT : </td>
<td><input type="text" name="pamt" id="pamt" required></td>
</tr>
<tr>
<td>SELECT CATEGORY: </td>
<td><select id="cat" name="cat" required>
<option value="electronics">ELECTRONICS</option>
<option value="clothing">CLOTHING</option>
<option value="books">BOOKS</option>
<option value="furniture">FURNITURE</option>
</select>
</td>
</tr>
<tr>
<td>UPLOAD IMAGE : </td>
<td><input type="file" name="image" id="image" required></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" value="ADD PRODUCT" name="submit">
</td>
</tr>
</form>
</table>
</div>
</body>
</html>

<?php
session_start();
include("config.php");
$db="company";
if(isset($_POST['submit']))
{
$uname=$_SESSION['uname'];
$pname=$_POST["pname"];
$pdesc=$_POST["pdesc"];
$pamt=$_POST["pamt"];
$cat=$_POST["cat"];
$image=$_POST["image"];

$conn=mysqli_connect($server,$user,$pass,$db);
$sqla="INSERT into proinfo(seller_id,name,description,amount,category,image) VALUES ('$uname','$pname','$pdesc','$pamt','$cat','$image')";
if(mysqli_query($conn,$sqla))
{

mysqli_close($conn);
	echo  '<script>alert("PRODUCT ADDED SUCCESSFULLY!!")</script>';
	echo  '<script>window.location.href="home.html";</script>';
	exit;
}
else
	echo "<h1>ERROR !!</h1><br>".mysqli_error($conn);
}
?>