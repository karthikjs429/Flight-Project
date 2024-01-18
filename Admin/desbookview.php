                               
<?php
include 'includes/header.php';
include 'includes/sidebar.php';


$con= mysqli_connect("localhost","root","","project");


$deleteid=$_GET['did'];
if($deleteid)
{
    $del="delete from tbl_destinationbook where pk_id='".$deleteid."'";	  
    mysqli_query($con, $del);
    echo "<script> Swal.fire('Deleted')</script>"; 
    
}
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
      
                              <h3 class="title-5 m-b-35">packages bookings</h3>
                              <div class="table-responsive table-responsive-data2">
                              <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Destination</th>
                                                 <th>Starts</th>
                                                 <th>Ends</th>
                                                 <th>Country</th>
											
                                            </tr>
                                        </thead>
										               <?php
												 $con= mysqli_connect("localhost","root","","project");
     $sel=mysqli_query($con,"SELECT * FROM  tbl_destinationbook d inner join tbl_user_registration u on d.user_id=u.user_id inner join tbl_destination x on d.des_id=x.des_id inner join tbl_country v on x.cntry_id=v.cntry_id");
						   while($row=mysqli_fetch_array($sel))
						   {
						  ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['user_firstname'];?>&nbsp;<?php echo $row['user_lastname'];?></td>
                                                <td><?php echo $row['d_destination'];?></td>
                                                <td><?php echo $row['d_startdate'];?></td>
                                                <td><?php echo $row['d_enddate'];?></td>
                                                <td><?php echo $row['countryname'];?></td>
                                                <td>
                                            <div  class="table-data-feature">                                  
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="desbookview.php? did=<?php echo $row['pk_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
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