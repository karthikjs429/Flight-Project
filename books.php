<?php
include ('includes/mainheader.php');
include ('Admin/includes/source/links.php');
$con= mysqli_connect("localhost","root","","project");
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
				
            <div class="container my-5 py-5 z-depth-1">

          
            <div class="row">

  <?php  


if ($cntry_id != $_POST['cntry_id']) {

		echo "<script>Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'No Flight Found!',
		
	  })</script>";
	
}

else {


  $sel="SELECT * FROM tbl_routs t inner join tbl_flight f on t.f_id=f.f_id inner join tbl_country c on t.cntry_id=c.cntry_id where  t.cntry_id='".$_GET['fromc']."' and t.tocntry='".$_GET['toc']."'";
  $data=mysqli_query($con,$sel);
 // echo $sel;
  while($row2=mysqli_fetch_array($data))
   {

//   $selq="SELECT * FROM tbl_routs t inner join tbl_flight f on t.f_id=f.f_id inner join tbl_country c on t.cntry_id=c.cntry_id "; 
//   $data2=mysqli_query($con,$selq);
//     while($row2=mysqli_fetch_array($data2))
//     {
      ?>
    
 


<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
							
								<div class="single-sidebar-widget user-info-widget" >
									<img src="img/spicejet.jpg" alt="">
									<br>
									<br>
									<span><h3><?php echo $row2['f_name'] ?></h3></span>
                  <br>
                  <ul class="package-list">
                  <li class="d-flex justify-content-between align-items-center">
											<span>From</span>
											<span><h5><?php echo $row2['countryname'] ?></h5></span>
										</li>
                    <br>
                    <li class="d-flex justify-content-between align-items-center">
											<span>To</span>
											<span><?php
                    $b="select * from tbl_country where cntry_id='".$row2['tocntry']."'";
                    $selq1=mysqli_query($con,$b);
                   // echo $b;
                    if($data1= mysqli_fetch_array($selq1)){?> <span><h5><?php echo $data1['countryname'] ?></h5></span><?php  } 
                    
                    ?></span>
										</li>
                    <br>
                    <li class="d-flex justify-content-between align-items-center">
											<span>Departure</span>
											<span><?php echo $row2['rt_departure'] ?></span>
										</li>
										<br>

										<li class="d-flex justify-content-between align-items-center">
											<span>Time</span>
											<span><?php echo $row2['rt_time'] ?></span>
										</li>
                    </ul>
                  <div class="button-group-area mt-10">
                  <a name="fbook" href="payment/payment.php? rt_id=<?php echo $row2['rt_id']; ?>"class="genric-btn primary-border">Book Flight</a>
                </div>
								</div>		
							</div>
						</div>

            <?php
}
}
    ?>
</div>
</div>

            <?php
                                include ('includes/footer.php');
                                             ?>	
