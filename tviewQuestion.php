<?php
// Start the session
session_start();

if(isset($_SESSION['temail'])){

    // $anow=$_SESSION['email22'];

}else{header("Location: index.php");
}
?><!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //start validation
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_login";

    $questionId = $_POST["qid"];
    //  $questionId = 'ami';
    $questionAns = $_POST["qans"];
    // $questionAns = 'tumi';

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // $sql = 'INSERT INTO allans (qId, answer, timeup)VALUES ("$questionId", "$questionAns", )';
    $sql12 = "INSERT INTO `allans` (`qId`,`answer`,`timeup`) VALUES ('$questionId','$questionAns',CURRENT_TIMESTAMP)";

    if (mysqli_query($conn, $sql12)) {
        header('Location: a.php');exit;
    }

    mysqli_close($conn);
}


?>






<div class="content">
    <div class="container">
        <div class="row">

            <a href="teacherlogout.php"> <h2 class="pull-right"><button type="button" class="btn btn-info">logout</button></h2></a>

            <h2>Time remaining : </h2>
            <h1 id="demo"></h1>

            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "user_login";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "select * from teacherq where id='{$_GET['id']}'";
            $result = mysqli_query($conn, $sql);
            //$rs=mysqli_query("select * from categories");


            while ($r = mysqli_fetch_assoc($result)) {
                date_default_timezone_set('Asia/Dhaka');
                //'Asia/Dhaka' => 6.00,
                //$id = $r['id'];
                $databaseValue = $r['qstart'];

                $nowValue = str_replace('T', ' ', $databaseValue);

                $date1 = date($nowValue);
                //date_create($r['qstart']);
                //echo $r['qstart'];
                $startDate = strtotime($date1);
                $today = date("Y-m-d H:i");
                //$dt = localtime();

                $todayDate = strtotime($today);
                /* echo $startDate;
                 echo $todayDate;*/
                //echo $dt;
                $val1 = $date1;
                //echo "<pre>";
                $val2 = $today;
                // echo "<pre>";

                $datetime1 = new DateTime($val1);
                $datetime2 = new DateTime($val2);
                /*echo $datetime1;
                echo "<pre>";
                echo $datetime2;
                echo "<pre>";*/
                //var_dump($datetime1->diff($datetime2));

                /*if($datetime1 > $datetime2)
                    echo "1 is bigger";
                else
                    echo "2 is bigger";*/


                echo "<tr height='288px' bgcolor='#f8f8f8'>";
                echo "<td>This is question</td>";

                echo '<br>';
                if ($datetime1 <= $datetime2) {
                    echo "<embed type=\"application/pdf\" width='700px' height='500px' src=" . $r['file'] . "></td>";


                } else {
                    echo "Question will update soon no";
                }
                // echo "<td>$date1</td>";


                echo "<tr>";


            }
            ?>
            <?php if ($datetime1 <= $datetime2){?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <p>Answer Box: </p>
                    <textarea id="qans" name="qans" rows="5" cols="100"></textarea>
                    <input type="hidden" id="qid" name="qid" value="<?php echo  $_GET['id'] ?>">
                    <br>
                    <button type="submit" id="qup" name="qup" class="btn btn-default">Submit</button>
                </form>
            <?php }?>

            <input type="hidden" name="timesss" value="<?php echo $date1 ?>" id="timesss">
        </div>
    </div>
</div> <!-- /container -->
</body>
</html>

<script>
    var td = document.getElementById("timesss").value;
    // Set the date we're counting down to
    var countDownDate = new Date(td).getTime();

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Published !!";
        }
    }, 1000);
</script>