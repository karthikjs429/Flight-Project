<option>------------Select airport-----------</option>
                              <?php
                               $con= mysqli_connect("localhost","root","","project");
                              $count_id=$_REQUEST['count_id'];
                            $sel= "SELECT * from tbl_airport a inner join tbl_state s on a.st_id=s.st_id where s.cntry_id='".$count_id."'";
                              $row= mysqli_query($con, $sel);
                              while ($data= mysqli_fetch_array($row))
                              {
                                  ?>
                              <option  value="<?php echo $data['a_id']; ?>"><?php echo $data['airportname']; ?></option>
                              
                              <?php
                              }
                              ?>
                     



                     