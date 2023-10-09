
<?php 
$con = mysqli_connect("localhost:3306","user","Aditi@6112","wsn_proj");

  if (mysqli_connect_errno())
   {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
  }
?>