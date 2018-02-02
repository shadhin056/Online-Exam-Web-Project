<?php
session_start();
require("database.php");
include("header.php");
error_reporting(1);
?>
<?php

extract($_POST);


if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>
<link rel="stylesheet" href="quiz.css"/>

<div id="main">
<table width="726" border="1"  bgcolor="#CCCCCC">
<tr bgcolor="#99FFFF" height="30px">
	<td colspan="8"><a href="useradd.php">Add New User</a></td>
</tr>
<tr height="30px" style="background-color:gray">
	<Td width="27" >Id</Td>
	<th width="131" >Name</th>
	<th width="34" >Email</th>
	<!--<th width="65" >Password</th>-->
	<th width="65" >Type user</th>
	<th width="65" >Created Date</th>
	<th >Update/Delete</th>
</tr>

<?php
$sql = "select * from users";
$result = mysqli_query($conn, $sql);

//$rs=mysqli_query("select * from users");
while($r = mysqli_fetch_assoc($result))
{
$id=$r[id];
echo "<tr height='28px' bgcolor='#f8f8f8'>";
echo "<td>".$r[id]."</tD>";
echo "<td width='200px'>".$r[name]."</tD>";
echo "<td>".$r[email]."</tD>";/*
echo "<td>".$r[password]."</tD>";*/
echo "<td>".$r[typeUser]."</tD>";
echo "<td>".$r[created]."</tD>";
echo "<td>
<a href='deleteuser.php?id=$id'>Delete</a>&nbsp;
  
  
</td>";
echo "</tr>";
}
?>
</table>
</div>