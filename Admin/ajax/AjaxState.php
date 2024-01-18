<option>------------Select State-----------</option>
                              <?php
                               $con= mysqli_connect("localhost","root","","project");
                              $count_id=$_REQUEST['count_id'];
                              $sel="select * from tbl_state where cntry_id='".$count_id."'";
                              $row= mysqli_query($con, $sel);
                              while ($data= mysqli_fetch_array($row))
                              {
                                  ?>
                              <option  value="<?php echo $data['st_id']; ?>"><?php echo $data['st_name']; ?></option>
                              
                              <?php
                              }
                              ?>