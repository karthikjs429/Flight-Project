<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<?php
  $con= mysqli_connect("localhost","root","","project");

     
  $editid=$_GET['eid'];
  if($editid)
  {
    $sel="SELECT * FROM tbl_routs d inner join tbl_country a on d.cntry_id=a.cntry_id  inner join tbl_state k on a.cntry_id=k.cntry_id inner join tbl_airport x on k.st_id=x.st_id inner join tbl_flight f on d.f_id=f.f_id ";	  
    $row2= mysqli_query($con,$sel);
    $data2= mysqli_fetch_array($row2);
      
  }

      if (isset($_POST['submit']))
      {
         
                   $cntry_id=$_POST['cntry_id'];
                   $a_id=$_POST['a_id'];  
                   $rt_departure=$_POST['rt_departure'];
                   $rt_time=$_POST['rt_time'];
                   $tocntry=$_POST['tocntry'];
                   $f_id=$_POST['f_id'];

                   if($editid=="")
                   {
                        $ins="insert into tbl_routs(cntry_id,a_id,rt_departure,rt_time,tocntry,f_id) values('".$cntry_id."','".$a_id."','". $rt_departure."','".$rt_time."','".$tocntry."','".$f_id."')";
                        mysqli_query($con,$ins);
                        echo "<script> Swal.fire('Inserted')</script>";        
                       }
                       else
                       {
                           $upt2="update tbl_airport set airportname='".$airportname."',st_id='". $a_state."' where a_id='".$editid."'";
                         mysqli_query($con,$upt2);
                         echo "<script> alert('Updated');</script>";  
                       }
                    }
    
      $deleteid=$_GET['did'];
      if($deleteid)
      {
          $del="delete from tbl_routs where rt_id='".$deleteid."'";	  
          mysqli_query($con, $del);
		  echo "<script> Swal.fire('Deleted')</script>"; 
          
      }
?>



<script src="jQuery.js" type="text/javascript"></script>

<script>
function getAirport(s)
{
    
    $.ajax({
            url:"ajax/AjaxAirport.php",
            data:{count_id:s},
            success:function(result)
            {
                    $("#list").html(result);

            }

            });
}

</script>


<div class="main-content">
<div class="section__content section__content--p30">
                   
<div class="card">
                                    <div class="card-header">
                                        <strong>Route</strong> Form
                                    </div>
                                    <form action="" method="POST" class="form-horizontal">
                                    <div class="card-body card-block">
                                      
                                           


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">From</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                        <select name="cntry_id" onChange="getAirport(this.value)" class="form-control"> 
                                                            <option>------------Select country-----------</option>
                                                            <?php
                                                            $sel="select * from tbl_country";
                                                            $row= mysqli_query($con, $sel);
                                                            while ($data= mysqli_fetch_array($row))
                                                            {
                                                                ?>
                                                            <option value="<?php echo $data['cntry_id']; ?>" <?php if($data['cntry_id']==$data2['cntry_id']) { ?> selected="" <?php } ?> ><?php echo $data['countryname'];?></option>
                                                            
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                     </div> 
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Airport</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                        <select name="a_id" class="form-control" id="list"> 
                                                            <option>------------Select Airport-----------</option>
                                                            <?php
                                                            $sel="select * from tbl_airport";
                                                            $row= mysqli_query($con,$sel);
                                                            while ($data= mysqli_fetch_array($row))
                                                            {
                                                                ?>
                                                            <option value="<?php echo $data['a_id']; ?>" <?php if($data['a_id']==$data2['a_id']) { ?> selected="" <?php } ?> ><?php echo $data['airportname']; ?></option>
                                                            
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                     </div> 
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Flight</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                        <select name="f_id" class="form-control" > 
                                                            <option>------------Select flight-----------</option>
                                                            <?php
                                                            $sel="select * from tbl_flight";
                                                            $row= mysqli_query($con,$sel);
                                                            while ($data= mysqli_fetch_array($row))
                                                            {
                                                                ?>
                                                                <option value="<?php echo $data['f_id']; ?>" ><?php echo $data['f_name']; ?></option>                                                            
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                     </div> 
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Departure</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="hf-email" name="rt_departure" autocomplete="off" placeholder="" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Tme</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="time" id="hf-email" name="rt_time" autocomplete="off" placeholder="" class="form-control">
                                                   
                                                </div>
                                            </div>

                                             
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">To</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                        <select name="tocntry" onChange="getAirports(this.value)" class="form-control"> 
                                                            <option>------------Select country-----------</option>
                                                            <?php
                                                            $sel="select * from tbl_country";
                                                            $row= mysqli_query($con, $sel);
                                                            while ($data= mysqli_fetch_array($row))
                                                            {
                                                                ?>
                                                            <option value="<?php echo $data['cntry_id'];?>" ><?php echo $data['countryname'];?></option>
                                                            
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                     </div> 
                                            </div>

                                         
                                        
                                     
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>

                                    </div>
                                </div>
                                    </form>
</div>

    
    
    
    
    
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Route table</h3>
                              <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr> 
                                                <th>No</th>
                                                <th>From</th>
                                                <th>Airport</th>
                                                <th>Flight</th>
                                                <th>Time</th>
                                                <th>Departure</th>   
                                                <th>To</th>
                                               
                                                   </tr>
                                        </thead>
    <?php
 
    $a=0;
    $selq=mysqli_query($con,"SELECT * FROM tbl_routs d inner join tbl_country a on d.cntry_id=a.cntry_id  inner join tbl_airport x on d.a_id=x.a_id inner join tbl_flight f on d.f_id=f.f_id");	  
    while($data= mysqli_fetch_array($selq))
    {
    $a++;
      
  ?>
                                     
             <tbody>                       
                    <td><?php echo $a; ?></td>
                    <td><?php echo $data['countryname']; ?></td>
                    <td><?php echo $data['airportname']; ?></td>
                    <td><?php echo $data['f_name']; ?></td>
                    <td><?php echo $data['rt_time']; ?></td>
                    <td><?php echo $data['rt_departure']; ?></td>
                    <td><?php
                    $b="select * from tbl_country where cntry_id='".$data['tocntry']."'";
                    $selq1=mysqli_query($con,$b);
                   // echo $b;
                    if($data1= mysqli_fetch_array($selq1)){ echo $data1['countryname']; } 
                    
                    ?></td>
                   
                 
                    
                                                <td>
                                                    <div  class="table-data-feature">
                                                      
                           <a class="item" data-toggle="tooltip" data-placement="top" title="Edit"  href="route.php? eid=<?php echo $data['rt_id'];?>"> <i class="zmdi zmdi-edit" name="editid"></i></a>                          
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="route.php? did=<?php echo $data['rt_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                    
                                                    </div>
                                                </td>
                                            
                   <?php
                  }
                ?>
                                         
                                        </tbody>
                                    </table>
                                </div>
                                 </div>
                                </div>
                               
                                <!-- END DATA TABLE -->
    
    
    
    
      <?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>