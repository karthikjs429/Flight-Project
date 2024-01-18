 <?php
 session_start();
include 'includes/header1.php';
?> 






<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title>Regiser here</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
                <link rel="stylesheet" href="styles/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		
		<!-- STYLE CSS -->
                <link rel="stylesheet" href="styles/css/style.css">
	</head>

	<body>
     

		<div class="wrapper" style="background-image: url('styles/images/bg-registration-form-2.jpg');">
			<div class="inner">
                            
                            
                            <?php
  $con= mysqli_connect("localhost","root","","project");

      if (isset($_POST['submit']))
      {
          $user_firstname=$_POST['user_firstname'];
          $user_lastname=$_POST['user_lastname'];
          $email=$_POST['email'];
          $upassword=$_POST['upassword'];
          $user_conpass=$_POST['user_conpass'];
          $user_phno=$_POST['user_phno'];
          $user_dob=$_POST['user_dob'];
		  $user_gender=$_POST['user_gender'];
          
          if($upassword==$user_conpass)
          {
            $ins2="insert into tbl_user_registration(user_firstname,user_lastname,user_phno,user_dob,user_gender) values('".$user_firstname."','".$user_lastname."','".$user_phno."','".$user_dob."','".$user_gender."')";


            if( mysqli_query($con,$ins2))
               {
                   $sel="select * from tbl_user_registration ORDER BY user_id DESC LIMIT 1";
                   $row=mysqli_query($con,$sel);
                   $data=mysqli_fetch_array($row);
                   
                   $ins="insert into tbl_login(email,upassword,usertype,user_id)values('".$email."','".$upassword."','user','".$data['user_id']."')";

                   if(mysqli_query($con,$ins))
                   
                   {
                    
                    header('location:index.php');           
                        }
                   else
                   {
                       mysqli_query($con,"delete from tbl_user_registration ORDER BY user_id DESC limit 1");
                       echo "<script> alert ('email already exist');</script>";
                   }
               }
            
          }
          else{
            echo"<script> alert ('Password doesn't match');</script>";
          }



        }
    

?> 

<script type="text/javascript">

function checkAvailability(){
	$("#loaderIcon").show();
	
	$.ajax({
      

		type:"POST",
		url:"Ajaxmail.php",
		cache:false,
		data:{
			type:1,
			email:$("#email").val(),
		},
		success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide(1000);
		
		}
	});
}
</script>



                            
                            <form method="POST"  >
					<h3>Registration Form</h3>
                                        
					<div class="form-group">
						<div class="form-wrapper">
                                                    <label for=""><b>First Name</b></label>
                                                    <input type="text" name="user_firstname"   class="form-control"  autocomplete="off"  required="">
						</div>
						<div class="form-wrapper">
                                                    <label for=""><b>Last Name</b></label>
                                                        <input type="text" name="user_lastname"   class="form-control" autocomplete="off" required="">
						</div>
					</div>
					<div class="form-wrapper">
                                            <label for=""><b>Email</b></label>
                                                <input type="email" name="email" id="email" class="form-control" autocomplete="off" required="" onBlur="checkAvailability()" onchange="checkAvailability()"/>
                                                <span id="user-availability-status"></span>  
                                                <p><img src="loder.gif" id="loaderIcon" style="display:none" /></p>  
	
					</div>
					<div class="form-wrapper">
                                            <label for=""><b>Password</b></label>
						<input type="password" name="upassword" class="form-control" required="">
					</div>
					<div class="form-wrapper">
                                            <label for=""><b>Confirm Password</b></label>
						<input type="password" name="user_conpass"  class="form-control" required="">
					</div>
					<div >
						<label>
                                                    <b>Gender</b>  &nbsp&nbsp&nbsp&nbsp&nbsp
                                                    <input type="radio"  name="user_gender" value="male">  <b> male </b>&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    <input type="radio"  name="user_gender" value="female">   <b>Female</b><br><br>
							
						</label>
					</div>
                                         <div class="form-wrapper">
                                             <label for=""><b>Date of birth</b></label>
                                                <input type="date" name="user_dob" class="form-control" autocomplete="off" required="">
					</div>
                                        
                                        <div class="form-wrapper">
						<label for=""><b>Phone number</b></label>
                                                <input type="text" name="user_phno"  pattern="[0-9]{10}" class="form-control" autocomplete="off" required="">
					</div>
				 <div class="form-group">
					<button type="submit" name="submit">Register Here</button>&nbsp;<button type="reset" >Clear</button>
					</div>
				</form>
			</div>
		</div>

    
	</body>
</html>