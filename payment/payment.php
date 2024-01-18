<?php
session_start();
$con= mysqli_connect("localhost","root","","project");
if($_GET['route'])
{

if ($_SESSION['userid']==0)
 {
	echo "<script> alert ('User not logged in');</script>";
	
}
else
{

$ins="insert into tbl_flightbook (rt_id,user_id) values('".$_GET['route']."','".$_SESSION['userid']."')";
mysqli_query($con,$ins);





  echo "<script>alert('Flight booked');document.location='../index.php'</script>";


}

}


?>

<!DOCTYPE html>
<html lang="en">



<head>



	<meta charset="UTF-8">
	<title>Payment Checkout Form</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<link rel="stylesheet" href="styles.css">





</head>
<body>
	


<div class="wrapper">
  <div class="payment">
    <div class="payment-logo">
      <p>p</p>
    </div>
    
    <form method="get">
    <h2>Payment Gateway</h2>
    <div class="form">
      <div class="card space icon-relative">
        <label class="label">Card holder:</label>
        <input type="text" class="input" pattern="[A-Za-z]+" placeholder="Holder name" required="">
        <i class="fas fa-user"></i>
      </div>
      <div class="card space icon-relative">
        <label class="label">Card number:</label>
        <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="0000 0000 0000 0000" required="">
        <i class="far fa-credit-card"></i>
      </div>
      <div class="card-grp space">
        <div class="card-item icon-relative">
          <label class="label">Expiry date:</label>
          <input type="text" name="expiry-data" class="input" data-mask="00 / 00"  placeholder="00 / 00" required="">
          <i class="far fa-calendar-alt"></i>
        </div>
        <div class="card-item icon-relative">
          <label class="label">CVC:</label>
          <input type="number" min="99" max="999" class="input" data-mask="000" placeholder="000" required="">
          <i class="fas fa-lock"></i>
        </div>
      </div>
        <button name="route" value="<?php echo $_GET['rt_id'] ?>" class="btn">pay now</button>
      <!-- <div class="btn">
       <a  class="btn" href="payment.php? route="> Pay</a>
      </div>  -->
      
      <br>
     
          
      <li><a href="../index.php"><b>Home</b></a></li>
     
    </div>
    </form>
  </div>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


</body>
</html>