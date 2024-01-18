
<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>
               <?php
  $con= mysqli_connect("localhost","root","","project");

      if (isset($_POST['submit']))
      {
          $admin_name=$_POST['admin_name'];
          $email=$_POST['email'];
          $password=$_POST['password'];
		  $conpassword=$_POST['conpassword'];
		     if($password==$conpassword)
          {
  $ins2="insert into tbl_admin(admin_name) values('".$admin_name."')";
  

  if( mysqli_query($con,$ins2))
               {
                   $sel="select * from tbl_admin ORDER BY admin_id DESC LIMIT 1";
                   $row=mysqli_query($con,$sel);
                   $data=mysqli_fetch_array($row);
                   $ins="insert into tbl_login(email,password,usertype,admin_id)values('".$email."','".$password."','admin','".$data['admin_id']."')";

                   if(mysqli_query($con,$ins))
                   
                   {
			 echo "<script> Swal.fire('Inserted')</script>";
                   }
                   else
                   {
                       mysqli_query($con,"delete from tbl_admin ORDER BY admin_id DESC limit 1");
                       echo "<script> alert ('email already exist');</script>";
                   }
               }
            
          }
          else{
            echo"<script> alert ('Password doesn't match');</script>";
          }



        }

		  ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

 <div class="col-lg-6">
                                 <div class="card">
                                    <div class="card-header">
                                        <strong>Admin Add</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form  method="POST" class="form-horizontal">
										 <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-password" name="admin_name" placeholder="Full name" class="form-control" required="">
                                                
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="hf-email" name="email" placeholder=" Email" class="form-control" required="">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-password" name="password" placeholder="Password" class="form-control" required="">
                                                    
                                                </div>
                                            </div>
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label"> Confirm Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-password" name="conpassword" placeholder="Confirm Password..." class="form-control" required="">
                                                    
                                                </div>
                                            </div>
                                       
                                   
                                    <div class="card-footer">
                                        <button type="submit"  class="btn btn-primary btn-sm"  name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
									 </form>
                                </div>
								</div>
                            </div>
							    </div>
                                </div>
                            </div>
							
	 <?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>