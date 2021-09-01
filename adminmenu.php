
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
}

include "admin_header.php";
?>



<div class="whole">
  <div class="sidenav">
    <?php 
    $category_name = get_categories_name();
    $count = mysqli_num_rows ($category_name);
   

    for ($i = 0; $i < $count; $i++){
      $category = mysqli_fetch_assoc($category_name);
    ?>
      <a href="adminmenu.php?catid=<?php echo $category['catid'] ?>"><?php echo $category['Category'];?></a>

      
      <?php } ?>
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
          
		    <?php include "adminview.php"?> <!-- Importing menu products -->
        
        </section> <!--cards-->
      </div> <!--centered-->   
    </div><!--menu-items-->  
  </div><!--menu-area-->  
</div><!--whole-->


</html>
