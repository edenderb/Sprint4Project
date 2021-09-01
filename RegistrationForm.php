
<?php 
  require_once("functions.php");
  require_once("dblib.php");

  $result='';
  if(isset($_POST['submit'])){
    
  $full_name = $_POST['full_name'] ?? '';
  $email = $_POST['email'] ?? '';
  $username = $_POST['username'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $password = $_POST['password'] ?? '';
  //$admin['confirm_password'] = $_POST['confirm_password'] ?? '';
  $result = insert_admins($full_name, $email, $username, $phone, $password);
  if($result === true) {
  
    $output="Customer Registered";
  } else {
    $output= "Register Failed";
  }
} else {
  // display the blank form
  
  $full_name = '';
  $email= '';
  $username = '';
  $phone = '';
  $password = '';
  //$admin['confirm_password'] = '';
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
  margin: 40px ;
}

* {
  box-sizing: border-box;
}



.container {
  position: relative;
  max-width: 500px;
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
body {
  font-family: Arial, Helvetica, sans-serif;

}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.submit {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.submit:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
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
      <li> <a href="#">Menu</a></li>
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
<form action="RegistrationForm.php" method="POST">
  <div class="container">
  <?php 
      if(isset($output)){
      echo $output;
    }
      else {
        echo "";
      } ?>
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="full_name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Your Full Name" name="full_name" id="full_name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>

    <label for="PHONE"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone number" name="phone" id="phone" required>

    <label for="psw"><b>Create Password</b></label>
    <input type="password" placeholder="Enter New Password" name="password" id="password" required>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" class="submit">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Log in</a>.</p>
  </div>
</form>
</body>
</html>
