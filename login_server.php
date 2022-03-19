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


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM buyer WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $sql);
	if($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: homepage.php");

	} else {
		echo "<script> alert('Woops! Email or Password Incorrect.')</script>";
	}
}
?>
