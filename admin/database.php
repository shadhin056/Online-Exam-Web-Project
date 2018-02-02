<?php
/*$cn=mysqli_connect("localhost","root","") or die("Could not Connect My Sql");
mysqli_select_db("user_login",$cn)  or die("Could connect to Database");*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
