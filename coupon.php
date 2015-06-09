<?php


require_once("db.php");
class coupon {

	public $couponId;
	public $couponCode;
	public $discount;
	public $expiry;
	public $isActive;
	public $company;


	public function __construct($couponCode,$discount,$company,$expiry,$isActive) {

		$this->couponCode=$couponCode;
		$this->discount=$discount;
		$this->company=$company;
		$this->expiry=$expiry;
		$this->isActive=$isActive;
    
  }

	function getAllCoupons() {

		
		$sql="select * from Coupon limit 100;";

		return $conn->fetchResult($sql);	

		
	}

	function getCouponsByCouponId($couponCd) {
		
		$conn=db::getInstance();

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql="select  coupon.*,websitename from  coupon  join website   on   coupon.WebsiteID = website.WebsiteID join couponcategoryinfo  
 				on   coupon.CouponID= couponcategoryinfo.Couponid join  CouponSubCategories on
 				CouponSubCategories.CategoryID= CouponCategoryInfo.CategoryID join couponcategories on 
 				couponcategories.categoryid=CouponCategoryInfo.CategoryID
 				where  coupon.couponCode like ? limit 100";

		$param= $couponCd.'%';
		
		$stmt=$conn->prepare($sql);

		$stmt->bind_param("s",$param);


		$stmt->execute();
		$result = $stmt->get_result();
		
		$conn->close();
		$stmt->close();
		return $result;
	}

	function insertCouponData($coupons) {
	
		$conn=db::getInstance();

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		
		
		$sql="insert into Coupon (couponCd,discount,company,expiry,isActive)  Values (?,?,?,?,?);";

		$stmt=$conn->prepare($sql);
		$stmt->bind_param("sisii",$coupons->couponCode,$coupons->discount,$coupons->company,$coupons->expiry,$coupons->isActive);
		
		$stmt->execute();
		
			
		$conn->close();
		$stmt->close();

		return 1;

		
	}


	function printAllCoupons($result) {
		

		if(mysqli_num_rows($result) > 0) {
			while($row=mysqli_fetch_assoc($result)) {
				
				echo "<tr><td>".$row["CouponCode"]."</td><td>".$row["Description"]."</td><td>".$row["websitename"]."</td></tr>";
			}

	
		}

	}

	function validateInput($input) {

		return filter_var($input,FILTER_SANITIZE_STRING);

	}

	function getCouponsBy($couponType,$websiteTitle,$category,$couponCode,$SubCategory) {
		
		$conn=db::getInstance();

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql='select  coupon.*,websitename from  coupon  join website   on   coupon.WebsiteID = website.WebsiteID join couponcategoryinfo  
 			   on   coupon.CouponID= couponcategoryinfo.Couponid join  CouponSubCategories on 
 			   CouponSubCategories.SubCategoryID= CouponCategoryInfo.SubCategoryID join couponcategories on 
 			   couponcategories.categoryid=CouponCategoryInfo.CategoryID
			   where  1=1';

 	

 			 if(isset($couponType) && !empty($couponType)) {

 			 		$sql.=" and coupon.couponType='".$couponType."'"; 
 			 			
 			 	}	
 	  
 			 	if(isset($websiteTitle) && !empty($websiteTitle)) {

 			 			$sql.=" and WebsiteTitle='".$websiteTitle."'"; 
 			 			
 			 	}

 			 	if(isset($category) && !empty($category)) {

 			 			$sql.=" and couponcategories.categoryid='".$category."'"; 
 			 			
 			 	}
 			 	if(isset($couponCode) && !empty($couponCode)) {

 			 			$sql.=" and coupon.couponCode like '".$couponCode."%'"; 
 			 			
 			 	}

 			 	if(isset($SubCategory) && !empty($SubCategory)) {

 			 			$sql.=" and couponsubcategories.SubCategoryID = '".$SubCategory."'"; 
 			 			
 			 	}
 			 		

 			 			$sql.=" limit 50";

 			 			//echo $sql;
 			 
				$result=$conn->query($sql);

				$conn->close();
				return $result;
				
			

	}

	


}
?>