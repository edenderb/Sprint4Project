<?php
require_once "../functions.php";
require_once "../htmllib.php";
require_once "../dblib.php";

$id = $_GET['ProductID'];
$addIngredient='';
if(isset($_POST['submit'])){
	$ingredient_name=isset($_POST['ingredient-name'])?$_POST['ingredient-name']:"";
	$description=isset($_POST['description'])?$_POST['description']:"";

	$addIngredient=insert_new_ingredient_by_id($ingredient_name, $id, $description);
    if($addIngredient===true){
      $added = "Ingredient Added: ".$ingredient_name;
    }else{
    $added="Cannot Add Ingredient";
    }
  } else {
  $ingredient_name="";
  $description = "";
	
  }
$products= find_product_matching($id);
$ingredients = find_ingredients_by_product_id($id);


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


.nav-whole{
    margin-bottom:20px;
}

.column1{
    margin-bottom:5px;
}

.quality-image{
        display: block;
        padding: 4px;
        border-radius: 4px;
        margin : 20px;
        
}
.deleteButton {
    margin-top: 5px;
    width:16px;
	height:18px;
	background-image:url(../images/deleteCross.png);
	background-repeat:no-repeat;
	background-size:cover;
  
}
td{
  margin-top: -50px;
  padding: 0px 20px 20px 20px;
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

    .admin-area{
        display: flex;
        flex-direction:column;
    }
    /* Menu area applying flex */
    .menu-area{
        display : flex;
        flex-wrap : wrap;
        flex-direction: column;
        justify-content: space-between;
    }
    
}
@media screen and (min-width : 60em) {
   
    .menu-area{
        display : flex;
        flex-wrap : wrap;
        flex-direction: column;
        justify-content: space-between;
    }
    .product-area{
        flex: 0 1 calc(60% - 1em);
    }

    .ingredients-area{
        flex: 0 1 calc(40% - 1em);
    }
}


</style>
<body>
<div class= "nav-whole">
  <div class="column1">
    <a class="brand" href="#"><img src="../logo.jpeg"  width="100%" height="180px"></a>
  </div>
  <div class= "column2">

  </div>
  <div class="cart-icon" style="margin-bottom: 15px;">
  </div>
</div><!-- nav-whole-->
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Shah Ghouse Restaurant</a>
      </div>
      <ul class="nav navbar-nav">
          <li><a href="../homepageadmin.php">Home</a></li>
          <li> <a href="../adminmenu.php">Menu</a></li>
          <li><a href="#">About Us</a></li>
			    <li><a href="ContactForm/admin_contact.php">Contact</a></li>
          <li class="active"><a href="../admin.php">Admin</a></li>
          <li><a href="../customers/show.php">Manage Enquiry</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> ADMIN</a>
				  <ul class="dropdown-menu">
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
        $catid = $_GET['CategoryID'] ?? '1';
        $headings = find_categories($catid);

        while($heading = mysqli_fetch_assoc($headings)){
      ?>
      <h3> Category: <?php echo $heading['Name']; ?> </h3>
      <?php } ?>
      <div class="product-heading">
          <?php 
              while($product = mysqli_fetch_assoc($products)){
                   
          ?>
         <h2>  <?php echo $product['ProductName']; ?> </h2>
      </div><!--product-heading-->
      <div class ="quality-image">   
         <img src="../<?php echo $product['Image']; ?>" alt="Food Items" height="400px" width=100%>
      </div>
        Price: <?php echo $product['Price']; ?></br>
        Description: <?php echo $product['Description']; ?>
      </div> <!--product-area--> 
              <hr>
     <div class= "ingredients-area">
       <h3> Ingredients </h3>
       <table>
            <div class = "add-ingredients">
            
                <?php 
                while($ingredient = mysqli_fetch_assoc($ingredients)){
                ?>
                
                  <tr>
                    <td><?php echo $ingredient['Name'];?></td>
                    <td><?php echo $ingredient['Description']?> </td>
                 <td> 
                <div class = "ingredient-delete">
                <a href="delete.php?IngredientID=<?php echo $ingredient['IngredientID'];?>&&ProductID=<?php echo $ingredient['ProductID'];?>" onClick="return confirm('Are you sure you want to delete?')">
                <div class = "deleteButton"></div></a>
                 </div>
                 </td>
                  </tr>
                
                <br>
                <?php } ?>
                </table>
                <form action = "admin_ing.php?ProductID=<?php echo $product['ProductID'];?>" method="POST">
                            <input type = "text" name="ingredient-name" id="ingredient-name" placeholder= "Ingrdient Name" required>
                            <input type = "text" name = "description" id="description" placeholder = "Description" required>
                            <input type="submit" name="submit" id="submit" value="Add Ingredient">
                        </form>
                    </div>
                    <?php } ?>
                    <h5 id="message">
                            <?php 
                                if(isset($added)){
                                echo $added;
                                }else {
                                echo"";
                                }
                    ?></h5>
     </div><!-- Ingredients Area -->
    </div><!--menu-area-->  
 </div><!--whole-->
</html>