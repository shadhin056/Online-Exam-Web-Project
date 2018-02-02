<?php
// Start the session
session_start();

if(isset($_SESSION['temail'])){

    // $anow=$_SESSION['email22'];

}else{header("Location: index.php");
}
?>
<?php
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //start validation
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_login";

    $ansid = $_POST["ansid"];
    //  $questionId = 'ami';
    $markss = $_POST["marks"];
    // $questionAns = 'tumi';

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // $sql = 'INSERT INTO allans (qId, answer, timeup)VALUES ("$questionId", "$questionAns", )';
    $sql16 = "UPDATE allans SET marks = '$markss' WHERE id='$ansid'";

    if (mysqli_query($conn, $sql16)) {
        header('Location: a.php');exit;
    }

    mysqli_close($conn);
}


?>


<div class="content">
    <div class="container">
        <div class="row">
            <a href="teacherlogout.php"> <h2 class="pull-right"><button type="button" class="btn btn-info">logout</button></h2></a>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_login";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `allans` WHERE id='{$_GET['id']}'";
$result = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($result)
?>


            <div class="col-xs-12 ">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    ID: <input  type="text" id="ansid" name="ansid" value="<?php echo $r['id'] ?>">

                    <br><br>
                    Question id : <input disabled type="text" name="qid" value="<?php echo $r['qId'] ?>">

                    <br><br>
                    Student EMail: <input disabled type="text" name="studentid" value="<?php echo $r['StudentID'] ?>">

                    <br><br>Marks: <input type="text" name="marks" id="marks" value="">

                    <br><br>
                    <button type="submit" id="qup" name="qup" class="btn btn-default">Submit</button>
                </form>


            </div>
            <?php //require_once 'templates/sidebar.php';?>
        </div>
        <br><br>

    </div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php';?>

