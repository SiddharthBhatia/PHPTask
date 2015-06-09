<html>
<head>
  <title>Coupons</title>
    <link rel="stylesheet" type="text/css" href="jqueryUI.css">
    <link rel="stylesheet" type="text/css" href="DataTableUI.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

  <div id="MainDiv">
    <div id="searchDiv">
    <h1>Search Coupons</h1>
    <br><input type="text" name="search" id="search" placeholder="Search By Coupon Code Eg: CD100" style="width:300px; height:30px;" />
    <br><br><button  name="searchBtn" id="searchBtn">Search</button> 
</div>
 <div style="margin:20px;">
      <label>Filters :</label>
      
     
      <select id="stores">
             <option value="">Stores</option>
  
      </select>
     
      <select id="category">
        <option value="">Coupon Category</option>
      </select>

      <select id="subcategory">
        <option value="">Coupon Sub-Category</option>
      </select>
      <select id="couponType">
        <option value="">Coupon Type</option>
        <option>Normal</option>
        <option>appExclusive</option>
        <option>merchantApp</option>
        <option>social</option>
      </select>
</div>
<div id='filters'>
</div>

    </div>

<div id="tableDiv">
    <table id='couponTable' class="display" name="couponTable"> 

      <thead>
        <tr>
          
          <th>Coupon Code</th>
          <th>Description</th>
          <th>Company</th>
        </tr>
      </thead>
    
     <tbody>	
      <?php

      require_once('coupon.php'); 

      $coupon= new coupon(1,1,1,1,1);

      $result=$coupon->getCouponsByCouponId("");
      $coupon->printAllCoupons($result);

      ?>
      </tbody>
  </table>





<!--
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

</div> -->
</div>

<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="jquery.dataTables.min.js"></script>
<script type="text/javascript" src="DataTableJqueryUI.js"></script>
<script type="text/javascript" src="scripts.js"></script>

</body>

</html>