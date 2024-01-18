<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<?php
  $con= mysqli_connect("localhost","root","","project");
  
  $editid=$_GET['eid'];
  if($editid)
  {
    $sel2="SELECT * FROM  tbl_country  WHERE cntry_id='".$editid."'";	  
    $row2= mysqli_query($con, $sel2);
    $data2= mysqli_fetch_array($row2);
      
  }

      if (isset($_POST['submit']))
      {
         
          $countryname=$_POST['countryname'];
          $description=$_POST['description'];

          if($editid=="")
          {
          
              $ins="insert into tbl_country(countryname,description) values('".$countryname."','".$description."')";
              mysqli_query($con,$ins);
             echo "<script> Swal.fire('Inserted')</script>";          
          }
    else 
            {
        $upt2="update tbl_country set countryname='".$countryname."',description='". $description."' where cntry_id='".$editid."'";
        mysqli_query($con,$upt2);
       echo "<script> Swal.fire('Updated')</script>"; 
             }
      }
    
      $deleteid=$_GET['did'];
      if($deleteid)
      {
          $del="delete from tbl_country where cntry_id='".$deleteid."'";	  
          mysqli_query($con, $del);
		  echo "<script> Swal.fire('Deleted')</script>"; 
          
      }
?>



<div class="main-content">
<div class="section__content section__content--p30">
                   
<div class="card">
                                    <div class="card-header">
                                        <strong>Country</strong> Form
                                    </div>
                                    <form  method="POST">
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Country</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" pattern="[A-Za-z]+"  required=""  id="hf-email" value="<?php echo $data2['countryname'] ?>" name="countryname" autocomplete="off" placeholder="" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text"  id="hf-password" value="<?php echo $data2['description'] ?>" name="description" autocomplete="off" placeholder="" class="form-control">
                                                   
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>

                                        </form>
                                    </div>
                                </div>
</div>



<!-- table -->


                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Country table</h3>
                              <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr> 
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <?php
$a=0;
                  $sel="select * from tbl_country";	  
                  $row= mysqli_query($con, $sel);
                  while($data= mysqli_fetch_array($row))
                  {
                    $a++;
  ?>
                                             
                                                
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>                       
                    <td><?php echo $a; ?></td>
                    <td><?php  echo $data['countryname']; ?></td>
                    <td><?php echo $data['description']; ?> </td>
                    
                                                <td>
                                                    <div  class="table-data-feature">
                                                        
                                                        
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Edit"  href="country.php? eid=<?php echo $data['cntry_id'];?>"> <i class="zmdi zmdi-edit" name="editid"></i></a>
                                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="country.php? did=<?php echo $data['cntry_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                     
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
                                </div>

</div>
</div>
</div>
</div>
</div>
                                <!-- END DATA TABLE -->

  <?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>