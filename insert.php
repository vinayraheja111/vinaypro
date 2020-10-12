<?php
include('connection.php');
 $msg = "";
//insert into database
if(!empty($_POST)) {
 $name = trim($_POST['nm']);
  $city = trim($_POST['city']);
  $occ = trim($_POST['occ']);

  $qry = "INSERT INTO `form_data`(`name`, `city`, `occupation`) VALUES ('$name','$city','$occ')";
  $run = mysqli_query($conn,$qry);
  if($run)
  {
  	echo "name : ".$name."</br>";
    echo "city : ".$city."</br>";
    echo "occupation : ".$occ."</br>";
  }
  else
  {
  	$msg = "Error";
  }
}
?>