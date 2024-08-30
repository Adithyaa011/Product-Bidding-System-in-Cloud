<?php
session_start();
include "config.php";

$uname = $_SESSION['uname'];

$conn = mysqli_connect($server,$user,$pass,$db);

$sql="SELECT * FROM users WHERE username='$uname'";

$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
if(isset($_POST['save']))  {
    $cname = $_POST['cname'];
    $mail = $_POST['mail'];
    $cno = $_POST['cno'];
    $address = $_POST['address'];

    $sql2 = "UPDATE users SET name='$cname',email='$mail',contact='$cno',address='$address'
                    WHERE username='$uname'";
    
    if(mysqli_query($conn,$sql2)){
        echo '<script>alert("Changes updated successfully!");</script>';
        echo '<script>window.location.href="home.html"</script>';
    } else {
        echo "Couldn't update changes!". $conn->error;
    }
}
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
<form action="" method="POST">	
	<br><br><br>
    <h2 align="center">PERSONAL INFORMATION</h2>
    <table style="text-align: center;">
    <tr>
        <td><label for="cname">Name</label></td>
        <td><input type="text" id="cname" name="cname" value="<?php echo $row['name'];?>"></td>
        </tr>
        <tr>
        <td><label for="mail">Email id</label></td>
        <td><input type="email" id="mail" name="mail" value="<?php echo $row['email'];?>" ></td></tr>
        <tr>
        <td><label for="cno">Mobile number</label></td>
        <td><input type="text" id="cno" name="cno" value="<?php echo $row['contact'];?>" ></td></tr>
        <tr>
            <td>Address</td>
            <td>
                <textarea rows='5' id="address" name="address">
                <?php echo $row['address'];?>
                </textarea>
            </td>
        </tr>
        <tr><td colspan="2" align="center"><input type="submit" value="Save Changes" name="save"></td></tr>
    </table>    
    </form> 
</div>
</body>

