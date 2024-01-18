  <?php
include ('includes/mainheader.php');
?>

<?php 
ob_start();
session_start(); 
  $con= mysqli_connect("localhost","root","","project");
?>
<?php

if($_GET['pk_id'])
{

if ($_SESSION['userid']==0)
 {
	//echo "<script> alert ('User not logged in');</script>";
	echo "<script>Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'You are not Logged In!',
		footer: '<a href=login.php>Login here...!</a>'
	  })</script>";
}
else
{

   $hi=mysqli_query($con,"select * from tbl_destinationbook where user_id='".$_SESSION['userid']."' and status='0'");
   if (mysqli_fetch_array($hi))
    {
		echo "<script>Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'You already booked that package ! Finish the booked package ',
		  })</script>";
		   }
		   else{

				$ins="insert into tbl_destinationbook (user_id,des_id) values('".$_SESSION['userid']."','".$_GET['pk_id']."')";
				mysqli_query($con,$ins);

//echo "<script> alert ('Booked');</script>";

echo"<script>const Toast = Swal.mixin({
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
	title: 'Booked your Package'
  })</script>";

}

}
}


?>

			  
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Destination				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="Destination.php"> Destination</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			
                        
                        
                        <!-- Start destinations Area -->
			<section class="destinations-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-40 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Popular Destinations</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
					 <?php
                           $sel=mysqli_query($con,"SELECT * FROM tbl_destination d inner join tbl_airport a on d.a_id=a.a_id inner join tbl_country c on c.cntry_id=d.cntry_id ");
						   while($row=mysqli_fetch_array($sel))
						   {
						  ?>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="Admin/fileupload/<?php echo $row['image'];?>" height=350 width=100>
									
								</div>
								<div class="details">
									<h4><?php echo $row['d_destination']; ?></h4>
									<!--<p>
										United staes of America
									</p> -->
									<ul class="package-list">
										
										<li class="d-flex justify-content-between align-items-center">
											<span>Starting Date</span>
											<span><?php echo $row['d_startdate']; ?></span>
										</li>
                                                                                <li class="d-flex justify-content-between align-items-center">
											<span>Ending Date</span>
											<span><?php echo $row['d_enddate']; ?></span>
										</li>
                                                                                <li class="d-flex justify-content-between align-items-center">
											<span>Duration</span>
											<span><?php echo $row['d_duration']; ?>&nbsp;Days</span>
										</li>
											
																				<li class="d-flex justify-content-between align-items-center">
											<span>Country</span>
											<span><?php echo $row['countryname']; ?>,</br><?php echo $row['description']; ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>To Airport</span>
											<span><?php echo $row['a_name']; ?><?php echo $row['airportname']; ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Package Price </span>
											<span><?php echo $row['d_price'];?>&nbsp; Rs</span>
										</li>

											<li class="d-flex justify-content-between align-items-center">
											<span></span>
											<a name="book" class="price-btn" href="package.php? pk_id=<?php echo $row ['des_id']; ?>"> Book Now</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>	
 <?php
 }
 ?>						
					</div>
						  
				</div>	
			</section>
			<!-- End destinations Area -->
			
			
			
			
			<!-- Start home-about Area -->
			<section class="home-about-area">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-end">
						<div class="col-lg-6 col-md-12 home-about-left">
							<h1>
								Did not find your Package? <br>
								Feel free to ask us. <br>
								We�ll make it for you
							</h1>
							<p>
								inappropriate behavior is often laughed off as �boys will be boys,� women face higher conduct standards especially in the workplace. That�s why it�s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.
							</p>
							<a href="#" class="primary-btn text-uppercase">request custom price</a>
						</div>
						<div class="col-lg-6 col-md-12 home-about-right no-padding">
							<img class="img-fluid" src="img/hotels/about-img.jpg" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->

			    <?php
                                include ('includes/footer.php');
                                             ?>	

			