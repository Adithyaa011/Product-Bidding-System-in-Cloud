<?php
session_start();
include "config.php";
$conn = mysqli_connect($server,$user,$pass,$db);
$id = $_GET['id']; 
$uname = $_SESSION['uname'];

$sql = "SELECT * FROM proinfo WHERE id='$id'";

$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);

?>
<html>
    <head>
        <title>PRODUCT DETAILS</title>
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
    <form id="form1" action="" method="post"></form>
    <img src="<?php echo $row['image']?>" alt="img" width="200px">
    <table>
    <caption style="caption-side:bottom"><br>Note : Bid amount must be greater than the minimum amount<br><br>
    <a href="bids.php?id=<?php echo $row['id'];?>">View all bids for this product<a>
</caption>
        <tr>
            <td>Product Name</td>
            <td><?php echo $row['name'];?></td>
        </tr>
        <tr>
            <td>Product description</td>
            <td><?php echo $row['description'];?></td>
        </tr>
        <tr>
            <td>Seller Id</td>
            <td><?php echo $row['seller_id'];?></td>
        </tr>
        <tr>
            <td>Category</td>
            <td><?php echo $row['category'];?></td>
        </tr>
        <tr>
            <td>Minimum Bid</td>
            <td><?php echo $row['amount'];?></td>
        </tr>
        <tr>
            <td>Enter your bid amount(in Rs.)</td>
            <td><input type="text" id="bamt" name="bamt" form="form1"></td>
        </tr>
        <tr><td colspan="2" align="center"><input type="submit" name="bid" value="Bid" form="form1"></td></tr>
</table>
 

</div>
</body>
</html>

<?php
if(isset($_POST['bid'])){
    $bamt = $_POST['bamt'];
    $name = $row['name'];
    $seller = $row['seller_id'];

    $sql1="SELECT * FROM bidinfo WHERE bidder_id='$uname' AND product_id='$id' ";
    $res = mysqli_query($conn,$sql1);

    if($bamt<$row['amount']){
        echo '<script>alert("Your bid must be greater than the minimum amount!")</script>';
    }
    else if(mysqli_num_rows($res)==0){
    $sql2 = "INSERT INTO bidinfo(product_id,product_name,seller_id,bidder_id,bid_amount)  
    VALUES ('$id','$name','$seller','$uname',
    '$bamt')";
    if(mysqli_query($conn,$sql2)){
        echo '<script>alert("Your bid has been placed successfully")</script>';
    } else {
        echo "Error in placing bid".$conn->error;
    }
} else {
    $sql3 = "UPDATE bidinfo SET bid_amount='$bamt' WHERE bidder_id='$uname' AND product_id='$id'";
    if(mysqli_query($conn,$sql3)){
        echo '<script>alert("Your bid has been changed successfully")</script>';
    } else {
        echo "Error in placing bid".$conn->error;
    }
}
}
?>