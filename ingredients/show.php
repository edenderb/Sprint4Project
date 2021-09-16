<?php
require_once "../functions.php";
require_once "../htmllib.php";
require_once "../dblib.php";

$id = $_GET['ID'];
$products= find_product_matching($id);



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../adminview.css">
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
html {
	font-family: sans-serif;
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust:     100%;
}
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 40px ;
  }
  
  * {
    box-sizing: border-box;
  }
  

/* Search Button css */
form.search-bar input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
    border-radius: 10px;
  }
  
  /* Style the submit button */
  form.search-bar button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none; /* Prevent double borders */
    cursor: pointer;
    border-radius: 10px;
    height:47px;
    
  }
  
  form.search-bar button:hover {
    background: #0b7dda;
  }
  
  /* Clear floats */
  form.search-bar::after {
    content: "";
    clear: both;
    display: table;
  }
 /* Search bar end */ 

img {
	display: block;
	border: 0;
	width: 100%;
    border-radius:20px;
}

.sidenav{
    padding: .5em 1em 1em;
    background: hsl(0, 0%, 90%);
    width: 100%
}

.sidenav a{
    display:block;
    padding:.5em .5em;
    color: inherit;
    text-decoration: none;
    transition: all 0.5s ease;
    border: solid 2px;
    margin-top: 5px;
    margin-bottom: 5px;
    border-radius: 5px;
 
} 

.sidenav a:hover,
.sidenav a:focus{
    padding:.4em 1em;
    background: hsl(0, 0%, 20%);
    color: white;
}

.admin-add {
    background-color: green;
    border: none;
    color: white;
    width: 25%;
    padding: 15px 32px;
    position: relative;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    cursor: pointer;
    border-radius: 20px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
  }
  
  
.admin-add:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    opacity:0.7;
  }

.card{
    background: #d1d1e0;
    margin-bottom:2em;
    
}

.card a {
    color: black;
    text-decoration: none;
    padding-top:10px;
}

.card a:hover{
    box-shadow: 3px 3px 8px hsl(0, 0%, 70%);
}

.card-content h3,
.card-content h4{
    margin-top: 0;
    margin-bottom: .5em;
    font-weight: normal;
    padding-left: 40px;
}

.card-content p{
    font-size: 95%;
    padding-left:40px;
    padding-right: 40px;
    padding-bottom: 20px;
   
}

.menu-area{
    margin: 0 120px;
}

.nav-whole{
    margin-bottom:20px;
}

.column1{
    margin-bottom:5px;
}

.quality-image{
        display: block;
        padding: 4px;
        margin-bottom: 20px;
        border-radius: 4px;
        margin-left: 80px;
        margin-right:80px;
        width: 800px;
}
/* css for popup screen */
.bg-popup{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    display:none;
}
.popup-content{
    width :600px;
    height: 600px;
    background-color: white;
    position: relative;
    overflow-y: scroll;
}
.close{
    position: absolute;
    top: 0;
    right: 14px;
    transform: rotate(45deg);
    font-size: 4em;
    cursor: pointer;

}

@media screen and (min-width: 40em){

    .nav-whole{
        display:flex;
        flex-wrap:wrap;
        justify-content: space-between;
    
    }

    .column1{
    
        flex-basis:20%;
        align-self:flex-start;
    }

    .column2{
        flex-basis: 40%;
        padding-top: 40px;
        margin-left:auto;
        align-self:flex-end;
        
    }

    .cart-icon{
        flex-basis: 10%;
        padding-top:40px;
        margin-left:20px;;
        align-self:flex-end;
    }

    .whole{
        display:flex;
    }
    .admin-area{
        display: flex;
        flex-direction:column;
    }
    .menu-area{
        flex:1 1 auto;
    }
    .sidenav{
        flex: 0 0 12em;
    }

    .cards{
        display:flex;
        flex-wrap:wrap;
        justify-content: space-between;
    }
    .card{
        flex: 0 1 clac(50% - .5em);
    }
    
}
@media screen and (min-width : 60em) {
    .cards{
        margin-top: inherit;
    }
    .card{
        flex: 0 1 calc(33% - 1em);
        margin-bottom: 2em
    }
}
.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    display: block;
    max-width: 100%;
    max-height: 180px;
    height: auto;
    
}


</style>
<body>
<div class= "nav-whole">
  <div class="column1">
    <a class="brand" href="#"><img src="../logo.jpeg"  width="100%" height="180px"></a>
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
          <li><a href="homepageadmin.php">Home</a></li>
          <li class="active"> <a href="adminmenu.php">Menu</a></li>
          <li><a href="#">About Us</a></li>
			    <li><a href="#">Contact</a></li>
          <li ><a href="admin.php">Admin</a></li>
          <li><a href="customers/show.php">Manage Customers</a></li>
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



<div class="whole">
  <div class="menu-area">
    <div class="product-area">
        <!-- Fetching Category Names -->
      <?php
        $catid = $_GET['catid'] ?? '1';
        $headings = find_categories($catid);

        while($heading = mysqli_fetch_assoc($headings)){
      ?>
      <h3> Category: <?php echo $heading['Category']; ?> </h3>
      <?php } ?>
      <div class="product-heading">
          <?php 
              while($product = mysqli_fetch_assoc($products)){
                   
          ?>
         <h2>  <?php echo $product['Productname']; ?> </h2>
         <img class= "quality-image" src="../<?php echo $product['Image']; ?>" alt="Food Items" height="400px" width=100%>
      
        </div><!--product-heading-->
        <?php } ?>
      
        
      </div> <!--product-area--> 
    </div><!--menu-area-->  
 </div><!--whole-->
</html>