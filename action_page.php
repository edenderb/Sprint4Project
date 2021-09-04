<?php 
 require_once "functions.php";
 require_once "dblib.php";

 $id= $_GET['ID'];
 echo $id;

 $shows= find_product_matching($id);
 
 while($show= mysqli_fetch_assoc($shows)){
     echo $show['Productname'];
 }



?>