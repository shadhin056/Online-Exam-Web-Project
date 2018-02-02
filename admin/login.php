<?php
session_start();
error_reporting(1);
?>

<?php
include("header.php");
extract($_POST);
$submit=$_POST["submit"];
$loginid=$_POST["loginid"];
$pass=$_POST["pass"];
if(isset($submit))
{

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

    // $cn=mysqli_connect("localhost","root","") or die("Could not Connect My Sql");
    //mysqli_select_db("user_login",$cn)  or die("Could not connect to Database");
    //$rs=mysqli_query($cn,"select * from mst_admin where loginid='$loginid' and pass='$pass'") or die(mysqli_error());
    $sql = "select * from mst_admin where loginid='$loginid' and pass='$pass'";
    $result = mysqli_query($conn, $sql);
   // $result = $conn->query($rs);


    //$result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)<1)
	{
		echo "<BR><BR><p align=center style=color:red> Invalid User Name or Password</p>";
		exit;
		
	}

	$_SESSION['alogin']="true";
	
}
else if(!isset($_SESSION[alogin]))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
}
?>
<link rel="stylesheet" href="quiz.css"/>
<div id="main">
	<div style="margin:auto;width:400px;height:200px;text-align:left">
	<div style="margin-left:20%;padding-top:5%">
	<p class="style7"><a href="displaycategory.php">Manage Category</a></p>
	<p class="style7"><a href="displayquestion.php">Manage Question </a></p>
	<p class="style7"><a href="displayuser.php">Manage User</a></p>
	<p align="center" class="head1">&nbsp;</p>
	</div>
	</div>
	</div>
