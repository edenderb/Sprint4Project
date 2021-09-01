<?php

include "dblib.php"; 

$conn= DB_open_connection();
$catid = $_GET['catid'];
$kid=$_GET['ID'];
echo $kid;

$sql="Delete from Category1 where ID=$kid And catid=$catid";
$del = mysqli_query($conn,$sql); // delete query

if($del)
{
    DB_close_connection($conn);
    header("location:admin.php?catid=$catid"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
