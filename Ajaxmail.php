<?php

                               $con= mysqli_connect("localhost","root","","project");
                               if(isset($_POST['type']) == 1){
                                $email =$_POST['email'];
                                 $query ="SELECT * FROM tbl_login where email ='".$email."' ";
                                $result =mysqli_query($con, $query);
                                $rowcount=mysqli_num_rows($result);
                                if($rowcount >0){
                                    echo "<span class='status-not-available'> Email Already Exist</span>";
                                }else{
                                     echo "<span class='status-available'> Email Available.</span>";
                                }
                            }
							  
                             
                             
                              ?>
                          



