<?php require_once 'templates/header.php';?>
<div class="content">
    <div class="container">
        <div class="row">
            <?php require_once 'templates/ads.php';?>
            <?php require_once 'templates/message.php';?>
            <?php //require_once 'templates/tutorials.php';?>
            <div class="col-xs-12">
                <div class="row">
                    <?php require_once 'templates/ads.php';?>
                    <?php require_once 'templates/message.php';?>
                    <?php //require_once 'templates/tutorials.php';?>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                        <table bgcolor="#CCCCCC" border="1">
                            <tr bgcolor="gray">
                                <Th>Id</Th>
                                <th>Course Name</th>

                                <th>Action</th>
                            </tr>

                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "user_login";

                            // Create connection
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            $sql = "SELECT * FROM `categories`";
                            $result = mysqli_query($conn, $sql);
                            //$rs=mysqli_query("select * from categories");
                            while($r = mysqli_fetch_assoc($result))
                            {
                                $id=$r['category_name'];
                                echo "<tr height='28px' bgcolor='#f8f8f8'>";
                                echo "<td>".$r['id']."</tD>";
                                echo "<td>".$r['category_name']."</tD>";
                                echo "<td><a style='color: #00CC66' href='addcourse.php?id=$id'>Add to My Course</a>

</td>";
                                echo "<tr>";
                            }
                            ?>
                        </table>

                    </div>
                    <?php //require_once 'templates/sidebar.php';?>
                </div>
                <br><br>
                <div class="row">
                    <?php require_once 'templates/ads.php';?>
                    <?php require_once 'templates/message.php';?>
                    <?php //require_once 'templates/tutorials.php';?>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

                        <table bgcolor="#CCCCCC" border="1">
                            <tr bgcolor="gray">
                                <Th>Id</Th>
                                <th>Course Name</th>

                                <th>my email</th>
                                <th>Action</th>
                            </tr>

                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "user_login";
                            $email=$_SESSION['email'];
                            // Create connection
                            $conn1 = mysqli_connect($servername, $username, $password, $dbname);
                            $sql1 = "SELECT * FROM studentcourselist WHERE studentcourselist.studentemail='$email';";
                            $result1 = mysqli_query($conn, $sql1);
                            //$rs=mysqli_query("select * from categories");
                            while($r1 = mysqli_fetch_assoc($result1))
                            {
                                $id=$r1['courseName'];
                                echo "<tr height='28px' bgcolor='#f8f8f8'>";
                                echo "<td>".$r1['id']."</tD>";
                                echo "<td>".$r1['courseName']."</tD>";
                                echo "<td>".$r1['studentemail']."</tD>";
                                echo "<td><a style='color: #cb121e' href='courseremove.php?id=$id'>Course remove</a>  <a style='color: #363ecb' href='exam.php?id=$id'>Exam</a>
</td>";
                                echo "<tr>";
                            }
                            ?>
                        </table>

                    </div>
                    <?php //require_once 'templates/sidebar.php';?>
                </div>
            </div>
            <?php //require_once 'templates/sidebar.php';?>
        </div>
    </div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php';?>

