<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "Babaman12!";
$dbName = "vrb";

// Create connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}