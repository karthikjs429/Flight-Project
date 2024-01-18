<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<?php
  $con= mysqli_connect("localhost","root","","project");
    
  $editid=$_GET['eid'];
  if($editid)
  {
    $sel2="SELECT * from tbl_airport a inner join tbl_state s on a.st_id=s.st_id where a.a_id='".$editid."'";	  
    $row2= mysqli_query($con, $sel2);
    $data2= mysqli_fetch_array($row2);
      
  }

      if (isset($_POST['submit']))
      {
         
          $airportname=$_POST['airportname'];
           $a_state=$_POST['a_state'];
           if($editid=="")
            {
                $ins="insert into tbl_airport(airportname,st_id) values('".$airportname."','". $a_state."')";
              mysqli_query($con,$ins);
              //echo "<script> alert('Inserted');</script>";  
              echo "<script> Swal.fire('Inserted')</script>";
            }
            else
            {
                $upt2="update tbl_airport set airportname='".$airportname."',st_id='". $a_state."' where a_id='".$editid."'";
              mysqli_query($con,$upt2);
              echo "<script> Swal.fire('Updated')</script>";  
            }
          
                      
      }
    
      $deleteid=$_GET['did'];
      if($deleteid)
      {
          $del="delete from tbl_airport where a_id='".$deleteid."'";	  
          mysqli_query($con, $del);
		  echo "<script> Swal.fire('Deleted')</script>"; 
          
      }
?>

<script src="jQuery.js" type="text/javascript"></script>

<script>
function getState(s)
{
    $.ajax({
            url:"ajax/AjaxState.php",
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
                                        <strong>Airport</strong> Form
                                    </div>
									
                                    <form action="" method="POST" class="form-horizontal">
                                    <div class="card-body card-block">
                                      
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Airport</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text"  id="hf-email" value="<?php echo $data2['airportname'] ?>" autocomplete="off" name="airportname" placeholder="" required="" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Select Country</label>
                                                </div>
                                                 <div class="col-12 col-md-9">
                                                <select name="selcountry" onChange="getState(this.value)" class="form-control"> 
                              <option>------------Select Country-----------</option>
                              <?php
                              $sel="select * from tbl_country";
                              $row= mysqli_query($con, $sel);
                              while ($data= mysqli_fetch_array($row))
                              {
                                  ?>
                              <option value="<?php echo $data['cntry_id']; ?>" <?php if($data['cntry_id']==$data2['cntry_id']) { ?> selected="" <?php } ?> ><?php echo $data['countryname']; ?></option>
                              
                              <?php
                              }
                              ?>
                              
                              
                              
                          </select>
                                        
                                    </div>
                                            </div>
											
											
											  <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Select State</label>
                                                </div>
                                                 <div class="col-12 col-md-9">
                                                <select name="a_state" id="list" class="form-control"> 
                              <option>------------Select State-----------</option>
                              <?php
                              $sel="select * from tbl_state";
                              $row= mysqli_query($con, $sel);
                              while ($data= mysqli_fetch_array($row))
                              {
                                  ?>
                              <option  value="<?php echo $data['st_id']; ?>" <?php if($data['st_id']==$data2['st_id']) { ?> selected="" <?php } ?> ><?php echo $data['st_name']; ?></option>
                              
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
                                <h3 class="title-5 m-b-35">Airport</h3>
                              <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr> 
                                                <th>No</th>
                                                <th>airport Name</th>
                                                <th>State</th>
												 <th>Country </th>
                                <?php
                                $a=0;
                                $sel="SELECT * from tbl_airport a inner join tbl_state s on a.st_id=s.st_id inner join tbl_country c on c.cntry_id=s.cntry_id ";	  
                                $row= mysqli_query($con, $sel);
                                while($data= mysqli_fetch_array($row))
                                {
                                $a++;
                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>                       
                                                        <td><?php echo $a; ?></td>
                                                        <td> <?php echo $data['airportname']; ?></td>
                                                        <td><?php echo $data['st_name']; ?> </td>
                                                        <td><?php echo $data['countryname']; ?> </td>
                    
                                                <td>
                                                    <div  class="table-data-feature">
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Edit"  href="airport.php? eid=<?php echo $data['a_id'];?>"> <i class="zmdi zmdi-edit"  name="editid"></i></a>
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="airport.php? did=<?php echo $data['a_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                      
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
                               
                                <!-- END DATA TABLE -->
    
    
    
    
      <?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>