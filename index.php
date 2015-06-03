<html>
 <head>
  <title>Login Page</title>

  <style type="text/css">
  
  label{
  	
  	text-align: right;
  	margin: 10px;
  	display: inline-block;
  }
  td{
  	text-align: center;

  }

  table {
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
  label{

  }
  </style>
 </head>
 <body>



 	<div style="text-align:center;">
<h1>Search Coupons</h1>
<form id="loginForm" action="search.php" method="post">
<br><input type="text" name="search" id="search" style="width:300px; height:30px;" />
<br><br><button type="submit" name="submit">Search</button> 
</form>

<table id='couponTable' class="cell-border" width="100%" name="couponTable"> <thead><tr><th>Coupon Id</th><th>Coupon Code</th><th>Discount</th><th>Company</th><th>Expiry</th><th>isActive</th></tr></thead>
	<tbody>	
<?php

require_once('coupon.php'); 

$coupon= new coupon(1,1,1,1,1);

$result=$coupon->getCouponsByCouponId("");
$coupon->printAllCoupons($result);

?>
<tbody>
	</table>

<div>
	<h1>Insert Coupons</h1>
<form id="insertform" action="insert.php" method="post">
<div><label>CouponCode :</label><input type="text" name="couponCode" id="search" style="width:300px; height:30px;" required/></div>
<div><label>Discount :</label><input type="number" name="discount" id="Discount" style="width:300px; height:30px;" required/></div>
<div><label>Company :</label><input type="text" name="company" id="Company" style="width:300px; height:30px;" required/></div> 
<div><label>Expiry :</label><input type="text" name="expiry" id="Expiry" style="width:300px; height:30px;" required/></div>
<div><label>IsActive :</label><input type="text" name="isActive" id="IsActive" style="width:300px; height:30px;" required/></div>
<br><button type="submit" name="Insert">Insert</button> 
</form>

</div>
</div>

<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(function(){
		$("#couponTable").DataTable();
});

</script>




 </body>

</html>