<?php
                               $con= mysqli_connect("localhost","root","","project");
                              $count_id=$_REQUEST['count_id'];
                              $sel="select * from tbl_login where email='".$count_id."'";
                              $row= mysqli_query($con, $sel);
                              if($data= mysqli_fetch_array($row))
                              {
                                 echo "email already exist";
                              }
							  
							  
                              ?>