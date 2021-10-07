<?php

include "dblib.php"; 

$conn= DB_open_connection();
$catid = $_GET['CategoryID'];
// $kid=$_GET['ID'];// not necessary

$sql="Delete from Category where CategoryID=" . $catid; // Sql syntax for deleting category
$del = mysqli_query($conn,$sql); // delete query

if($del)
{
    DB_close_connection($conn);
    header("location:admin.php?CategoryID=$catid"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
