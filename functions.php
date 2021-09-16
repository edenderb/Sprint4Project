<?php
require_once "dblib.php";

function check_login($conn)
{

	if(isset($_SESSION['username']))
	{

		$user_name = $_SESSION['username'];
		$query = "select * from Adminlogin where username = '$user_name' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: loginasadmin.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) {
		# code...

		$text .= rand(0,9);
	}

	return $text;
}




    function get_products(){
		//open
	   $conn=DB_open_connection();

	   $sql = "SELECT * FROM Category1";

	   $rows=DB_selectquery($sql,$conn);

	   //close
	   DB_close_connection($conn);

	   return $rows;
	}

	function get_categories(){
		//open
	   $conn=DB_open_connection();

	   $sql = "SELECT * FROM  category";

	   $rows=DB_select($sql,$conn);

	   //close
	   DB_close_connection($conn);

	   return $rows;
	}

	function get_categories_name(){
	    //open
	    $conn=DB_open_connection();

	    $sql = "SELECT * FROM category";
	    $rows=DB_selectquery($sql,$conn);

	    DB_close_connection($conn);

		return $rows;
	}


	 function find_product_matching($id){
	    //open
	    $conn=DB_open_connection();

	    $sql = "SELECT * FROM Category1 WHERE ID='{$id}'";
	    $result=mysqli_query($conn,$sql);

	    DB_close_connection($conn);

	    return $result;
	 }

	 function add_product($name="?",$description="?",$price=0,$image='',$category="?"){

			$sql="INSERT INTO Category1 (`ID`, `Productname`, `Description`, `Price`, `Image`, `catid`)
							   VALUES (NULL,'$name','$description',$price,'$image','$category')";

	        $conn=DB_open_connection();

			$status=DB_insert($conn,$sql);
			
			DB_close_connection($conn);

			return $status;

	  
	 }
	 function update_products($id, $name, $description, $price, $image, $category){
       $conn=DB_open_connection();
	   $sql="UPDATE Category1 SET ";
	   $sql .= "Productname='" . $name . "' ";
	   $sql .= "Description='" . $description . "' ";
	   $sql .= "Price='" . $price . "' ";
	   $sql .= "Image='" . $image . "' ";
	   $sql .= "catid='" . $category . "' ";
	   $sql .="WHERE ID='" . $id . "';";
	   
	   $result=mysqli_query($conn, $sql);
	   DB_close_connection($conn);
	   return $result;
	 } 
	 
	 function find_categories($catid){
		$conn= DB_open_connection(); 
		$sql="Select Category from Category where catid='" .$catid."'";
		$result=mysqli_query($conn,$sql);
        DB_close_connection($conn);
		 return $result;
	 }

	 function categorise($catid){
		 $conn = DB_open_connection();

		 $sql =  "Select * from Category1 where catid = '" .$catid. "'";
		 $result = mysqli_query ($conn, $sql);

		 DB_close_connection($conn);
		 return $result;
	 }

	 function find_customers_byid($id){	 
	 }

	 function insert_admins($full_name, $email, $username, $phone, $password){
		$conn=DB_open_connection();
		$hashed_password = password_hash($password, PASSWORD_BCRYPT);
		$sql="INSERT INTO customers (`id`, `full_name`, `email`, `username`, `phone`, `hashed_password`) VALUES (NULL, '$full_name', '$email', '$username', '$phone', '$hashed_password');"; 
		$row = mysqli_query($conn, $sql);
		
		DB_close_connection($conn);

			return $row;
	}
	 function is_post_request() {
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	  }
	  
	  function is_get_request() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	  }
	 
	 
	  function show_customers(){
		 $conn=DB_open_connection();

		 $sql="SELECT * FROM customers;";
		 $result = mysqli_query($conn, $sql);
		DB_close_connection($conn);
		 return $result;
	 } 

	 function find_customer_by_id($id){
		 $conn=DB_open_connection();

		 $sql= "SELECT * FROM customers ";
		 $sql .= "WHERE id = '" . $id . "'";
		 $sql .= "LIMIT 1 ";
		 $result = mysqli_query($conn, $sql);
		 return $result;
	 }
	 function find_customer_by_username($username){
		$conn=DB_open_connection();

		$sql= "SELECT * FROM customers ";
		$sql .= "WHERE username = '" . $username . "'";
		$sql .= "LIMIT 1 ";
		$result = mysqli_query($conn, $sql);
		$customer = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		return $customer;
	}
	 

	 /* functions for Authorization */
	 function log_in_customer($customer){
		 session_regenerate_id();
		 $_SESSION['customer_id']=$customer['id'];
		 $_SESSION['last_login']= time();
		 $_SESSION['username']= $customer['username'];
		return true;
	 }

	 function add_category($categoryName="?"){
		 $conn=DB_open_connection();

		 $sql="INSERT INTO Category (`catid`,`Category`) VALUES (NULL, '$categoryName')";
		 $result = mysqli_query($conn, $sql);
		 DB_close_connection($conn);
		 return $result;
	 }

	 function find_ingredients_by_id(){
		 
	 }
?>
