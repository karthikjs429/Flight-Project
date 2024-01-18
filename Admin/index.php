<?php
include 'includes/header.php';
include 'includes/sidebar.php';

?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <?php
$con= mysqli_connect("localhost","root","","project");
                  $sel="SELECT * from tbl_login WHERE log_id = ( SELECT MAX(log_id) FROM tbl_login )  ";	  
                  $row= mysqli_query($con, $sel);
                  while($data= mysqli_fetch_array($row))
                  {
                
  ?>
                                            <div class="text">
                                                <h2><?php echo $data['log_id']; ?></h2>
                                                <span>members Loginned</span>
                                            </div>
                                            <?php
                  }
                  ?>
                 
                                        </div>
                                        <div class="overview-chart">
                                            <!-- <canvas id="widgetChart1"></canvas> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <?php

$sel="SELECT * from tbl_destinationbook WHERE pk_id = ( SELECT MAX(pk_id) FROM tbl_destinationbook )  ";	  
$row= mysqli_query($con, $sel);
while($data= mysqli_fetch_array($row))
{

?>
                                            <div class="text">
                                                <h2><?php echo $data['pk_id']; ?></h2>
                                                <span>Packages Booked</span>
                                            </div>
                                            <?php
                  }
                  ?>
                                        </div>
                                        <div class="overview-chart">
                                            <!-- <canvas id="widgetChart2"></canvas> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-plane"></i>
                                            </div>
											                                         <?php

$sel="SELECT * from tbl_flightbook WHERE fbk_id = ( SELECT MAX(fbk_id) FROM tbl_flightbook )  ";	  
$row= mysqli_query($con, $sel);
while($data= mysqli_fetch_array($row))
{

?>
                                            <div class="text">
                                                <h2><?php echo $data['fbk_id']; ?></h2>
                                                <span>Flight Bookings</span>
                                            </div>
											         <?php
                  }
                  ?>
                                        </div>
                                        <div class="overview-chart">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
    </div>
                                </div>
                            </div>
                       


                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1 m-b-25">Bookings</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAME </th>
                                                <th>FROM</th>
                                                <th>TO</th>
                                                <th>FLIGHT</th>
                                                <th>DATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                 $con= mysqli_connect("localhost","root","","project");
                                                 $a=0;
     $sel=mysqli_query($con,"SELECT * FROM  tbl_flightbook d inner join tbl_user_registration u on d.user_id=u.user_id inner join tbl_routs x on d.rt_id=x.rt_id inner join tbl_country v on x.cntry_id=v.cntry_id inner join tbl_flight ff on x.f_id=ff.f_id");
						   while($row=mysqli_fetch_array($sel))
						   {
                               $a++;
						  ?>
                                            <tr>
                                            <td><?php echo $a ?></td>
                                                <td><?php echo $row['user_firstname'];?>&nbsp;<?php echo $row['user_lastname'];?></td>
                                                <td><?php echo $row['countryname'];?></td>
                                                <td><?php
                    $b="select * from tbl_country where cntry_id='".$row['tocntry']."'";
                    $selq1=mysqli_query($con,$b);
                   // echo $b;
                    if($data1= mysqli_fetch_array($selq1))
                    {
                         echo $data1['countryname']; 
                        } 
                    
                    ?>
                    </td>
                                                <td><?php echo $row['f_name'];?></td>
                                                <td><?php echo $row['rt_departure'];?></td>
                                                
                                            </tr>
                                            <?php 
							}
						   
						   ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                      



                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">recent reports</h3>
                                        <div class="chart-info">
                                            <div class="chart-info__left">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>products</span>
                                                </div>
                                                <div class="chart-note mr-0">
                                                    <span class="dot dot--green"></span>
                                                    <span>services</span>
                                                </div>
                                            </div>
                                            <div class="chart-info__right">
                                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                    <span class="label">products</span>
                                                </div>
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                    <span class="label">services</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-report__chart">
                                            <canvas id="recent-rep-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">char by %</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                 </div>


                        <?php
include 'includes/footer.php';
include 'includes/scripts.php';

?>