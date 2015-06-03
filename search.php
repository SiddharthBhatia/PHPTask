<html>
 <head>
  <title>Login Page</title>
<style type="text/css">
 table {
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
   td{
  	text-align: center;

  }
</style>
  
 </head>
 <body>
<?php

require_once('coupon.php'); 

?>


 	<div style="text-align:center;">
<table id='couponTable' class="cell-border" width="100%" name="couponTable"> <thead><tr><th>Coupon Id</th><th>Coupon Code</th><th>Discount</th><th>Company</th><th>Expiry</th><th>isActive</th></tr></thead>
	<tbody>	

<?php
$coupon= new coupon(1,1,1,1,1);

$result=$coupon->getCouponsByCouponId($_POST["search"]);
$coupon->printAllCoupons($result);

?>
<tbody>
	</table>
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