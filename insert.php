<html>
 <head>
  <title>Login Page</title>
 </head>
 <body>



 	<div style="text-align:center;">


<?php


	require_once('coupon.php'); 
	$coupon= new coupon($_POST["couponCode"], $_POST["discount"], $_POST["company"],$_POST["expiry"],$_POST["isActive"]);
	if($coupon->validateInput($_POST["couponCode"]) && $coupon->validateInput($_POST["discount"]) &&
	$coupon->validateInput($_POST["company"]) && $coupon->validateInput($_POST["expiry"]) && $coupon->validateInput($_POST["isActive"]) ) {

			
			$result=$coupon->insertCouponData($coupon);
	if($result)
		echo "<br> Insert Successfull.";
	else 
		echo "<br> Invalid Input.";
	}else {
			echo "Please Enter Valid input";	
	}
	


?>
</div>


 </body>
