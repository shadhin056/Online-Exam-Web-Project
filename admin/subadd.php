<?php
session_start();
require("database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);


if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}


echo "<table width=100%>";
echo "<tr><td align=center></table>";
$subname=$_POST["subname"];
$cattime=$_POST["subname"];
if($submit=='submit' || strlen($subname)>0 )
{


$rs=mysqli_query("select * from categories where category_name='$subname'");
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Category(Technology)  Already Exists</div>";
	exit;
}
    $sql = "insert into categories(category_name) values ('$subname')";

    if ($conn->query($sql) === TRUE) {
        echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";
    }

   /* mysqli_query("insert into categories(category_name,time) values ('$subname','$cattime')",$cn) or die(mysqli_error());
echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";*/
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>
<link rel="stylesheet" href="quiz.css"/>
<div id="main">
<form name="form1" method="post" onSubmit="return check();">
  <table style="border:1px dotted gray"  border="0" align="center">
  <tr>
    <td >Enter Category Name</td>
    <td> <input name="subname" placeholder="Enter Technology" type="text" id="subname" required></td>
  </tr>
<!--  <tr>
    <td>Enter Time </td>
    <td> <input name="cattime" placeholder="Enter time in second" type="text" id="cattime" required></td>
  </tr>-->
  <tr>
    <td colspan="2" align="center">
	<input type="submit" name="submit" value="Add Technology" >
	</td>
  </tr>
</table>

</form>
</div>