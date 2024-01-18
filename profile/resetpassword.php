<?php
 $con= mysqli_connect("localhost","root","","project");
 session_start();
//    $sql="SELECT * FROM   tbl_login WHERE user_id='".$_SESSION["userid"]."'";
//   $result=mysqli_query($con,$sql);
// $rows=mysqli_fetch_array($result);

if(isset($_POST['reset']))
{
  $oldpassword=$_POST['oldpassword'];
  $npass=$_POST['npass'];
  $cpass=$_POST['cpass'];

if ($npass != $cpass) 
{
    echo "<script>Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'New password and Confirm password doesn't match!',
		
	  })</script>";
}
else
{
$selp="SELECT * from tbl_login where upassword='".$oldpassword."' and user_id='".$_SESSION['userid']."'";
$rowp=mysqli_query($con,$selp);
$num_rowp=mysqli_num_rows($rowp);


if ($num_rowp > 0)
 {
    $upt = "UPDATE tbl_login SET upassword='".$npass."' WHERE user_id='".$_SESSION["userid"]."'";
    mysqli_query($con,$upt); 
    echo "<script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Password Changed'
      })</script>";

} 
else
 {
    echo "<script>Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'New password and Confirm password doesn't match!',
		
	  })</script>";
}

}

 
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
                        <h1  class="big-letter"> Reset Password</h1>


 <!-- Grid row -->
 <div class="row">
    <!-- Grid column -->
    <div class="col">
	            <form action="#" method="POST" class="bg-light p-5 contact-form">
	              <!-- Grid row -->
<!-- Material input -->
<div class="md-form">
  <i class="fas fa-envelope prefix"></i>
  <input type="text" id="inputIconEx1"  name="oldpassword"  class="form-control" value=""  placeholder="Old Password">
  <label for="inputIconEx1"> </label>
</div>
 <!-- Grid row -->
<!-- Material input -->
<div class="md-form">
  <i class="fas fa-envelope prefix"></i>
  <input type="text" id="inputIconEx1"  name="npass"  class="form-control" value=""  placeholder="New Password">
  <label for="inputIconEx1"> </label>
</div>
<!-- Material input -->
<div class="md-form">
  <i class="fas fa-envelope prefix"></i>
  <input type="text" id="inputIconEx1"  name="cpass"  class="form-control" value=""  placeholder="Confirm Password">
  <label for="inputIconEx1"> </label>
</div>


	            
	             
	              <div class="form-group">
                  <button type="submit" name="reset" class="btn btn-outline-success btn-rounded waves-effect">Reset</button>
	              </div>
	            </form>
	          
	          </div>
  
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