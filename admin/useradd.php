<?php
session_start();
require("database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
extract($_POST);

if (!isset($_SESSION[alogin]))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
$submit=$_POST["submit"];
$userName=$_POST["userName"];
$userEmail=$_POST["userEmail"];
$userPassword=md5($_POST["userPassword"]);
$typeUser=$_POST["typeUser"];
if($submit)
{
    $sql = "INSERT INTO users (name,email, password,typeUser,created) VALUES ('$userName', '$userEmail', '$userPassword','$typeUser', CURRENT_TIMESTAMP)";
    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:blue' align=center>User Added Successfully.</p>";
    } else {

    }


//mysql_query("insert into questions values ('','$addque','$ans1','$ans2','$ans3','$ans4',,'','','$anstrue','$testid')");


unset($_POST);
}
?>


<link rel="stylesheet" href="quiz.css"/>
<div id="main">
<form name="form1" method="post" onSubmit="return check();">
  <table  border="0" align="center">
    <tr>
      <td width="24%" height="32">Name</td>
      
      <td width="75%" height="32">
	  <input name="userName" placeholder="Name" type="text" id="ans1" size="85" maxlength="85" required>
	  </td>
	  </tr>
        
    <tr>
        <td height="26">Email</td>
      
	    <td><input type="email" name="userEmail" cols="60" rows="4" id="addque"
		 placeholder="Email" required>
		 </textarea></td>
    </tr>
    <tr>
      <td height="26">Password</td>
      
      <td><input name="userPassword" placeholder="Password" type="password" id="ans1" size="85" maxlength="85" required></td>
    </tr>
    <tr>
        <td></td>
        <td>
        <select name="typeUser">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
        </td>
    </tr>
    
   

    <tr>
      <td colspan="2" align="center">
	  <input type="submit" name="submit" value="Add User">
	  <input type="reset"  value="Reset">
	  </td>
    </tr>
  </table>
</form>
</div>