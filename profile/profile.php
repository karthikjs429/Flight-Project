

<?php
ob_start();
include'includes/sidebar.php'; 
session_start();
?>




		<div id="colorlib-main">
			<section class="ftco-section-no-padding bg-light">
				<div class="hero-wrap">
					<div class="overlay"></div>
					<div class="d-flex align-items-center js-fullheight">
						<div class="author-image text img d-flex">

						<?php
                           $sql="SELECT * FROM tbl_user_registration where user_id='".$_SESSION["userid"]."'";
						  $result=mysqli_query($con,$sql);
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
							title: 'Signed in successfully'
						  })</script>";

                                 while($rows=mysqli_fetch_array($result))
                                      {
                                          ?>
							<section class="home-slider js-fullheight owl-carousel">
						  <div class=" js-fullheight" >
						  <img  src="fileupload/<?php echo $rows['image'];?>" height=750 width=100 >
					      </div>

					      <!-- <div class="slider-item js-fullheight" style="background-image:url(images/author-2.jpg);">
					      </div> -->
					    </section>
						</div>
						<div class="author-info text p-3 p-md-5">
                          







							<div class="desc">
                                                            <span class="subheading">Hello! I'm</span>
                                                            
                                                            
                                                            <p><span><b> Name</b> </span>:<b> <?php echo $rows['user_firstname'];?></b></p>
                                                            <p><span><b> Phone Number</b> </span>:<b> <?php echo $rows['user_phno'];?></b></p>
                                                           
                                                             <p><span><b> Date Of Birth</b> </span>:<b> <?php echo $rows['user_dob'];?></b></p>
                                                             
                                                             <p><span><b> Gender</b> </span>:<b> <?php echo $rows['user_gender'];?></b></p>
                                                             </div>
							
								
								<h1 class="big-letter"><p><b> <?php echo $rows['user_firstname'];?></b></p></h1>
								
								<p class="mb-4">   Hey     </p>
								<h3 class="signature h1"> <?php echo $rows['user_lastname'];?></h3>
								<ul class="ftco-social mt-3">
		              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		            </ul>
                                                                
                                                                 <?php 
							}
						   
						   ?>
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
