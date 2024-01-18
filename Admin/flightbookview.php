                               
<?php
include 'includes/header.php';
include 'includes/sidebar.php';


$con= mysqli_connect("localhost","root","","project");


$deleteid=$_GET['did'];
if($deleteid)
{
    $del="delete from tbl_flightbook where fbk_id='".$deleteid."'";	  
    mysqli_query($con, $del);
    echo "<script> Swal.fire('Deleted')</script>"; 
    
}
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
      
                              <h3 class="title-5 m-b-35">Flight bookings</h3>
                              <div class="table-responsive table-responsive-data2">
                              <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>From</th>
                                                 <th>To</th>
												 <th>Airport</th>
                                                 <th>Date</th>
                                                 <th>Time</th>
											
                                            </tr>
                                        </thead>
										<?php
                                                 $con= mysqli_connect("localhost","root","","project");
                                                 $a=0;
     $sel=mysqli_query($con,"SELECT * FROM  tbl_flightbook d 
	 inner join tbl_user_registration u on d.user_id=u.user_id
	  inner join tbl_routs x on d.rt_id=x.rt_id 
	  inner join tbl_country v on x.cntry_id=v.cntry_id 
	  inner join tbl_flight ff on x.f_id=ff.f_id
	  inner join tbl_airport a on x.a_id=a.a_id");
						   while($row=mysqli_fetch_array($sel))
						   {
                               $a++;
						  ?>
                                        <tbody>
										<tr>
                                            
                                                <td><?php echo $row['user_firstname'];?>&nbsp;<?php echo $row['user_lastname'];?></td>
                                                <td><?php echo $row['countryname'];?></td>
                                                <td><?php
                    $b="select * from tbl_country where cntry_id='".$row['tocntry']."'";
                    $selq1=mysqli_query($con,$b);
                   // echo $b;
                    if($data1= mysqli_fetch_array($selq1))
                    {
                         echo $data1['countryname']; 
                        } 
                    
                    ?>
                    </td>
                                                <td><?php echo $row['airportname'];?></td>
                                                <td><?php echo $row['rt_departure'];?></td>
												<td><?php echo $row['rt_time'];?></td>
                                                
                                            
                                                <td>
                                            <div  class="table-data-feature">                                  
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="flightbookview.php? did=<?php echo $row['fbk_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                                    </div>
                                                </td>
                                             
                                            </tr>
                                          
                                           
                                        </tbody>
										 <?php 
							}
						   
						   ?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
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