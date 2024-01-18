<?php
include 'includes/header1.php';
session_start();
  $con= mysqli_connect("localhost","root","","project");
  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $upassword=$_POST['upassword'];
    $query=mysqli_query($con,"select * from tbl_login where  email='$email' && upassword='$upassword' ");
	$num=mysqli_num_rows($query);
    if($num>0)
	{
       $ret=mysqli_fetch_array($query);
	   $_SESSION['usertype']=$ret['usertype'];
     $_SESSION['userid']=$ret['user_id'];
     $_SESSION['adminid']=$ret['admin_id'];
	
	
		if($ret['usertype']=='user')
		{
			$sel="select * from tbl_user_registration where user_id='".$ret['user_id']."' ";
			$query=mysqli_query($con,$sel);
	          $num=mysqli_num_rows($query);
			   if($num>0)
			   {
      $_SESSION['userid']=$ret['user_id'];
	  
     header('location:profile/profile.php');
		}
		
		}
		
		else if($ret['usertype']=='admin')
		{
			$sel2="select * from tbl_admin where  admin_id='".$ret['admin_id']."' ";
			$query2=mysqli_query($con,$sel2);
	          $num2=mysqli_num_rows($query2);
        if($num2>0)
        {
       $ret2=mysqli_fetch_array($query2);
      $_SESSION['adminid']=$ret2['admin_id'];
		 header('location:Admin/index.php');
			  }	
			  }
			
		}
    
    else
    {
     
      echo "<script>Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Invalid E-mail or Password!'
        })</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/logstyle.css">
  </head>
  <body>

<form class="box"  method="post">
  <h1>Login</h1>
  <input type="email" autocomplete="off" name="email" placeholder="email">
  <input type="password" name="upassword" placeholder="Password">
  <input type="submit" name="login" value="Login"  data-toggle="modal" data-target="#ModalWarning">
  
  
  <span id="ma" class="visited"> Don't have an account,<a href="registration.php">Create here</a></span>
</form>



</body>
</html>


