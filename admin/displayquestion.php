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
    <table bgcolor="#CCCCCC" border="1">
        <tr bgcolor="gray">
            <Th>Id</Th>
            <th>Teacher Email</th>
            <th>Subject Name</th>
            <!--<th>Question</th>-->
            <th>Start Time</th>
            <th>End Time</th>
            <th>Allow Or Not</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "select * from teacherq";
        $result = mysqli_query($conn, $sql);
        //$rs=mysqli_query("select * from categories");
        while($r = mysqli_fetch_assoc($result))
        {
            $id=$r[id];
            echo "<tr height='28px' bgcolor='#f8f8f8'>";
            echo "<td>".$r[id]."</tD>";
            echo "<td>".$r[teachername]."</tD>";
            echo "<td>".$r[subject]."</tD>";
            /*            echo "<td>".$r[file]."</tD>";*/
            echo "<td>".$r[qstart]."</tD>";
            echo "<td>".$r[qend]."</tD>";
            echo "<td>".$r[allowOrNot]."</tD>";
            echo "<td><a style='color: red' href='deletefile.php?id=$id'>Delete</a>&nbsp;&nbsp;
<a style='color: #00CC66' href='addfile.php?id=$id'>Add to Question</a>
<a style='color: #cb478d' href='removeAllow.php?id=$id'>Remove Allow</a>
<a style='color: #5bc0de' href='viewFile.php?id=$id'>View Question</a>
</td>";
            echo "<tr>";
        }
        ?>
    </table>
</div>