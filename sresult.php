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
                        <th>Question Id</th>
                        <th>Question no</th>
                        <th>Q ans</th>
                        <th>student mail</th>
                        <th>marks</th>
                    </tr>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user_login";
                    //$email=$_SESSION['email'];
                    // Create connection
                    $conn1 = mysqli_connect($servername, $username, $password, $dbname);
                    $sql1 = "SELECT * FROM qgiven WHERE qId ='{$_GET['id']}'";
                    //$sql1 = "SELECT * FROM teacherq WHERE allowOrNot ='allow' AND subject='lol'";
                    $result1 = mysqli_query($conn1, $sql1);
                    //$rs=mysqli_query("select * from categories");
                    while($r1 = mysqli_fetch_assoc($result1))
                    {
                        $id=$r1['id'];
                        echo "<tr height='28px' bgcolor='#f8f8f8'>";
                        echo "<td>".$r1['id']."</tD>";
                        echo "<td>".$r1['qId']."</tD>";
                        echo "<td>".$r1['QNo']."</tD>";
                        echo "<td>".$r1['Qans']."</tD>";
                        echo "<td>".$r1['student_email']."</tD>";
                        echo "<td>".$r1['marks']."</tD>";

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

