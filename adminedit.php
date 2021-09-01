<?php require_once "functions.php";
      require_once "dblib.php";
?>

        <?php
            
            $catid = $_GET['catid'] ?? '1';
			$products = categorise($catid);

           while($product = mysqli_fetch_assoc($products)){

        ?>
		<article class="card">
		
           <a href="#">
			   <div class="image-holder" >     
					<img src=<?php echo $product['Image']; ?> alt="Food Items" height="220px">
		        </div>
				<div class="card-content">
					<h3 class="product-title"><?php echo $product['Productname']; ?> </h3>
				 	<h4 class="price">$ <?php echo $product['Price']; ?> </h4>
					<p class="description"><?php echo $product['Description']; ?> </p>
				</div>	
				<div class="buttons">
					<a href="editpage.php?ID=<?php echo $product['ID'];?>&catid=<?php echo $catid;?>"><button class ="edit">Edit</button></a>                    
					<a href="delete.php?ID=<?php echo $product['ID'];?>&catid=<?php echo $catid;?>" onClick="return confirm('Are you sure you want to delete?')"><button class="Delete">Delete</button></a>
		   		</div>
		   		
		    </a>	
		</article>
        <?php } ?>

