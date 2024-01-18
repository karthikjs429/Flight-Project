<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<?php
  $con= mysqli_connect("localhost","root","","project");

  
  $editid=$_GET['eid'];
  if($editid)
  {
    $sel2="SELECT * FROM tbl_company a inner join tbl_country s on a.cntry_id=s.cntry_id WHERE a.com_id='".$editid."'";	  
    $row2= mysqli_query($con, $sel2);
    $data2= mysqli_fetch_array($row2);
      
  }

  if (isset($_POST['submit']))
  {
     
      $com_name=$_POST['com_name'];
       $cntry_id=$_POST['cntry_id'];
       if($editid=="")
        {
            $ins="insert into tbl_company(com_name,cntry_id) values('".$com_name."','". $cntry_id."')";
          mysqli_query($con,$ins);
          echo "<script>Swal.fire('Inserted')</script>";  
        }
        else
        {
            $upt2="update tbl_company set com_name='".$com_name."',cntry_id='".$cntry_id."' where com_id='".$editid."'";
          mysqli_query($con,$upt2);
          echo "<script>Swal.fire('Updated')</script>";  
        }
      
                  
  }



      $deleteid=$_GET['did'];
      if($deleteid)
      {
          $del="delete from tbl_company where com_id='".$deleteid."'";	  
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
                                                    <label for="hf-email" class=" form-control-label">Company</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" pattern="[A-Za-z]" id="hf-email" value="<?php echo $data2['com_name'] ?>" name="com_name" autocomplete="off" placeholder="" required="" class="form-control">
                                                   
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
                              <option 	 value="<?php echo $data['cntry_id']; ?>"><?php echo $data['countryname']; ?></option>
                              
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
                                                <th>Company Name</th>
                                                <th>Country</th>
                                                <?php
$a=0;
                  $sel="SELECT * from tbl_company a inner join tbl_country s on a.cntry_id=s.cntry_id";	  
                  $row= mysqli_query($con, $sel);
                  while($data= mysqli_fetch_array($row))
                  {
                    $a++;
  ?>
                                            </tr>
                                        </thead>
                                        <tbody>                       
                    <td><?php echo $a; ?></td>
                    <td><?php echo $data['com_name']; ?></td>
                    <td><?php echo $data['countryname']; ?> </td>
                    
                                                <td>
                                                    <div  class="table-data-feature">
                                                        
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Edit"  href="company.php? eid=<?php echo $data['com_id'];?>"> <i class="zmdi zmdi-edit" name="editid"></i></a>
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="company.php? did=<?php echo $data['com_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                      
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