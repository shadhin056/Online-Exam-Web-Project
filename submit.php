<?php require_once 'templates/header.php';?><?php require_once 'templates/ads.php';?>
<?php require_once 'templates/message.php';?>
<?php
// Start the session
session_start();
?>
​<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $Qid=$_POST["qid"];
    $No=$_POST["noq"];
    $count=1;
    $email=$_SESSION['email'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_login";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    while($No >0) {
        $sql = "INSERT INTO qgiven (qId,QNo,Qans,student_email) VALUES ('$Qid', '$count', '$_POST[$count]','$email')";
        //echo $_POST[$count];
        //echo "<br>";
        mysqli_query($conn, $sql);
        $count++;
        $No--;

    }
     $right=0;
     $countt=1;
     //$wrong=0;
    $sql5 = "SELECT * FROM qans WHERE qId='$Qid'";
    $result1 = mysqli_query($conn, $sql5);

    $sql6 = "SELECT * FROM qgiven WHERE qId='$Qid'";
    $result6 = mysqli_query($conn, $sql6);

    if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while(($row = mysqli_fetch_assoc($result1)) && ($row6 = mysqli_fetch_assoc($result6)) ) {
           if($row['QNo']==$row6['QNo']){
              if($row['Qans'] == $row6['Qans']){
                  $right++;
              }
              elseif ($row['Qans'] != $row6['Qans']){
                  $right--;
              }else{

              }

           }
            $countt++;
        }

    }
    $sql3 = "UPDATE qgiven SET marks='$right' WHERE student_email='$email' AND qId='$Qid'";
    mysqli_query($conn, $sql3);
    header("Location: thnx.php");
    mysqli_close($conn);
}
?>



<div class="content">
    <div class="container">
        <div class="row">
            <a href="teacherlogout.php">
                <h2 class="pull-right">

                </h2>
            </a>

            <div class="col-xs-12 ">

                <table bgcolor="#CCCCCC" border="1">
                    <tr bgcolor="#6495ed">
                        <Th>Id</Th>
                        <th>No of Question</th>

                    </tr>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user_login";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM `teacherq` WHERE 	id='{$_GET['id']}'";
                    $result = mysqli_query($conn, $sql);
                    //$rs=mysqli_query("select * from categories");
                    while ($r = mysqli_fetch_assoc($result)) {
                        $id = $r['id'];
                        echo "<tr height='28px' bgcolor='#f8f8f8'>";
                        echo "<td>" . $r['id'] . "</tD>";
                        echo "<td>" . $r['noOfQues'] . "</tD>";
                        echo "<tr>";
                    }
                    ?>
                </table>

                <h1> submit answer : </h1>

                <table bgcolor="#CCCCCC" border="1">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "user_login";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM `teacherq` WHERE 	id='{$_GET['id']}'";
                    $result = mysqli_query($conn, $sql);
                    $r = mysqli_fetch_assoc($result);
                    $noofq=1;
                    //$myArray = array();
                    $QQ = array();
                    //$AA = array();
                    //$rs=mysqli_query("select * from categories");
                    ?>
                    <form action="" method="post">
                        <input type="hidden" value=<?php echo $r['noOfQues'] ?>  id="noq" name="noq">
                        <input type="hidden" value=<?php echo $_GET['id'] ?>  id="qid" name="qid">
                        <?php
                        while ($r['noOfQues'] > 0) {

                            $i=1;
                            echo 'Question No : '.$noofq.'   Answer   =  ';
                            echo '<select name='.$QQ=$noofq.'>';
                            echo '<option value='.$i.'>'.$i.'</option>';
                            $i++;
                            echo '<option value='.$i.'>'.$i.'</option>';
                            $i++;
                            echo '<option value='.$i.'>'.$i.'</option>';
                            $i++;
                            echo '<option value='.$i.'>'.$i.'</option>';
                            $i++;
                            echo '</select>';
                            echo '<br>';
                            $r['noOfQues']--;
                            $noofq++;
                        }
                        ?>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </table>

            </div>
            <?php //require_once 'templates/sidebar.php';?>
        </div>
        <br><br>

    </div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php'; ?>

