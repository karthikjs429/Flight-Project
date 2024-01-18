<?php
 $con= mysqli_connect("localhost","root","","project");
 session_start();
   $sql="SELECT * FROM   tbl_user_registration WHERE user_id='".$_SESSION["userid"]."'";
  $result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);
if(isset($_POST['btnsubmit']))
{
  $user_firstname=$_POST['user_firstname'];
  $user_lastname=$_POST['user_lastname'];
  $user_phno=$_POST['user_phno'];
  $user_dob=$_POST['user_dob'];





  $dd=date('ymd');
  $img=$_FILES ['txtpic']['name'];
  
  $temp=$_FILES ['txtpic']['tmp_name'];
  $ext=pathinfo($img,PATHINFO_EXTENSION);
  $ra=rand(10000,10000000);
  $img1=basename($img,$ext);
  $image=$dd.$ra.".".$ext;
   move_uploaded_file($temp,"fileupload/".$image);






  $upt = "UPDATE tbl_user_registration SET user_firstname='".$user_firstname."',user_lastname='".$user_lastname."',user_phno='".$user_phno."',user_dob='".$user_dob."',image='".$image."' WHERE user_id='".$_SESSION["userid"]."'";
  mysqli_query($con,$upt); 
}
 
?>
<?php include'includes/sidebar.php';  ?>

		<div id="colorlib-main">
			<section class="ftco-section-no-padding bg-light">
				<div class="hero-wrap">
					<div class="overlay"></div>
					<div class="d-flex align-items-center js-fullheight">
						<div class="author-image text img d-flex">
							<section class="home-slider js-fullheight owl-carousel">
					      <div class="slider-item js-fullheight" style="background-image: url(images/author.jpg);">
					      </div>

					      <div class="slider-item js-fullheight" style="background-image:url(images/author-2.jpg);">
					      </div>
					    </section>
						</div>
						<div class="author-info text p-3 p-md-5">
                        <h1  class="big-letter"> Edit Info</h1>
<form method="post" enctype="multipart/form-data">

 <!-- Grid row -->
 <div class="row">
    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
  
      <div class="md-form mt-0">
        <input type="text" name="user_firstname" value="<?php echo $rows['user_firstname'] ?>" class="form-control" placeholder="First name">
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col">
      <!-- Material input -->
 
      <div class="md-form mt-0">
        <input type="text"  name="user_lastname"  class="form-control" value="<?php echo $rows['user_lastname'] ?>" placeholder="Last name">
      </div>
    </div>
    <!-- Grid column -->
  </div>

  <br>
  <!-- Grid row -->
<!-- Material input -->
<div class="md-form">
<p><b> Phone Number</b></p>
  <i class="fas fa-envelope prefix"></i>
  <input type="text" id="inputIconEx1"  name="user_phno"  class="form-control" value="<?php echo $rows['user_phno'] ?>"  placeholder="Phone number">
  <label for="inputIconEx1"> </label>
</div>



<!-- Material form grid -->

  
  <!-- Material input -->
<div class="md-form">
<p><b> Date of birth</b></p>
  <i class="fas fa-envelope prefix"></i>
  <input type="date" id="inputIconEx1"  name="user_dob"  class="form-control" value="<?php echo $rows['user_dob'] ?>"  placeholder="Date of birth">
  <label for="inputIconEx1"> </label>
</div>

<!-- Material input -->
<div class="md-form">
<p><b> Profile pic</b></p>
  <i class="fas fa-envelope prefix"></i>
  <input type="file" id=""  name="txtpic"  class="form-control" value=""  placeholder="profile pic">
  <label for="inputIconEx1"> </label>
</div>




  <div>
  <div>
  <button type="submit" name="btnsubmit" class="btn btn-outline-success btn-rounded waves-effect">Update</button>
  </div>
  </div>
</form>
<!-- Material form grid -->







								<ul class="ftco-social mt-3">
		              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		            </ul>
                                                                
                            
						   
						  
	            </div>
						</div>
					</div>
				</div>
			</section>
			
	  
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


 <?php include 'includes/scripts.php'; ?>
</body>
</html>