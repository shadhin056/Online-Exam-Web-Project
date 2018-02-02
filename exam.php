<?php require_once 'templates/header.php';?>
<div class="content">
    <div class="container">
        <div class="row">
            <?php require_once 'templates/ads.php';?>
            <?php require_once 'templates/message.php';?>
            <?php //require_once 'templates/tutorials.php';?>
            <div class="col-xs-12">

                <table bgcolor="#CCCCCC" border="1">
                    <tr bgcolor="gray">
                        <Th>Id</Th>
                        <th>Teacher Name</th>
                        <th>subject</th>
                        <th>file</th>
                        <th>start time</th>
                        <th>End time</th>
                        <th>Exam</th>
                    </tr>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user_login";
                    //$email=$_SESSION['email'];
                    // Create connection
                    $conn1 = mysqli_connect($servername, $username, $password, $dbname);
                    $sql1 = "SELECT * FROM teacherq WHERE allowOrNot='Allow' AND subject='{$_GET['id']}'";
                    //$sql1 = "SELECT * FROM teacherq WHERE allowOrNot ='allow' AND subject='lol'";
                    $result1 = mysqli_query($conn1, $sql1);
                    //$rs=mysqli_query("select * from categories");
                    while($r1 = mysqli_fetch_assoc($result1))
                    {
                        $id=$r1['id'];
                        echo "<tr height='28px' bgcolor='#f8f8f8'>";
                        echo "<td>".$r1['id']."</tD>";
                        echo "<td>".$r1['teachername']."</tD>";
                        echo "<td>".$r1['subject']."</tD>";
                        echo "<td>".$r1['file']."</tD>";
                        echo "<td>".$r1['qstart']."</tD>";
                        echo "<td>".$r1['qend']."</tD>";
                        echo "<td><a style='color: #4bcb1f' href='submit.php?id=$id'>submit my ans</a>
<a style='color: #363ecb' href='viewQuestion.php?id=$id'>Exam</a>
 <a style='color: #cb478d' href='studentGetResult.php?id=$id'>View Result</a><a style='color: #cacb69' href='sresult.php?id=$id'>View Result new</a>
</td>";
                        echo "<tr>";
                    }
                    ?>
                </table>

            </div>
            <?php //require_once 'templates/sidebar.php';?>
        </div>
    </div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php';?>

