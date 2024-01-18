<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<?php
  $con= mysqli_connect("localhost","root","","project");
  $editid=$_GET['eid'];
  if($editid)
  {
    $sel2="SELECT * FROM tbl_flight a inner join tbl_company s on a.com_id=s.com_id inner join tbl_country c on c.cntry_id=a.cntry_id WHERE a.f_id='".$editid."'";	  
    $row2= mysqli_query($con, $sel2);
    $data2= mysqli_fetch_array($row2);
      
  }                                                   

      if (isset($_POST['submit']))
      {
         
                 $f_name=$_POST['f_name'];
                 $com_id=$_POST['com_id'];  
                 $cntry_id=$_POST['cntry_id'];
                     
                 if($editid=="")
                 {

              $ins="insert into tbl_flight(f_name,com_id,cntry_id) values('".$f_name."','".$com_id."','". $cntry_id."')";
              mysqli_query($con,$ins);
              echo "<script> Swal.fire('Inserted')</script>";          
      }
      else
    {
        $upt2="update tbl_flight set f_name='".$f_name."',com_id='".$com_id."',cntry_id='".$cntry_id."' where f_id='".$editid."'";
        mysqli_query($con,$upt2);
        echo "<script> Swal.fire('Updated')</script>";   

    }
}
    
      $deleteid=$_GET['did'];
      if($deleteid)
      {
          $del="delete from tbl_flight where f_id='".$deleteid."'";	  
          mysqli_query($con, $del);
		  echo "<script> Swal.fire('Deleted')</script>"; 
          
      }
?>


<div class="main-content">
<div class="section__content section__content--p30">
                   
<div class="card">
                                    <div class="card-header">
                                        <strong>Company</strong> Form
                                    </div>
                                    <form action="" method="POST" class="form-horizontal">
                                    <div class="card-body card-block">
                                      
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Flight name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email"  required=""  value="<?php echo $data2['f_name'] ?>" name="f_name" autocomplete="off" placeholder="" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Select Company</label>
                                                </div>
                                               
                                                 <div class="col-12 col-md-9">
                                                <select name="com_id" class="form-control"> 
                              <option>------------Select Company-----------</option>
                              <?php
                              $sel="select * from tbl_company";
                              $row= mysqli_query($con, $sel);
                              while ($data= mysqli_fetch_array($row))
                              {
                                  ?>
                              <option value="<?php echo $data['com_id'] ?>" ><?php echo $data['com_name']; ?></option>
                              
                              <?php
                              }
                              ?>
                              
                              
                              
                          </select>
                                    </div>     
                                            </div>
                                        
                                          <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Select Country</label>
                                                </div>
                                               
                                                 <div class="col-12 col-md-9">
                                                <select name="cntry_id" class="form-control"> 
                              <option>------------Select Country-----------</option>
                              <?php
                              $sel="select * from tbl_country";
                              $row= mysqli_query($con, $sel);
                              while ($data= mysqli_fetch_array($row))
                              {
                                  ?>
                              <option value="<?php echo $data['cntry_id']; ?>" ><?php echo $data['countryname']; ?></option>
                              
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
                                <h3 class="title-5 m-b-35">Country table</h3>
                              <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr> 
                                                <th>No</th>
                                                <th>Flight Name</th>
                                                <th>Company</th>
                                                <th>Country</th>
                                                   </tr>
                                        </thead>
                                                <?php

    

                    $a=0;
                    $sel=mysqli_query($con,"SELECT * FROM tbl_flight f INNER JOIN tbl_country c ON c.cntry_id=f.cntry_id  INNER JOIN tbl_company k ON k.com_id=f.com_id ");
                    
                    
                  while($data= mysqli_fetch_array($sel))
                  {
                    $a++;
                 ?>
                                         
                                        <tbody>                       
                    <td><?php echo $a; ?></td>
                    <td><?php echo $data['f_name']; ?></td>
                    <td><?php echo $data['com_name']; ?></td>
                    <td><?php echo $data['countryname']; ?></td>
                    
                                                <td>
                                                    <div  class="table-data-feature">
                                                   
                              <a class="item" data-toggle="tooltip" data-placement="top" title="Edit"  href="flight.php? eid=<?php echo $data['f_id'];?>"> <i class="zmdi zmdi-edit" name="editid"></i></a>                          
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="flight.php? did=<?php echo $data['f_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                     
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