<?php 
  require_once("../functions.php");
  require_once("../dblib.php");

  $result='';
  if(isset($_POST['submit'])){
    
  $username = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $message = $_POST['message'] ?? '';
  $result = send_customer_enquiry($username, $email, $phone, $message);
  if($result === true) {
  
    $output="Message Sent";
  } else {
    $output= "Failed to send";
  }
} else {
  // display the blank form
  
  $username = '';
  $email= '';
  $phone = '';
  $message = '';

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="../css/homepage.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <style>
    .form {
      width: 100%;
      max-width: 820px;
      background-color: #d2d4d6;
      border-radius: 10px;
      box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      overflow: hidden;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      color: white;
    }
    .contact-form {
      background-color: #6e6d6a;
      position: relative;
    }
    .btn:hover {
  background-color: Green;
  color: #fff;
}
.input-container span:before,
.input-container span:after {
  content: "";
  position: absolute;
  width: 10%;
  opacity: 0;
  transition: 0.3s;
  height: 5px;
  background-color: #6e6d6a;
  top: 50%;
  transform: translateY(-50%);
}

</style>
  </head>
  <body>
  <div class= "nav-whole">
  <div class="column1">
    <a class="brand" href="#"><img src="../logo.jpeg"  width="100%" height="180px"></a>
  </div>
</div><!-- nav-whole-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shah Ghouse Restaurant</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="../homepage.php">Home</a></li>
      <li> <a href="../customermenu.php">Menu</a></li>
      <li><a href="#">About Us</a></li>
			<li class="active"><a href="ContactForm/">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				<ul class="dropdown-menu">
					<li><a href="../loginasadmin.php">Login As Admin</a></li>
				</ul>
			</li>
    </ul>
  </div>
</nav>

    <div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Let us know any queries from your side. Our friendly customer service are always there to help you. Thank you!
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>40 Elizabeth Road, Central, NSW</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>contactus@shahghouse.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>+61 412345561</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="index.php" method = "POST">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="text" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="text" name="phone" class="input" />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="Send" class="btn" />
          </form>
          <h5><?php 
              if(isset($output)){
              echo $output;
              }
              else {
                echo "";
              } ?>
          </h5>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
