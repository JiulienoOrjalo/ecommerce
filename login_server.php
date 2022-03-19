<?php
$host = "localhost";
$root = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($host, $root, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
