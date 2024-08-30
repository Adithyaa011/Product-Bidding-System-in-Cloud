<!DOCTYPE html>
<html>
<head>
<title>MY PRODUCTS</title>
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
<table width="70%" height="50%">
<tr>
<th>PRODUCT ID</th>
<th>PRODUCT NAME</th>
<th>PRODUCT CATEGORY</th>
<th>INITIAL BIDDING AMOUNT</th>
<th>STATUS</th>
</tr>
<?php
session_start();
$uname = $_SESSION['uname'];
include ("config.php");
$db="company";
$conn=mysqli_connect($server,$user,$pass,$db);
//if($conn)
//echo "CONNECTION SUCCESSFUL!!";
$sqlb="SELECT * FROM proinfo WHERE seller_id='$uname' ";
$res=mysqli_query($conn,$sqlb);
while($row=mysqli_fetch_array($res))
{
	$_SESSION['id']=$row['id'];     //id - product id
?>
<tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
             <td><?php echo $row['category'];?></td>
             <td><?php echo $row['amount'];?></td>
			<td>
			<?php
			if(strcasecmp($row['status'],"sold")==0)
				echo "SOLD";
			else
				echo '<a href="viewbid.php">VIEW BID</a>';
			?>
			</td>
			 
 </tr>
<?php
}

//header("Location:home.html");//echo '<a href="viewbid.php?id=<?php echo $row['id'];   ">VIEW BID</a>';

mysqli_close($conn);
?>

</table>
</div>
</body>
</html>