<?php
session_start();
include "config.php";
if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $conn = mysqli_connect($server,$user,$pass,$db);

    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pwd'";

    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)==0){
        echo "<script>alert('Invalid credentials!')</script>";
    } else {
        $_SESSION['uname']=$uname;
        header("Location: home.html");
    }   
}
?>

<html>
<head><title>Sign-in</title>
<link rel="stylesheet" type="text/css" href="bgstyle.css">
</head>
<body>
    <div class="ma">
    <form action="" method="POST">
        <table width="30%">
        <tr><th colspan="2">LOGIN</th></tr>
        <tr><td><label>Username</label></td>
        <td><input type="text" id="uname" name="uname"></td></tr>
        <tr><td><label>Password</label></td>
        <td><input type="password" id="pwd" name="pwd"></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="Login" name="submit"></td></tr>
</form>
</div>
</body>

</html>

