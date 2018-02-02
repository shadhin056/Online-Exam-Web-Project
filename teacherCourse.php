<?php
// Start the session
session_start();

if(isset($_SESSION['temail'])){

    // $anow=$_SESSION['email22'];

}else{header("Location: index.php");
}
?>
<div class="content">
    <div class="container">
        <div class="row">
            <a href="teacherlogout.php"> <h2 class="pull-right"><button type="button" class="btn btn-info">logout</button></h2></a>

            <div class="col-xs-12 ">

                <table bgcolor="#CCCCCC" border="1">
                    <tr bgcolor="#6495ed">
                        <Th>Id</Th>
                        <th>Teacher Name</th>
                        <th>Subject</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Start time</th>
                        <th>End Time</th>
                        <th>No of question</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user_login";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM `teacherq` WHERE teachername='{$_GET['id']}'";
                    $result = mysqli_query($conn, $sql);
                    //$rs=mysqli_query("select * from categories");
                    while($r = mysqli_fetch_assoc($result))
                    {
                        $id=$r['id'];
                        echo "<tr height='28px' bgcolor='#f8f8f8'>";
                        echo "<td>".$r['id']."</tD>";
                        echo "<td>".$r['teachername']."</tD>";
                        echo "<td>".$r['subject']."</tD>";
                        echo "<td>".$r['file']."</tD>";
                        echo "<td>".$r['allowOrNot']."</tD>";
                        echo "<td>".$r['qstart']."</tD>";
                        echo "<td>".$r['qend']."</tD>";
                        echo "<td>".$r['noOfQues']."</tD>";
                        echo "<td><a style='color: #f9a544' href='submitans.php?id=$id'>Submit Ans</a><a style='color: #00CC66' href='tviewQuestion.php?id=$id'>View File</a>
<a style='color: #cb478d' href='studentSubmission.php?id=$id'>View Submission</a>
</td>";
                        echo "<tr>";
                    }
                    ?>
                </table>

            </div>
            <?php //require_once 'templates/sidebar.php';?>
        </div>
        <br><br>

    </div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php';?>

