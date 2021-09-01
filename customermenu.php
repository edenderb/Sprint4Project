
<?php
require_once "functions.php";
require_once "htmllib.php";
?>
<?php include "customer_header.php" ?>


<div class="whole">
  <div class="sidenav">
    <?php 
    $category_name = get_categories_name();
    $count = mysqli_num_rows ($category_name);
   

    for ($i = 0; $i < $count; $i++){
      $category = mysqli_fetch_assoc($category_name);
    ?>
      <a href="customermenu.php?catid=<?php echo $category['catid'] ?>"><?php echo $category['Category'];?></a>

      
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
