<?php
class db extends MySQLi {


		private static $instance=null;

		private function __construct($host,$user,$pass,$database){

			parent::__construct($host,$user,$pass,$database);

		}	

		public static function getInstance(){

			if(self::$instance==null) {
				self::$instance= new self("localhost","root","root","CD");
			}
			return self::$instance;
		}

		public static function fetchResult($sql) {


			$conn=self::getInstance();
			if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			} 

		
			$result=$conn->query($sql);

			$conn->close();
			return $result;

		}

}

?>