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
$q=mysql_query("select * from questions where id='{$_GET['id']}'");
$rr=mysql_fetch_array($q);
if($updq)
{
mysql_query("update questions set question_name='$addque',answer1='$ans1',answer2='$ans2',answer3='$ans3',answer4='$ans4',answer 	='$trueans' where id='{$_GET['id']}'");
echo "<font color='blue'>Question updated</font>";
}
?>
<form method="post">
<table width="588" border="2">
  <tr>
    <td width="170" >Question</td>
    <td width="400"><textarea name="addque"> <?php echo $rr[1]; ?></textarea></td>
  </tr>
   <tr>
    <td width="170" >Anser 1</td>
    <td width="400"><input type="text" name="ans1" value="<?php echo $rr[2]; ?>"/></td>
  </tr>
   <tr>
    <td width="170" >Answer 2</td>
    <td width="400"><input type="text" name="ans2" value="<?php echo $rr[3]; ?>"/></td>
  </tr>
  <tr>
    <td width="170" >Answer 3</td>
    <td width="400"><input type="text" name="ans3" value="<?php echo $rr[4]; ?>"/></td>
  </tr>
 <tr>
    <td width="170" >Answer 4</td>
    <td width="400"><input type="text" name="ans4" value="<?php echo $rr[5]; ?>"/></td>
  </tr>
   <tr>
    <td width="170" >True Answer</td>
    <td width="400"><input type="text" name="trueans" value="<?php echo $rr[8]; ?>"/></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center">
	<input type="submit" value="Update Question" name="updq"/>
	</td>
  </tr>
</table>
</form>
</div>
