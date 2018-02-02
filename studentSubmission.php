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
                        <th>Question Id</th>
                        <th>Student Email</th>

                        <th>Answer</th>
                        <th>Marks</th>
                        <th>Submit Time</th>

                        <th>Action</th>
                    </tr>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user_login";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM `allans` WHERE qId='{$_GET['id']}'";
                    $result = mysqli_query($conn, $sql);
                    //$rs=mysqli_query("select * from categories");
                    while($r = mysqli_fetch_assoc($result))
                    {
                        $id=$r['id'];
                        echo "<tr height='28px' bgcolor='#f8f8f8'>";
                        echo "<td>".$r['id']."</tD>";
                        echo "<td>".$r['qId']."</tD>";
                        echo "<td>".$r['StudentID']."</tD>";
                        echo "<td>".$r['answer']."</tD>";
                        echo "<td>".$r['marks']."</tD>";
                        echo "<td>".$r['timeup']."</tD>";
                        echo "<td><a style='color: #cb478d' href='submitmarks.php?id=$id'>Submit Marks </a>
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

