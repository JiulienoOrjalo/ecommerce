<?php
session_start();
// Check connection
$connection = mysqli_connect("localhost", "root", "", "ecommerce");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
if (isset($_POST['login'])) {
    // getting the input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

	// SQL Statement without Prepared Statement or escape string, Query the SQL statement on the database and get result
    $sql_query = "SELECT * FROM buyer WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($connection, $sql_query);
    $getResult = mysqli_fetch_assoc($result);

	// use the mysqli_num_rows to determine if the credentials are stored/existing in the database
    if ($fetchResult = mysqli_num_rows($result) > 0) {
        echo "<script>alert('Login Success!');document.location='homepage.php'</script>";
        $_SESSION['username'] = $username;
    } else {
        echo "<script>alert('Login Failed!');document.location='index.php'</script>";
    }
}
?>