
<?php
 require_once "functions.php"; 
 require_once "htmllib.php";
 $addCategory='';
if(isset($_POST['submit'])){
	$categoryName=isset($_POST['categoryName'])?$_POST['categoryName']:"";

	$addCategory=add_category($categoryName);
    if($addCategory===true){
      $added = "Category Added: ".$categoryName;
    }else{
    $added="Cannot Add category";
    }
  } else {
  $categoryName="";
	
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/adminpage.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 40px ;
}

* {
  box-sizing: border-box;
}

.submitButton{
  color: #fff;
  width: 100px;
  height: 30px;
  box-shadow:4px 3px 7px rgba(19.12500075995922, 6.644343892112374, 3.904687575995922, 0.4000000059604645);
	  background-color:rgba(0,0,0, 0);
    border: solid 2px;

    margin-left: 10px;

    border-radius: 10px;
     flex-basis: calc(63.33% - 50em);

}


.textFieldStyle { 
  padding: 8px;
  font-weight: bold;
  
  
    font-family:Poppins;
    text-align:left;
    font-size:19px;
border: solid 2px;
    margin-top: 15px;
    margin-left: 10px;
    margin-bottom: 5px;
    border-radius: 10px;
	width:259px;
	height: 40px;;
   box-shadow:4px 3px 7px rgba(19.12500075995922, 6.644343892112374, 3.904687575995922, 0.4000000059604645);
	  background-color:rgba(255,255,255, 1);

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
    width: 100%;
    overflow:hidden;
   background-color:rgba(44.28854249417782, 76.84424176812172, 87.12500050663948, 1);
   border-radius: 28px;
  }
  
  
  .categoryText{
  
    font-family:Poppins;
    text-align:left;
    font-size:19px;
    letter-spacing:0;
  }
.categoryList{
    display:flex;
    flex-direction: row;
    justify-content: space-around;
    padding:.5em .5em;
    color: inherit;
    text-decoration: none;
    transition: all 0.5s ease;
    border: solid 2px;
    margin-top: 15px;
    margin-left: 10px;
    margin-bottom: 5px;
    border-radius: 10px;
    flex-basis: calc(63.33% - 50em);
    box-shadow:4px 3px 7px rgba(19.12500075995922, 6.644343892112374, 3.904687575995922, 0.4000000059604645);
	  background-color:rgba(200.81250607967377, 85.3453204035759, 85.3453204035759, 1);
  
  
}


.categoryList:hover,
.categoryList:focus{
    padding:.4em 1em;
    background: hsl(0, 0%, 20%);
    color: white;
    text-decoration: none;
}
.categoryList a:hover,
.categoryList a:focus{
    text-decoration: none;
    color: white;
    
}

.deleteButton {
  margin-top: 5px;
  width:16px;
	height:18px;
	background-image:url(images/deleteCross.png);
	background-repeat:no-repeat;
	background-size:cover;
  
}

.add {
    background-color: green;
    border: none;
    color: white;
    width: 25%;
    padding: 15px 32px;
    position: relative;
    text-align: center;
    float: right;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    cursor: pointer;
    border-radius: 20px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
  }
  
 
.add:hover {
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
    margin-left:20px;
}

.nav-whole{
    margin-bottom:20px;
}

.column1{
    margin-bottom:5px;
}

.image-holder{
        display: block;
        padding: 4px;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: border .2s ease-in-out;
        -o-transition: border .2s ease-in-out;
        transition: border .2s ease-in-out;
        margin-left: 10px;
        margin-right:10px;
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
        display: flexbox;;
        flex-direction: column;
    }
    .admin-area{
        display: flex;
        flex-direction:column;
        width:100%;
    }
    
    .menu-area{
        flex:1 1 auto;
    }
    .sidenav{
      flex: 0 0 12em;
      display : flex;  
      flex-wrap: wrap;
         
    }

    .cards{
        display:flex;
        flex-wrap:wrap;
        justify-content: space-between;
    }
    .card{
        flex: 0 1 clac(50% - .5em);
    }
    .edit{
        background-color: #666699; /* edit */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 0px 40px 40px 40px;
        cursor: pointer;
        border-radius: 20px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
      }
    .edit:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
      }
    .delete {
        margin-left: 40px;
        margin-right: 40px;
        background-color: #ff3300; /* Red */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        
        cursor: pointer;
        border-radius: 20px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;      
    }
    .delete:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
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
          <li><a href="homepageadmin.php">Home</a></li>
          <li> <a href="adminmenu.php">Menu</a></li>
          <li><a href="#">About Us</a></li>
			    <li><a href="#">Contact</a></li>
          <li class="active"><a href="admin.php">Admin</a></li>
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
    <div class="sidenav">
        <?php 
            $category_name = get_categories_name();
            $count = mysqli_num_rows ($category_name);
   
            for ($i = 0; $i < $count; $i++){
            $category = mysqli_fetch_assoc($category_name);
        ?>
        
            <div class ="categoryList">
                <a href="admin.php?catid=<?php echo  $category['catid'] ?>"><?php echo $category['Category'];?></a>
            </div><!--category list-->
            <div class = "deleteDiv">
                <a href="deleteCategory.php?catid=<?php echo $category['catid'];?>" onClick="return confirm('Are you sure you want to delete?')"><div class = "deleteButton"></div></a>
            </div>
            <?php } ?>
            <div class = "addCategory">
                <form action="admin.php" method="POST">
                  <input type="text" class="textFieldStyle" name="categoryName" id="categoryName" placeholder="New Category">
                  <input type="submit" class = "submitButton" value="ADD" id="submit" name="submit">
                    <h4 id="message">
                      <?php 
                        if(isset($added)){
                          echo $added;
                        }else {
                          echo"";
                        }
              ?></h4>
                </form>
            </div>
        
    </div>
   <div class = "admin-area"> 
    <div class = "admin-add">
        <a href="additem.php"><button class="add" value = "Add Item">Add Item</button></a>
    </div>
    <div class="menu-area">
        <div class="categheading"> <!-- Fetching Category Names -->
            <?php
                $catid = $_GET['catid'] ?? '1';
                $headings = find_categories($catid);

                while($heading = mysqli_fetch_assoc($headings)){
            ?>
      <h1> <?php echo $heading['Category']; ?> </h1>
      <?php } ?>
      <hr/>
    </div>
    <div class="menu-items">
      <div class = "centered">
        <section class = "cards">
          
		    <?php include "adminedit.php"?> <!-- Importing menu products -->
        
        </section> <!--cards-->
      </div> <!--centered-->   
    </div><!--menu-items-->  
  </div><!--menu-area-->  
</div><!--admin_area-->
</div><!--whole-->


</html>
