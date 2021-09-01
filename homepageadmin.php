

<?php
session_start();
	include("dblib.php");
	include("functions.php");
  $conn=DB_open_connection();

	$user_data = check_login($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="homepage.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class= "nav-whole">
  <div class="column1">
    <a class="brand" href="#"><img src="logo.jpeg" width=100% height="180px"></a>
  </div>
  <div class= "column2">
    <form class="search-bar" action="#">
      <input type="text" placeholder="Search..." name="search">
      <button type="submit" ><i class="fa fa-search"></i></button>
    </form>
  </div>
  
</div><!-- nav-whole-->
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Shah Ghouse Restaurant</a>
      </div>
      <ul class="nav navbar-nav">
          <li class="active"><a href="homepageadmin.php">Home</a></li>
          <li> <a href="adminmenu.php">Menu</a></li>
          <li><a href="#">About Us</a></li>
			    <li><a href="#">Contact</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="scustomers/how.php">Manage Customers</a></li>
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

<div class="container">

  <h2> Welcome <?php echo $user_data['username']; ?>
    <hr>
  <h3>Check out Some of our Poplulars </h3>

</div>

<h2 style="text-align:center">Shah Ghouse Products</h2>

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="img1.jpeg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="img2.jpeg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="img3.jpeg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="img4.jpeg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="img5.jpeg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="img6.jpeg" style="width:100%">
  </div>

  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="img1.jpeg" style="width:100%" onclick="currentSlide(1)" alt="Fried Momo And Chowmein">
    </div>
    <div class="column">
      <img class="demo cursor" src="img2.jpeg" style="width:100%" onclick="currentSlide(2)" alt="Naan and Biryani">
    </div>
    <div class="column">
      <img class="demo cursor" src="img3.jpeg" style="width:100%" onclick="currentSlide(3)" alt="Steam Momo and Noodles">
    </div>
    <div class="column">
      <img class="demo cursor" src="img4.jpeg" style="width:100%" onclick="currentSlide(4)" alt=" Fine Dinner Set">
    </div>
    <div class="column">
      <img class="demo cursor" src="img5.jpeg" style="width:100%" onclick="currentSlide(5)" alt=" Lunch Set">
    </div>
    <div class="column">
      <img class="demo cursor" src="img6.jpeg" style="width:100%" onclick="currentSlide(6)" alt=" Steaks and Grills">
    </div>
  </div>
</div>

<!--footer-->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
 <p> @ 2021 Project 1, LLC. All Rights Reserved</p>
</footer>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</BODY>
</HTML>
