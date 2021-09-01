<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="adminmenu.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 40px ;
}

* {
  box-sizing: border-box;
}

.container {
  position: relative;
  max-width: 500px;
}

</style>
<body>
<div class= "nav-whole">
  <div class="column1">
    <a class="brand" href="#"><img src="logo.jpeg"  width="100%" height="150px"></a>
  </div>
  <div class= "column2">
    <form class="search-bar" action="#">
      <input type="text" placeholder="Search..." name="search">
      <button type="submit" ><i class="fa fa-search"></i></button>
    </form>
  </div>
  <div class="cart-icon" style="margin-bottom: 15px;">
    <button style="width: 100%"><i class="fa fa-shopping-cart" style="font-size: 42px;"></i></button>
  </div>
</div><!-- nav-whole-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shah Ghouse Restaurant</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="homepage.php">Home</a></li>
      <li class="active"> <a href="customermenu.php">Menu</a></li>
      <li><a href="#">About Us</a></li>
			<li><a href="#">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="RegistrationForm.php"><span class="glyphicon glyphicon-user"></span> Register</a>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				<ul class="dropdown-menu">
					<li><a href="loginascustomer.php">Login As Customer</a></li>
					<li><a href="loginasadmin.php">Login As Admin</a></li>
				</ul>
			</li>
    </ul>
  </div>
</nav>