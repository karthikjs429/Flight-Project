<?php
 $con= mysqli_connect("localhost","root","","project");

?>
<?php 
ob_start();
include'includes/sidebar.php'; 
session_start();
?>

<div id="colorlib-main">
			<section class="ftco-section-no-padding bg-light">
				<div class="hero-wrap">
				
 <div class="container">
 <div class="col-md-12 mb-4">
	            <h2 class="h3 font-weight-bold">Contact Information</h2>
	          </div>
              <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr> 
                                                <th>No</th>
                                                <th>From</th>
                                                <th>Airport</th>
                                                <th>Flight</th>
                                                <th>Departure</th>   
                                                <th>To</th>
                                               
                                                   </tr>
                                        </thead>
    <?php
 
    $a=0;
    $sel="SELECT * FROM  tbl_flightbook d 
    inner join tbl_routs a  on d.rt_id=a.rt_id 
    inner join tbl_airport air  on a.a_id=air.a_id 
    inner join tbl_country c  on a.cntry_id=c.cntry_id
    inner join tbl_flight f on a.f_id=f.f_id
     where user_id='".$_SESSION["userid"]."'";	  
    $row= mysqli_query($con, $sel);
    while($data= mysqli_fetch_array($row))
    {
    $a++;
      
  ?>
                                     
             <tbody>                       
                    <td><?php echo $a; ?></td>
                    <td><?php echo $data['countryname']; ?></td>
                    <td><?php echo $data['airportname']; ?></td>
                    <td><?php echo $data['f_name']; ?></td>
                    <td><?php echo $data['rt_departure']; ?></td>
                    <td><?php
                    $b="select * from tbl_country where cntry_id='".$data['tocntry']."'";
                    $selq1=mysqli_query($con,$b);
                   // echo $b;
                    if($data1= mysqli_fetch_array($selq1)){ echo $data1['countryname']; } 
                    
                    ?></td>
                                    
                   <?php
                  }
                ?>
                                         
                                        </tbody>
                                    </table>
                                </div>
                                 </div>
                                </div>
                               
                                <!-- END DATA TABLE -->
  
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
