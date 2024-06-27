<?php
error_reporting(0);

// $link = mysqli_connect("localhost","mintjslw_mintseaspace","fXb=5tW)i.Bx@xe","mintjslw_mintseaspace");
$link = mysqli_connect("localhost","root","","mintjslw_mintseaspace","3308");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to Database: " . mysqli_connect_error();
  }
?>