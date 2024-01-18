<?php
include ('includes/mainheader.php');
?>

                      <?php
  $con= mysqli_connect("localhost","root","","project");

      if (isset($_POST['submit']))
      {
          $name=$_POST['name'];
          $email=$_POST['email'];
          $subject=$_POST['subject'];
          $message=$_POST['message'];
		
             $ins="insert into u_contact(name,email,subject,message) values('".$name."','".$email."','".$subject."','".$message."')";
			 //echo $ins;
              $query=mysqli_query($con,$ins);
			  if($query)
			  {
echo "<script>alert('Record successfully Inserted');</script>";

}

          
      }

?>
			
			




	  
			<!-- start banner Area -->
			<section class="relative about-banner">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.php"> Contact Us</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Ernakulam,   Kerala </h5>
									<p>
										P.O Mudakkuzha Akanad
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>00 (+91) 910 000 0007 </h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>travelista@flight.com</h5>
									<p>Send us your feedback anytime!</p>
								</div>
							</div>														
						</div>
							
					</div>
				</div>	
			</section>
			<!-- End contact-page Area --> 

                   <?php
                include ('includes/footer.php');
                 ?>
	

		
