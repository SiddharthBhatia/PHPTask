<?php
require_once("db.php");
/**
* 
*/
class helper
{
	
	function __construct()
	{
		# code...
	}

	function getAllCompany(){


		$conn=db::getInstance();

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql=" select distinct w.`WebsiteName`, count(c.couponcode) as couponCount from coupon c left join website w on c.WebsiteID = w.WebsiteID left join couponcategoryinfo  
 			   on   c.CouponID= couponcategoryinfo.Couponid left  join couponcategories on 
 			   couponcategories.categoryid=CouponCategoryInfo.CategoryID 
 group by c.`WebsiteID` order by couponCount desc limit 100;";
		$result=$conn->query($sql);



		$conn->close();
		return $result;
	}

	function getAllCategories(){


		$conn=db::getInstance();

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql=" select distinct couponcategories.Name,couponcategories.categoryId, count(c.couponcode) as couponCount from coupon c left join website w on c.WebsiteID = w.WebsiteID left join couponcategoryinfo  
 			   on   c.CouponID= couponcategoryinfo.Couponid left  join couponcategories on 
 			   couponcategories.categoryid=CouponCategoryInfo.CategoryID 
 group by couponcategories.Name order by couponCount desc 	";


		$result=$conn->query($sql);

		$conn->close();
		return $result;
	}

	function getAllSubCategories($categoryId) {

		$conn=db::getInstance();

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql="select Name,SubCategoryId from  couponsubcategories where categoryId = ". $categoryId;
		$result=$conn->query($sql);

		$conn->close();
		return $result;
	}
		
		function getAllCategoriesBy($company){


		$conn=db::getInstance();

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql=" select distinct couponcategories.Name,couponcategories.categoryId, count(c.couponcode) as couponCount from coupon c left join website w on c.WebsiteID = w.WebsiteID left join couponcategoryinfo  
 			   on   c.CouponID= couponcategoryinfo.Couponid left  join couponcategories on 
 			   couponcategories.categoryid=CouponCategoryInfo.CategoryID  where w.websitename='".$company."'
 group by couponcategories.Name order by couponCount desc 	";
 			

		$result=$conn->query($sql);

		$conn->close();
		return $result;
	}
	

}


?>