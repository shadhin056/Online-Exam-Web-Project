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
<table width="400px" bgcolor="#CCCCCC" border="1">
<tr bgcolor="#99FFFF" height="30px">
	<td colspan="3"><a href="subadd.php">Add Category</a></td>
</tr>
<tr bgcolor="gray">
	<Th>Id</Th>
	<th>Category</th>
	<th>Update/Delete</th>
</tr>

<?php
$sql = "select * from categories";
$result = mysqli_query($conn, $sql);
//$rs=mysqli_query("select * from categories");
while($r = mysqli_fetch_assoc($result))
{
$id=$r[id];
echo "<tr height='28px' bgcolor='#f8f8f8'>";
echo "<td>".$r[id]."</tD>";
echo "<td>".$r[category_name]."</tD>";
echo "<td><a href='deletecategory.php?id=$id'>Delete</a>&nbsp;&nbsp;
<a href='updatecategory.php?id=$id'>Update</a>
</td>";
echo "<tr>";
}
?>
</table>
</div>