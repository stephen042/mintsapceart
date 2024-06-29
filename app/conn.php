<?php
error_reporting(0);

$link = mysqli_connect("localhost","sterjxvc_mintsea","sterjxvc_mintsea","sterjxvc_mintsea");
// $link = mysqli_connect("localhost","root","","mintjslw_mintseaspace","3308");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to Database: " . mysqli_connect_error();
  }
?>