<?php require_once "functions.php";
      require_once "dblib.php";
?>

        <?php
            
            $catid = $_GET['CategoryID'] ?? '1';
			$products = categorise($catid);

           while($product = mysqli_fetch_assoc($products)){

        ?>
		<article class="card">
		
           <a href="ingredients/show.php?ProductID=<?php echo $product['ProductID'];?>">
			   <div class="image-holder" >     
					<img src=<?php echo $product['Image']; ?> alt="Food Items" height="220px">
		   </div>
				<div class="card-content">
					<h3 class="product-title"><?php echo $product['ProductName']; ?> </h3>
				 	<h4 class="price">$ <?php echo $product['Price']; ?> </h4>
					<p class="description"><?php echo $product['Description']; ?> </p>
		   		</div>
				   
		   </a>	
		   <!-- Popup Ingredient Section -->
		   <div class = bg-popup>
				<div class="popup-content">
					<div class="close">+</div>
					<div class="show">Ingredients will be displayed here</div>
						<!--Show-->
				</div>
  			</div> <!--bg-popup-->
		</article>
        <?php } ?>

