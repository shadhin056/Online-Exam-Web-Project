<?php require_once 'templates/header.php';?>
<div class="content">
    <div class="container">
        <div class="row">
            <?php require_once 'templates/ads.php';?>
            <?php require_once 'templates/message.php';?>
            <?php //require_once 'templates/tutorials.php';?>
            <div class="col-xs-12">
                <div id="main">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user_login";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $email=$_SESSION['email'];
                    $sql = "INSERT INTO studentcourselist (courseName,studentemail) VALUES ('{$_GET['id']}', '$email')";
                    //$sql = "UPDATE teacherq SET allowOrNot='Allow' WHERE id='{$_GET['id']}'";
                   // mysqli_query($conn, $sql);
                    if (mysqli_query($conn, $sql)) {
                        echo "Course Added";
                    }
                    ?>
                </div>
            </div>
            <?php //require_once 'templates/sidebar.php';?>
        </div>
    </div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php';?>

