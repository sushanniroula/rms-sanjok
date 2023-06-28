<!DOCTYPE html>

<html lang="en">

<head>
   
 <meta charset="UTF-8">
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>Index Page</title>
    
<link rel="stylesheet" href="css/login.css">
    
<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body background="Image/basnet.jpg">
    
<div class="title">
        
<span> Result Management System</span>
<br>
</div>
<center><h1><a href="index1.html"><img src="Image/back.png" ></a></h1></center>

    
<div class="main">
         
<div class="login">
            
<form action="" method="post" name="login">
                
<fieldset>
                    
<legend class="heading">Admin Login</legend>
                    
<input type="text" name="userid" placeholder="Email" autocomplete="off">
                    
<input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" value="Login">
                
</fieldset>
            
</form>    
        
</div>
        
    
</div>
<div class="footer">
        <div class="footinfo">
          <center>  <p>Copyright & copy 2022 All Right Reserved. Designed by:<b> Sanjok Dhungana</b></p>
        </div>
    </div>

</body>

</html>


<?php
    
include("init.php");
    
session_start();

    
if (isset($_POST["userid"],$_POST["password"]))
    
{
        
$username=$_POST["userid"];
        
$password=$_POST["password"];
        
$sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        
// $row=mysqli_fetch_array($result);
        
$count=mysqli_num_rows($result);
        
        
if($count==1) 
{
            
$_SESSION['login_user']=$username;
            
header("Location: dashboard.php");
        
}
else 
{
            
echo '<script language="javascript">';
            
echo 'alert("Invalid Username or Password")';
            
echo '</script>';
        
}
        
    
}

?>

