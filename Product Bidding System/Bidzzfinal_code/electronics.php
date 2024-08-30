<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Electronics</title>
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
<div class="ma">
<table>
<tr>
<th colspan="6" id="th1">ELECTRONICS</th>
</tr>
<tr>
<th>Product Id</th><th>Product Name</th><th>Image</th><th>Minimum Amount</th><th>Details</th>
</tr>
<?php 
session_start();
include ("config.php");
$uname = $_SESSION['uname'];
$conn = mysqli_connect($server,$user,$pass,$db);
$sql1 = "SELECT * FROM proinfo WHERE category='electronics' AND NOT status='sold' AND NOT seller_id='$uname'";
$res = mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res))
{
	
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['image']; ?></td>
<td><?php echo $row['amount']; ?></td>
<td><a href="prodescrip.php?id=<?php echo $row['id']; ?>">View</a></td>
</tr>
<?php
}
?>
</table>
</div>
<body>
</html>
	