
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
</head>

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
          <div class="categoryText">
            <a href="admin.php?catid=<?php echo  $category['catid'] ?>"><?php echo $category['Category'];?></a>
          </div>
          <a href="deleteCategory.php?catid=<?php echo $category['catid'];?>" onClick="return confirm('Are you sure you want to delete?')"><div class="deleteButton"></div></a>
        </div>  <!--category list-->
            <?php } ?>
      
            <form action="admin.php" method="POST">
              <input type="text" class = "textFieldStyle" name="categoryName" id="categoryName" placeholder="Enter Category Type">
              <input type="submit" class = "submitButton" value="submit" id="submit" name="submit">
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
