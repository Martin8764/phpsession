<?php
$conn =  mysqli_connect('localhost', 'root', '', 'userdb');
  // Kontrollerar anslutningen
  if ($conn === false) {
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
  ?>