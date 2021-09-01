
<?php

session_start();

	include("dblib.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

    
  

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from Adminlogin where username = '$user_name' limit 1";
			$conn=DB_open_connection();
			$result = mysqli_query($conn, $query);
  

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password)
					{

						$_SESSION['username'] = $user_data['username'];
						header("Location: homepageadmin.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		}else
		{
			echo "Username is right and pasowrd is right";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body {
  font-family: Arial;
  margin: 40px;
}

* {
  box-sizing: border-box;
}


.column1 {
 text-align: center;
  width: 100%;
  padding: 5px;

}
.row1::after {
  content: "";
  clear: both;
  display: table;
}
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;
        margin : 50px;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius:20px;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}



.container {
  padding: 16px;
  position: relative;
  max-width: 500px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="logo.jpeg" width=100% height="170px"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="homepage.php">Home</a></li>
      <li> <a href="customermenu.php">Menu</a></li>
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


<form method="post">
  <div class="container">
  <h2>Login As Admin</h2>
  <hr>

    <label for="username"><b> Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" class="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>

  </div>
</form>

</body>
</html>
