<?php
 $con= mysqli_connect("localhost","root","","project");
session_start();

$user_check=$_SESSION['log_id'];

$ses_sql=mysqli_query($con,"select email,password from tbl_login where log_id='$user_check'");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$_SESSION["log_id"]=$row['log_id'];


?>