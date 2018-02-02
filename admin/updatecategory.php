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
<?php 
$q=mysqli_query("select * from categories where id='{$_GET['id']}'");
$rr=mysqli_fetch_array($q);
$cat=$_POST["cat"];
$upd=$_POST["upd"];
if($upd)
{
//mysqli_query("update categories set category_name='$cat' where id='{$_GET['id']}'");
    $sql = "UPDATE categories SET category_name='$cat' WHERE id='{$_GET['id']}'";
    mysqli_query($conn, $sql);
echo "<font color='blue'>Cateogry updated</font>";
}
?>
<form method="post">
<table width="588" border="2">
  <tr>
    <td width="170" >Old Category</td>
    <td width="400"><input type="text" name="cat" value="<?php echo $rr[1]; ?>"/></td>
  </tr>

  <tr>
    <td colspan="2" align="center">
	<input type="submit" value="Update Category" name="upd"/>
	</td>
  </tr>
</table>
</form>
</div>
