<?php

include "../dblib.php"; 

$conn= DB_open_connection();
$ingID = $_GET['IngredientID'];
$productID = $_GET['ProductID'];


$sql="Delete from Ingredients where IngredientID=" . $ingID; // Sql syntax for deleting category
$del = mysqli_query($conn,$sql); // delete query

if($del)
{
    DB_close_connection($conn);
    header("location:admin_ing.php?ID=$productID"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
