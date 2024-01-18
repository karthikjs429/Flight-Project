<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>



<?php  
  $con= mysqli_connect("localhost","root","","project");

  $editid=$_GET['eid'];
  if($editid)
  {
    $sel2="SELECT * FROM tbl_destination d inner join tbl_airport a on d.a_id=a.a_id inner join tbl_country c on c.cntry_id=d.cntry_id where  d.des_id='".$editid."'";	  
    $row2= mysqli_query($con, $sel2);
    $data2= mysqli_fetch_array($row2);
      
  }

        if(isset($_POST['submit']))
          {


    $d_destination=$_POST['d_destination'];
    $d_startdate=$_POST['d_startdate'];
    $d_enddate=$_POST['d_enddate'];
    $d_duration=$_POST['d_duration'];
    $a_id=$_POST['a_id'];
    $cntry_id=$_POST['cntry_id'];
    $d_price=$_POST['d_price'];

// ===================================


    $dd=date('ymd');
     $img=$_FILES ['txtpic']['name'];
     
     $temp=$_FILES ['txtpic']['tmp_name'];
     $ext=pathinfo($img,PATHINFO_EXTENSION);
     $ra=rand(10000,10000000);
     $img1=basename($img,$ext);
     $image=$dd.$ra.".".$ext;
      move_uploaded_file($temp,"fileupload/".$image);




    //   $dd=date('ymd');
    //   $img=$_FILES['txtpic']['name'];
      
    //   $temp=$_FILES['txtpic']['tmp_name'];
    //   $ext=pathinfo($img,PATHINFO_EXTENSION);
    //   $ra=rand(10000,10000000);
    //   $img1=basename($img,$ext);
    //   $image=$dd.$ra.".".$ext;
    //    move_uploaded_file($temp,"packageimage/".$image);
       



    //   ==========================

    

    if($editid=="")
     {
    
            $ins="insert into tbl_destination(d_destination,d_startdate,d_enddate,d_duration,a_id,cntry_id,d_price,image) values('".$d_destination."','".$d_startdate."','".$d_enddate."','".$d_duration."','".$a_id."','".$cntry_id."','".$d_price."','".$image."')";
            mysqli_query($con, $ins);
			 echo "<script> Swal.fire('Inserted')</script>";
     }
        else
        {

            $upt2="update tbl_destination set d_destination='".$d_destination."',d_startdate='".$d_startdate."',d_enddate='".$d_enddate."',d_duration='".$d_duration."',a_id='".$a_id."',cntry_id='".$cntry_id."',d_price='".$d_price."' where des_id='".$editid."'";
            mysqli_query($con,$upt2);
           echo "<script> Swal.fire('Updated')</script>";
        }
    }
    $deleteid=$_GET['did'];
    if($deleteid)
    {
        $del="delete from tbl_destination where des_id='".$deleteid."'";	  
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

<!-- <form action="#" method="post" enctype="multipart/form-data"> -->


<div class="main-content">
<div class="section__content section__content--p30">
                   
<div class="card">
                                    <div class="card-header">
                                        <strong>Destination</strong> Form
                                    </div>
                                    <form  method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="card-body card-block">
                                      
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Destination</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email"  required=""  value="<?php echo $data2['d_destination'] ?>" name="d_destination" placeholder="" autocomplete="off" class="form-control">
                                                   
                                                </div>
                                            </div>
                                        
                                         <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Start Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="hf-email" value="<?php echo $data2['d_startdate'] ?>" name="d_startdate" placeholder="" class="form-control">
                                                   
                                                </div>
                                            </div>
                                        
                                        
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">End Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="hf-email" value="<?php echo $data2['d_enddate'] ?>" name="d_enddate" placeholder="" class="form-control">
                                                   
                                                </div>
                                            </div>
                                        
                                        
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Duration</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input  type="number" min="1" max="31" id="hf-email"  required=""  value="<?php echo $data2['d_duration'] ?>" name="d_duration" placeholder="(in days)" autocomplete="off" class="form-control">
                                                   
                                                </div>
                                            </div>
                                        
                                        
                                        
                                           
                                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Des_Country</label>
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
                                                    <label for="hf-email" class=" form-control-label">Des_Airport</label>
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
                                                    <label for="hf-email" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" min="500" max="20000" id="hf-email"  required=""  value="<?php echo $data2['d_price'] ?>" name="d_price" placeholder="(in Rs)" autocomplete="off" class="form-control">
                                                   
                                                </div>
                                            </div>



                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="" name="txtpic" placeholder="" class="form-control">
                                                   
                                                </div>
                                            </div>


                                            <!-- <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label" >image upload</label>
							<div class="col-sm-12 col-md-10">
                                                            <input class="form-control" value="" name="txtpic" type="file">
							</div>
						</div>       -->







                                        
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
</div>
    
    
    
    
    
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Destination table</h3>
                              <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr> 
                                                <th>No</th>
                                                <th>Destination</th>
                                                <th>Start date</th>
                                                 <th>end date</th>
                                                <th>duration</th>
                                                 <th>airport</th>
                                                  <th>country</th>
                                                   <th>Price</th>
                                                   </tr>
                                        </thead>
                                                <?php
$a=0;
                  $sel="SELECT * FROM tbl_destination d inner join tbl_airport a on d.a_id=a.a_id inner join tbl_country c on c.cntry_id=d.cntry_id ";	  
                  $row= mysqli_query($con, $sel);
                  while($data= mysqli_fetch_array($row))
                  {
                    $a++;
  ?>
                                         
                                        <tbody>                       
                    <td><?php echo $a; ?></td>
                    <td><?php echo $data['d_destination']; ?></td>
                    <td><?php echo $data['d_startdate']; ?></td>
                    <td><?php echo $data['d_enddate']; ?></td>
                    <td><?php echo $data['d_duration']; ?></td>
                    <td><?php echo $data['airportname']; ?></td>
                    <td><?php echo $data['countryname']; ?></td>
                    <td><?php echo $data['d_price']; ?></td>

                    
                                                <td>
                                                    <div  class="table-data-feature">
                                                        
             <a class="item" data-toggle="tooltip" data-placement="top" title="Edit"  href="destinationpackages.php? eid=<?php echo $data['des_id'];?>"> <i class="zmdi zmdi-edit" name="editid"></i></a>                                      
             <a class="item" data-toggle="tooltip" data-placement="top" title="Delete"  href="destinationpackages.php? did=<?php echo $data['des_id'];?>"><i class="zmdi zmdi-delete" name="deleteid"></i></a>
                                    
                                                    </div>
                                                </td>
                                            
                                            <?php
                  }
                ?>
                                         
                                        </tbody>
                                    </table>
                                </div>

                                </div>
                               
                                <!-- END DATA TABLE -->
    
    
    
    
      <?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>