<?php require_once "functions.php";
      require_once "dblib.php";
?>
<style>
	td, th{
		padding:25px;
		text-align: left;
		

	}
	
	table{
    
  
    font-size: 1.5em;
    font-family: sans-serif;
   min-width: 200px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
	}
	table tr:nth-child(even) {
  background-color: #eee;
}
table tr:nth-child(odd) {
 background-color: #fff;
}
table th {
  background-color: black;
  color: white;
}
input[type=submit]{
  background-color: #ff3300; /* Red */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 20px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
input[type=button]{
  background-color: #666699; /* edit */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 20px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
input[type=button]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
input[type=submit]:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
button
{
  background-color: #ff3300; /* Red */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 20px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
button:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
<div id='productlist' style="width:80%;padding:15px 15px 15px 15px;">
	<form action='#' method="GET">
		<table border:2px>
		<?php
            
            $catid = $_GET['catid'] ?? '1';
			    $products = categorise($catid);

           while($product = mysqli_fetch_assoc($products)){

        ?>
                <tr>
				<td rowspan=5> <img src=<?php echo $product['Image']; ?> height=250px width= 350px>
				</tr>
				<tr>
			    <th colspan=2> <?php echo $product['Productname']; ?> </td>
				</tr>
				<tr>
				<td colspan=2> $ <?php echo $product['Price']; ?> </td>
				</tr>
				<tr>
				<td colspan=2> <?php echo $product['Description']; ?> </td>
				</tr>
                <tr>
				<td> <input type='button' name='btnedit' value=edit> </td>
                <td>  <Button><a href='delete.php?ID=<?php echo $product['ID'];?>&catid=<?php echo $catid; ?>' onClick="return confirm('Are you sure you want to delete?')">Delete</a></button>  </td>
				</tr>
        
        <?php } ?>

		</table>
	</form>
</div>