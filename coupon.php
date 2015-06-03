<?php

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

		$serverName="localhost";
		$username="root";
		$password="root";
		$dbname="coupondunia";
		$conn=new mysqli($serverName,$username,$password,$dbname);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql="select * from Coupon;";
		$result=$conn->query($sql);

		$conn->close();
		return $result;
	}

	function getCouponsByCouponId($couponCd) {
		
		$serverName="localhost";
		$username="root";
		$password="root";
		$dbname="coupondunia";
		$conn=new mysqli($serverName,$username,$password,$dbname);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql="select * from Coupon where couponCd like ? ;";

		$param= '%'.$couponCd.'%';

		//echo $param;
		
		$stmt=$conn->prepare($sql);

		$stmt->bind_param("s",$param);
		
		$stmt->execute();
		$result = $stmt->get_result();
		
		$conn->close();
		return $result;
	}

	function insertCouponData($coupons) {
	
		$serverName="localhost";
		$username="root";
		$password="root";
		$dbname="coupondunia";
		$conn=new mysqli($serverName,$username,$password,$dbname);

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
				echo "<tr><td>".$row["couponId"]."</td><td>".$row["couponCd"]."</td><td>".$row["discount"]."</td><td>".$row["company"]."</td><td>".$row["expiry"]."</td><td>".$row["isActive"]."</td></tr>";
			}

	
		}

	}

	function validateInput($input) {

		return filter_var($input,FILTER_SANITIZE_STRING);

	}
}
?>