<html>
<head>
<title>User registration</title>
<link rel="stylesheet" type="text/css" href="bgstyle.css">
</head>
<body>
<div class="ma">
    <form method="POST" action="">
        <table>
        <th colspan="2">Create account</th>
        <tr>
        <td><label for="uname">Create username</label></td>
        <td><input type="text" id="uname" name="uname" required></td>
        </tr>
        <tr>
        <td><label for="pwd">Password</label></td>
        <td><input type="password" id="pwd" name="pwd" placeholder="Minimum 6 characters"
        required></td></tr>
        <tr>
        <td><label for="cpwd">Re-enter password</label></td>
        <td><input type="password" id="cpwd" name="cpwd" required></td>
        </tr><tr>
        <td><label for="cname">Enter full name</label></td>
        <td><input type="text" id="cname" name="cname" required></td>
        </tr>
        <tr>
        <td><label for="mail">Enter email id</label></td>
        <td><input type="email" id="mail" name="mail" required></td></tr>
        <tr>
        <td><label for="cno">Enter mobile number</label></td>
        <td><input type="text" id="cno" name="cno" required></td></tr>
        <tr>
        <td>Gender</td>
        <td><input type="radio" name="gender" value="male">
        <label>Male</label>
        <input type="radio" name="gender" value="female">
        <label>Female</label></td></tr>
        <tr>
            <td>Address</td>
            <td>
                <textarea rows='5' id="address" name="address" required></textarea>
            </td>
        </tr>
        <tr><td colspan="2" align="center">
            <input type="submit" name="submit" onclick="return validate()" value="Create account">
        </td></tr>
        </table>        
        </form>
        </div>
        </body>
        <script>
            function validate(){
            var x = document.getElementById('cno').value;
            var y = document.getElementById('pwd').value;
            var z = document.getElementById('cpwd').value;
			
			var emailID = document.getElementById("mail").value;
            var atpos = emailID.indexOf("@");
            var dotpos = emailID.lastIndexOf(".");
			if (atpos < 1 || ( dotpos - atpos <2)){ 
			alert("Please enter correct email ID");
            return false;}
            else if( x.length!=10 || x[0]==0){
                alert("Please enter a valid mobile number");
                return false;
            } else if(y.length<6){
                alert("Please check password length");
                return false;
            } else if(z!=y){
                alert("Please re-enter the password correctly");
                return false;
            };
        }
        </script>  
        </html>   

        <?php
        include "config.php";
        if(isset($_POST['submit'])) {
            $uname = $_POST['uname'];
            $pwd = $_POST['pwd'];
            $cname = $_POST['cname'];
            $mail = $_POST['mail'];
            $cno = $_POST['cno'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];

            $conn = mysqli_connect($server,$user,$pass,$db);
            if(!$conn){
                echo "Error in creating connection".$conn->error;
            }

            $sql1="SELECT * FROM users WHERE email='$mail'";
            $sql2="SELECT * FROM users WHERE username='$uname'";
            $res = mysqli_query($conn,$sql1);
            $res1 = mysqli_query($conn,$sql2);
            

            $sql = "INSERT INTO users(username,password,name,email,contact,gender,address)
            VALUES ('$uname','$pwd','$cname','$mail','$cno','$gender','$address')";

            
            if(mysqli_num_rows($res)!=0){
                echo "<script>alert('Email id is already registered!')</script>";
            } else if(mysqli_num_rows($res1)!=0){
                echo "<script>alert('Username already exists!Kindly enter a new username')</script>";
            } else if(!mysqli_query($conn,$sql)){
                echo "<script>alert('Error in creating account')</script>". $conn->error;
            } else {
                echo ("<script>
                window.alert('Account created succefully');
                window.location.href='signin.php';
                </script>");
            };
        }
        ?>


