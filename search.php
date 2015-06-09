
<?php
require_once('coupon.php'); 
require_once('helper.php'); 
$coupon= new coupon(1,1,1,1,1);



if($_GET["searchType"]=='filter')
{
	$result=$coupon->getCouponsBy($_GET["couponType"],$_GET["websiteTitle"], $_GET["Category"],$_GET["CouponCode"],$_GET["SubCategory"]);
	$i=0;	
	$a = array();
		foreach($result as $row) {

			$a[$i]['CouponCode']=$row['CouponCode'];

			$a[$i]['Description']=$row['Description'];

			$a[$i]['WebsiteID']=$row['websitename'];

			$a[$i]['CouponType']=$row['CouponType'];
			
			$a[$i]['Status']=$row['Status'];
			$i+=1;	
			
		}
		$ret="{}";
		if(!is_null($a))	
		$ret=json_encode($a);
		echo $ret;	

}else if($_GET["searchType"]=='getAllCompany'){


	$helper=new helper;

	$result=$helper->getAllCompany();
	
	$i=0;	
	$a = array();
		foreach($result as $row) {

			$a[$i]['WebsiteName']=$row['WebsiteName'];
			$a[$i]['couponCount']=$row['couponCount'];
			$i+=1;	
			
		}
	$ret="{}";
	//print_r($a);
		if(!is_null($a))	
		{

			$ret=json_encode($a);
	
		}
		
		echo $ret;	
}else if($_GET["searchType"]=='getAllCategoriesBy'){


	$helper=new helper;

	$result=$helper->getAllCategoriesBy($_GET["company"]);
	
	$i=0;	
	$a = array();
		foreach($result as $row) {

			$a[$i]['Name']=$row['Name'];
			$a[$i]['categoryId']=$row['categoryId'];
			$a[$i]['couponCount']=$row['couponCount'];

			
			$i+=1;	
			
		}
	$ret="{}";
		if(!is_null($a))	
		$ret=json_encode($a);
		echo $ret;	
}else if($_GET["searchType"]=='getAllCategories'){


	$helper=new helper;

	$result=$helper->getAllCategories();
	
	$i=0;	
	$a = array();
		foreach($result as $row) {

			$a[$i]['Name']=$row['Name'];
			$a[$i]['categoryId']=$row['categoryId'];
			$a[$i]['couponCount']=$row['couponCount'];

			
			$i+=1;	
			
		}
	$ret="{}";
		if(!is_null($a))	
		$ret=json_encode($a);
		echo $ret;	
}else if($_GET['searchType']=='getAllSubCategories') {

	$helper=new helper;

	$result=$helper->getAllSubCategories($_GET["categoryId"]);
	
	$i=0;	
	$a = array();
		foreach($result as $row) {

			$a[$i]['SubCategory']=$row['Name'];
			$a[$i]['SubCategoryId']=$row['SubCategoryId'];
			
			$i+=1;	
			
		}
	$ret="{}";
		if(!is_null($a))	
		$ret=json_encode($a);
		echo $ret;	

}
else{


$result=$coupon->getCouponsByCouponId($_GET["search"]);
	$i=0;	
	$a = array();
		foreach($result as $row) {

			$a[$i]['CouponCode']=$row['CouponCode'];

			$a[$i]['Description']=$row['Description'];

			$a[$i]['WebsiteID']=$row['websitename'];

			$a[$i]['CouponType']=$row['CouponType'];
			
			$a[$i]['Status']=$row['Status'];
			$i+=1;	
			
		}

		$ret="{}";
		if(!is_null($a))	
		$ret=json_encode($a);
		echo $ret;	

}


?>

