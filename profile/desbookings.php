<?php
 $con= mysqli_connect("localhost","root","","project");

?>
<?php 
ob_start();
include'includes/sidebar.php'; 
session_start();
?>


<?php
if($GET['fid'])
	echo"$fid";
{
	if($_SESSION['userid']==0)
	{
			echo "<script>Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'not logged in !',
		  })</script>";
	}
	else
		
		{
			$upt="update tbl_destinationbook set status='1' where pk_id='".$_GET['fid']."'";
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
							title: 'Finished successfully'
						  })</script>";
			
			
		}
		
}
?>
<div id="colorlib-main">
			<section class="ftco-section-no-padding bg-light">
				<div class="hero-wrap">
					
						
						<!--<div class="author-info text p-3 p-md-5">-->
		


            <h2 class='mb-3'>Basic example</h2>
 <div class="container">
	        <div class="row">
			
			
            <?php
$a=0;
                  $sel="SELECT * from tbl_destinationbook d inner join tbl_destination t on d.des_id=t.des_id where user_id='".$_SESSION["userid"]."'";
                  $row= mysqli_query($con, $sel);
                  while($data= mysqli_fetch_array($row))
                  {
                    $a++;
  ?>
			
			
			
	          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
	            <div class="media block-6 services py-4 d-block">
	              <div class="d-flex justify-content-start">
	              	<div class="icon d-flex align-items-center justify-content-center">
					  <span class="flaticon-film"></span>
	              	</div>
	              </div>
	              <div class="media-body p-2 mt-2">
				  <span>From :</span>
	                <h3 class="heading mb-3"><?php echo $data['d_destination'];?></h3>
					<span>date :</span>
	                <h3 class="heading mb-3"><?php echo $data['d_startdate']; ?></h3>
					<span>Plane :</span>
	                <h3 class="heading mb-3"><?php echo $data['d_price']; ?> </h3>
					
	              </div>
				  <div>
  <button type="submit" name="finish" class="btn btn-outline-success btn-rounded waves-effect"> <a href="desbookings.php?fid=<?php echo $data['pk_id']; ?>">Finish</a></button>
  </div>
	            </div>      
	          </div>
			     <?php
                  }
                
                  ?>
  
             	<ul class="ftco-social mt-3">
		              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		            </ul>
           
	            </div>
						</div>
					</div>
						</section>
				</div>
		





			
	  
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
  <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


 <?php include 'includes/scripts.php'; ?>
