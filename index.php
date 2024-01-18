	<?php
	ob_start();
	session_start(); 
   $con= mysqli_connect("localhost","root","","project");

   if (isset($_POST['search']))
   {

	   
	   $cntry_id=$_POST['cntry_id'];
	   $tocntry=$_POST['tocntry'];
	
		  // $ins="insert into tbl_booking( cntry_id,tocntry,) values('".$cntry_id."','".$tocntry."')";
		 //  mysqli_query($con,$ins);
		 header ("Location: books.php?fromc=".$cntry_id."&toc=".$tocntry);
	   
   }
	?>
	
	
<?php
include ('includes/mainheader.php');
?>
			
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white">Fly around the world with US</h6>
							<h1 class="text-white">Air travelista</h1>
							<p class="text-white">
								As one of the world's leading online travel agencies, Travelista is here to help you plan the perfect trip. Whether you're going on holiday,
								taking a business trip, or looking to set up a corporate travel account, Travelista is here to help you travel the world with cheap flights deals.
							</p>
							<a href="registration.php" class="primary-btn text-uppercase">Get Started</a>
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true"> Search Flights</a>
							  </li>
							  <li class="nav-item">
							   
							  </li>
							  
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap" method="POST">
								
											 
									
										
										<select  name="cntry_id"  class="form-control"  >

										<option>From</option>
									<?php
							$a=0;
                  $sel="SELECT * from  tbl_country";	  
                  $row= mysqli_query($con, $sel);
                  while($data= mysqli_fetch_array($row))
                  {
                    $a++;
  									?>

							<option value=<?php echo $data['cntry_id']; ?> required ><?php echo $data['countryname']; ?></option>
											  
										<?php
                              }
                              ?>
										</select>



									<select  name="tocntry" class="form-control"  >

										<option>To</option>
										<?php
										$a=0;
										$sel="select * from tbl_country";	  
										$row= mysqli_query($con, $sel);
										while($data= mysqli_fetch_array($row))
										{
										$a++;
										?>

										<option value=<?php echo $data['cntry_id']; ?>><?php echo $data['countryname']; ?></option>
											
										<?php
										}
										?>
										</select>
									

									
									<input type="number" min="1" max="20" class="form-control" name="people" placeholder="no.of people " onfocus="this.placeholder = ''" onblur="this.placeholder = 'no.of people ' required">							
								<!--	<a href="#" class="primary-btn text-uppercase">Book flights</a>	-->
									<input type="submit" class="primary-btn text-uppercase" name="search" value="Search flight">								
								</form>
							  </div>
							  <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
														  	
							  </div>
							  <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
														  	
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Popular Flight Services</h1>
		                        <p>
Find Flight Services Latest News, Videos & Pictures on Flight Services and see latest updates, news, information from Travelista.COM.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/airindia.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">1500</a>			
									<h4> Air India Express</h4>
									<p>INDIA</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/indigo.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">1000</a>			
									<h4>IndiGo</h4>
									<p>INDIA</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/spicejet.jpg" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">1500</a>			
									<h4>SpiceJet</h4>
									<p>INDIA</p>			
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End popular-destination Area -->
			

			<!-- Start price Area -->
			<section class="price-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">We Provide Affordable Prices</h1>
		                        <p>An airplane or aeroplane (informally plane) is a powered, fixed-wing aircraft that is propelled forward by thrust from a jet engine, propeller or rocket engine. ...
								 Most airplanes are flown by a pilot on board the aircraft, but some are designed to be remotely or computer-controlled such as drones.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-price">
								<h4>American Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>New York</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Maldives</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Chicago</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Brazil</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Argentina</span>
										<a href="#" class="price-btn">1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>California</span>
										<a href="#" class="price-btn">1500</a>
									</li>														
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Europe Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Italy</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Rome</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>France</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Spain</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>United Kingdom</span>
										<a href="#" class="price-btn">1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Portugal</span>
										<a href="#" class="price-btn">1500</a>
									</li>														
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price">
								<h4>Indian Packages</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Goa</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Srinagar</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Shimla</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Varanasi</span>
										<a href="#" class="price-btn">1500</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Hampi</span>
										<a href="#" class="price-btn">1500</a>
									</li>	
									<li class="d-flex justify-content-between align-items-center">
										<span>Lakshadweep</span>
										<a href="#" class="price-btn">1500</a>
									</li>														
								</ul>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End price Area -->
			

			<!-- Start other-issue Area -->
			<section class="other-issue-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Suggested destinations by us</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is.</p>
		                    </div>
		                </div>
		            </div>					
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/Mahabaleshwar.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Mahabaleshwar</h4>
								</a>
								<p>
								The Mahabaleshwar Temple, Gokarna is a 4th-century CE Hindu temple located in Gokarna, Uttara Kannada district,
								 Karnataka state, India which is built in the classical Dravidian architectural style.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/Leh-Ladakh .jpg" alt="">					
								</div>
								<a href="#">
									<h4>Leh-Ladakh </h4>
								</a>
								<p>
								The largest town in Ladakh is Leh, followed by Kargil, each of which headquarters a district. The Leh district contains the Indus, Shyok and Nubra river valleys. 
								The Kargil district contains the Suru, Dras and Zanskar river valleys..
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/Goa.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Goa</h4>
								</a>
								<p>
								Goa is a state in western India with coastlines stretching along the Arabian Sea. Its long history as a Portuguese colony prior to 1961 is evident 
								in its preserved 17th-century churches and the area’s tropical spice plantations.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="img/ooty.jpg" alt="">					
								</div>
								<a href="#">
									<h4>Ooty</h4>
								</a>
								<p>
								Ooty (short for Udhagamandalam) is a resort town in the Western Ghats mountains, in southern India's Tamil Nadu state. 
								Founded as a British Raj summer resort, it retains a working steam railway line.
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End other-issue Area -->
			

			<!-- Start testimonial Area -->
		    <section class="testimonial-area section-gap">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Testimonial from our Clients</h1>
		                        <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
		                            </p>
		                            <h4>Harriet Maxwell</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
		                            </p>
		                            <h4>Carolyn Craig</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
		                            </p>
		                            <h4>Harriet Maxwell</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
		                            </p>
		                            <h4>Carolyn Craig</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
		                            </p>
		                            <h4>Harriet Maxwell</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
		                            </p>
		                            <h4>Carolyn Craig</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>		                    		                    
		                </div>
		            </div>
		        </div>
		    </section>
		    <!-- End testimonial Area -->

			<!-- Start home-about Area -->
			<section class="home-about-area">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-end">
						<div class="col-lg-6 col-md-12 home-about-left">
							<h1>
								Did not find your Package? <br>
								Feel free to ask us. <br>
								We'll make it for you
							</h1>
							<p>
							Travelista.com is one of the leading online travel agents in India with offices in almost all major cities
							 including ernakulam. With Travelista.com as their travel agent, holiday makers in World make the most of
							  their vacation and return home with memories that they will cherish life-long.							</p>
							<a href="#" class="primary-btn text-uppercase">request custom price</a>
						</div>
						<div class="col-lg-6 col-md-12 home-about-right no-padding">
							<img class="img-fluid" src="img/hero-bg.jpg" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->
			
	
		
			<!-- Start blog Area -->
			<section class="recent-blog-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10">Latest from Our Blog</h1>
								<p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.</p>
							</div>
						</div>
					</div>							
					<div class="row">
						<div class="active-recent-blog-carusel">
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b1.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Low Cost Advertising</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b2.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Creative Outdoor Ads</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b3.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">It's Classified How To Utilize Free</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>	
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b1.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Low Cost Advertising</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b2.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">Creative Outdoor Ads</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="img-fluid" src="img/b3.jpg" alt="">
								</div>
								<div class="details">
									<div class="tags">
										<ul>
											<li>
												<a href="#">Travel</a>
											</li>
											<li>
												<a href="#">Life Style</a>
											</li>											
										</ul>
									</div>
									<a href="#"><h4 class="title">It's Classified How To Utilize Free</h4></a>
									<p>
										Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
									</p>
									<h6 class="date">31st January,2018</h6>
								</div>	
							</div>														

						</div>
					</div>
				</div>	
			</section>
			<!-- End recent-blog Area -->			

			                       <?php
                                include ('includes/footer.php');
                                             ?>
	

		
		