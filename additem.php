
<?php
 require_once "functions.php"; 
 require_once "htmllib.php";
 $msg='';
if(isset($_POST['submit'])){
	$name=isset($_POST['name'])?$_POST['name']:"";
	$description=isset($_POST['description'])?$_POST['description']:"";
	$price=isset($_POST['price'])?$_POST['price']:"";
	$image=isset($_POST['image'])?$_POST['image']:"";
	$category=isset($_POST['category'])?$_POST['category']:"";

	$msg=add_product($name,$description,$price,$image,$category);
    if($msg===true){
      $added = "Product added: ".$name;
    }else{
    $added="Cannot Add Item";
    }
  } else {
  $name="";
	$description="";
	$price="";
	$image="";
	$category="";
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body {
  font-family: Arial;
  margin: 40px ;
}

* {
  box-sizing: border-box;
}

.container {
  position: relative;
  max-width: 500px;
}

.add {
  float: right;
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: green;
  text-align: center;
  cursor: pointer;
  width: 35%;
  font-size: 18px;
  border-radius: 20px;
}
.add:hover {
  opacity: 0.7;

}
.column{
  position: relative;
  float:left;
  max-width: 33.33%;
  Padding: 10px;
  max-height: 600px;


}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.column {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.column button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  border-radius: 20px;
}

.column button:hover {
  opacity: 0.7;
}
.column img{
  max-height:170px;
}
.form {
  background-color:white;
  padding:15px 15px 15px 15px;
  
  width: 100%;
  border: 3px solid #f1f1f1;
  font-family: Arial, Helvetica, sans-serif;
}
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 0px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=submit], input[type=reset], input[type=button] {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 20px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

input[type=button]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
input[type=submit]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
input[type=reset]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
#message{
  background-color:#99ffbb;
  margin-bottom:30px;
  text-align:center;

}

</style>
<body>
	
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="logo.jpeg" width=100% height="170px"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="homepageadmin.php">Home</a></li>
      <li> <a href="adminmenu.php">Menu</a></li>
      <li><a href="#">About Us</a></li>
			<li><a href="#">Contact</a></li>
      <li class="active"><a href="admin.php">Admin</a></li>
      <li><a href="show.php">Manage Customers</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> ADMIN</a>
				<ul class="dropdown-menu">
					<li><a href="profile.php">Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
    </ul>
  </div>
</nav>

  <div class="form" id="productform" >

  	<form action="additem.php" method="POST">
      

      <div class="container">
        <h4 id="message">
          <?php 
          if(isset($added)){
            echo $added;
          }else {
            echo"";
          }
          ?></h4>
        
        <H2>Add Item </h2>
        <hr>
  		 <label for="name">Name:</label><br>
  		 <input type="text" id="name" name="name" value="" required><br><br>

  		 <label for="description">Description:</label><br>
  		 <input type="text" id="description" name="description" value="" required><br><br>

  		 <label for="price">Price:</label><br>
  		 <input type="text" id="price" name="price" value="" required><br><br>

  		 <label for="image">Image(pic.jpg):</label><br>
  		 <input type="text" id="image" name="image" value="Images/" required><br><br>

       <?php 
			 //$choices=array("1"=>"General","2"=>"Fiction"); 
			 $choices=array();
			 $list=array_values(get_categories());
			 foreach($list as $item){
				$id=$item['catid'];
				$name=$item['Category'];			
				$choices[$id]=$name;
			 }
			 echo html_create_select($choices, 'category', 'Category','');
		 ?>

</p>
       <br>
       <br>
  		 <input  type="submit" name="submit" value="Add">
  		 <input  type="reset" name="reset "value="Clear">
  		 <a href = "admin.php"><input  type="button" value="Cancel" />
</div>
      </form>

  </div>

</div>
</body>
</html>
