<?php 

$status=$_POST['statuscode'];
$amount=$_POST['amount'];

  if($statuscode==="A" && $amount>10000){
      echo "Preffered";
  } else if($statuscode==="B" && $amount>1000){
      echo "Regular";
  } else if($statuscode==="C" && $amount>100){
      echo "Caution";
  } else if($statuscode==="D" && $amount<100){
      echo "Avoid";
  } else {
      echo "Wrong Input";
  }

?>