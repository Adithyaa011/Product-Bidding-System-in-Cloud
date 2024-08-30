<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bid Products</title>
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
<th>Product Id</th><th>Product Name</th><th>Seller</th><th>Bid Amount</th><th>Status</th>
</tr>
<?php 
session_start();
include ("config.php");
$uname = $_SESSION['uname'];
$conn = mysqli_connect($server,$user,$pass,$db);
$sql1 = "SELECT * FROM bidinfo WHERE bidder_id ='$uname'";

$res = mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res))
{
	
?>
<tr>
<td><?php echo $row['product_id']; ?></td>
<td><?php echo $row['product_name']; ?></td>
<td><?php echo $row['seller_id']; ?></td>
<td><?php echo $row['bid_amount']; ?></td>
<td><?php if(strcasecmp($row['status'],"NOT SOLD")==0)
           echo "IN PROGRESS";
           else
		   {
               $pro_id = $row['product_id'];
            $sql2="SELECT sold_to FROM proinfo WHERE id='$pro_id'";
            $row2=mysqli_query($conn,$sql2);
            $res2 = mysqli_fetch_array($row2);	
            if($res2['0']==$uname)
            echo "WON THE BID!!";
            else
            echo "LOST THE BID!!";
     		}?></td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>
	
