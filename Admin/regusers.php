                                   
<?php
include 'includes/header.php';
include 'includes/sidebar.php';


$con= mysqli_connect("localhost","root","","project");


$deleteid=$_GET['did'];
if($deleteid)
{
    $del="delete from tbl_login where user_id='".$deleteid."'";	  
    mysqli_query($con, $del);
    echo "<script> Swal.fire('User Removed')</script>"; 
    
}
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
      
                              <h3 class="title-5 m-b-35">packages bookings</h3>
							          <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1 m-b-25">Bookings</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAME </th>
                                                <th>E-MAIL</th>
                                                <th>PHONE NO</th>
                                                <th>D-O-B</th>
                                                <th>GENDER</th>
												<th>REMOVE USER</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                 $con= mysqli_connect("localhost","root","","project");
                                                 $a=0;
     $sel=mysqli_query($con,"SELECT * FROM tbl_user_registration r inner join tbl_login l on r.user_id=l.user_id");
						   while($row=mysqli_fetch_array($sel))
						   {
                               $a++;
						  ?>
                                            <tr>
                                            <td><?php echo $a ?></td>
                                                <td><?php echo $row['user_firstname'];?>&nbsp;<?php echo $row['user_lastname'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['user_phno'];?></td>
                                                <td><?php echo $row['user_dob'];?></td>
                                                <td><?php echo $row['user_gender'];?></td>
												
                                                <td>
                                             <div  class="table-data-feature">                                  
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Remove"  href="regusers.php? did=<?php echo $row['user_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                            <?php 
							}
						   
						   ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
															   <?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>