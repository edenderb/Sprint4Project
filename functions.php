<?php
require_once "dblib.php";

function check_login($conn)
{

	if(isset($_SESSION['username']))
	{

		$user_name = $_SESSION['username'];
		$query = "select * from Admin where AdminName = '$user_name' limit 1";

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

	   $sql = "SELECT * FROM Product";

	   $rows=DB_selectquery($sql,$conn);

	   //close
	   DB_close_connection($conn);

	   return $rows;
	}

	function get_categories(){
		//open
	   $conn=DB_open_connection();

	   $sql = "SELECT * FROM  Category";

	   $rows=DB_select($sql,$conn);

	   //close
	   DB_close_connection($conn);

	   return $rows;
	}

	function get_categories_name(){
	    //open
	    $conn=DB_open_connection();

	    $sql = "SELECT * FROM Category";
	    $rows=DB_selectquery($sql,$conn);

	    DB_close_connection($conn);

		return $rows;
	}


	 function find_product_matching($id){
	    //open
	    $conn=DB_open_connection();

	    $sql = "SELECT * FROM Product WHERE ProductID='{$id}'";
	    $result=mysqli_query($conn,$sql);

	    DB_close_connection($conn);

	    return $result;
	 }

	 function add_product($name="?",$description="?",$price=0,$image="?",$category="?"){

		$conn=DB_open_connection();
			$sql="INSERT INTO Product (`ProductID`, `ProductName`, `Price`, `Description`, `Image`, `CategoryID`)
							   VALUES (NULL, '$name', $price, '$description', '$image','$category')";

	       

			$status=DB_insert($conn,$sql);
			
			DB_close_connection($conn);

			return $status;

	  
	 }
	 function update_products($edit_id, $name, $description, $price, $image, $category){
       $conn=DB_open_connection();
	   $sql="UPDATE `Product` SET `ProductID`='$edit_id',`ProductName`='$name',`Price`='$price',`Description`='$description',`Image`='$image',`CategoryID`='$category' WHERE `ProductID`= '$edit_id'";
	   
	   $result=mysqli_query($conn, $sql);
	   DB_close_connection($conn);
	   return $result;
	 } 
	 
	 function find_categories($catid){
		$conn= DB_open_connection(); 
		$sql="Select Name from Category where CategoryID='" .$catid."'";
		$result=mysqli_query($conn,$sql);
        DB_close_connection($conn);
		 return $result;
	 }

	 function categorise($catid){
		 $conn = DB_open_connection();

		 $sql =  "Select * from Product where CategoryID = '" .$catid. "'";
		 $result = mysqli_query ($conn, $sql);

		 DB_close_connection($conn);
		 return $result;
	 }


	 function is_post_request() {
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	  }
	  
	  function is_get_request() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	  }
	 

	 function add_category($categoryName="?"){
		 $conn=DB_open_connection();

		 $sql="INSERT INTO Category (`CategoryID`, `Name`) VALUES (NULL, '$categoryName')";
		 $result = mysqli_query($conn, $sql);
		 DB_close_connection($conn);
		 return $result;
	 }

	 function find_ingredients_by_product_id($id){
		 $conn = DB_open_connection();

		 $sql = "SELECT * FROM Ingredient WHERE ProductID='$id';";
		 $result = mysqli_query($conn, $sql);

		 DB_close_connection($conn);
		  return $result;
		 
	 }

	 function insert_new_ingredient_by_id($ingredient_name="?", $id="?", $description="?"){
		 $conn = DB_open_connection();

		 $sql= "INSERT INTO Ingredient (`IngredientID`, `Name`, `Description`, `ProductID`) VALUES (NULL, '$ingredient_name', '$description', '$id')";
		 $result = mysqli_query($conn, $sql);

		 DB_close_connection($conn);
		  return $result;
	 }

	 function send_customer_enquiry($username="?", $email="?", $phone="?", $message="?"){
		$conn=DB_open_connection();
		
		$sql="INSERT INTO `CustomerInquiry`(`msg_id`, `username`, `email`, `phone`, `message`) VALUES (NULL,'$username','$email','$phone','$message');"; 
		$row = mysqli_query($conn, $sql);
		
		DB_close_connection($conn);

			return $row;
	}
	function show_enquiry_details(){
		$conn=DB_open_connection();

		$sql="SELECT * FROM CustomerInquiry;";
		$result = mysqli_query($conn, $sql);
	   DB_close_connection($conn);
		return $result;
	} 
?>
