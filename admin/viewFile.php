<!DOCTYPE html>
<html>
<body>
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
    /*$q=mysqli_query("select * from teacherq where id='{$_GET['id']}'");
    $rr=mysqli_fetch_array($q);
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = mysqli_query($conn, $sql);*/

    $sql = "select * from teacherq where id='{$_GET['id']}'";
    $result = mysqli_query($conn, $sql);
    //$rs=mysqli_query("select * from categories");
    while($r = mysqli_fetch_assoc($result))
    {
        $id=$r[id];
        echo "<tr height='288px' bgcolor='#f8f8f8'>";
        echo "<td>This is question</td>";
        echo "<embed width='100%' height='100%' src=../".$r[file]."></object></td>";
        echo "<tr>";
    }
    ?>

</div>

</body>
</html>