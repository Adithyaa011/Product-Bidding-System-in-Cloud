<?php
include "config.php";
$conn = mysqli_connect($server,$user,$pass,$db);
$id = $_GET['id'];
?> 
<head>
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
    <a href="prodescrip.php?id=<?php echo $id;?>">Back</a>
    <br><br><br>
<table width="50%">
<tr>
<th>PRODUCT ID</th>
<th> BIDDER ID</th>
<th>BID AMOUNT</th></tr>
<?php
$sqlb="SELECT * FROM bidinfo WHERE product_id='$id'";
$res=mysqli_query($conn,$sqlb);
while($row=mysqli_fetch_array($res))
{
?>
<tr>
            <td><?php echo $row['product_id'];?></td>
             <td><?php echo $row['bidder_id'];?></td>
			 <td><?php echo $row['bid_amount'];?></td>
</tr>
<?php
}
?>
</table>
</div>
 