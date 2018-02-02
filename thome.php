<?php
// Start the session
session_start();

if(isset($_SESSION['temail'])){

   // $anow=$_SESSION['email22'];

}else{header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
​<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //start validation
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_login";
    //$qfile = $_POST["qfile"];
    $qname = $_POST["qname"];
    $noofq = $_POST["noofq"];

    $qstart = $_POST["qstart"];
    //$qstartd = $_POST["qstartd"];
    //$qstartall = $qstartd.' '.$qstart;


    $qend = $_POST["qEnd"];
    //$qendd = $_POST["qEndd"];
    //$qenddall = $qendd.' '.$qend;

    $tname=$_SESSION['temail'];
// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //$permited=array('jpg','jpeg','png','gif');
    $file_name=$_FILES['qfile']['name'];
    $file_size=$_FILES['qfile']['size'];
    $file_temp=$_FILES['qfile']['tmp_name'];
    $div= explode('.', $file_name);
    $file_exe= strtolower(end($div));
    $proUniqname= substr(md5(time()), 0,10).'.'.$file_exe;
    $s='abcd';



    if (!is_dir($s)) {
        mkdir("$s");
    }
    $uploadimagefolder="$s/".$proUniqname;
        $folder="img/";
        move_uploaded_file($file_temp, $uploadimagefolder);
        //$sql = "UPDATE register SET mphoto='$uploadimagefolder' WHERE Email='$anow'";
   $sql = "INSERT INTO  teacherq (teachername,subject,file,qstart,qend,noOfQues)VALUES ('$tname','$qname','$uploadimagefolder','$qstart','$qend',$noofq)";
    //$sql = "INSERT INTO teacherq (subject, file, qstart,qend)
//VALUES ('John', 'Doe', 'john@example.com','s')";
        //$result = mysqli_query($conn, $sql);

        if (mysqli_query($conn, $sql)) {

            echo"<script>
    alert('Record updated successfully');
</script>";
            header("Location: thome.php");
        } else {
            echo"<script>
    alert('Record not updated successfully');
</script>";
            //echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);

}
?>
<div class="container">
    <?php
    $id= $_SESSION['temail'];
    ?>
   <a href="teacherlogout.php"> <h2 class="pull-right"><button type="button" class="btn btn-info">logout</button></h2></a>
   <a href='teacherCourse.php?id=<?php echo $id ?>' > <h2 class="pull-right"><button type="button" class="btn btn-danger">My Question</button></h2></a>

    <h2><?php echo $_SESSION['temail'] ?> Teacher Home</h2>
    <h2>Upload question</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Enter Question Subject :</label>
            <div class="col-sm-10">
            <select  id="qname" name="qname">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "user_login";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql2 = "SELECT categories.category_name FROM `categories`";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result2)) {
                    echo "<option value=".$row["category_name"].">".$row["category_name"]."</option>"."<br>";
                }
            }
            ?>
            </select>

                <!--<input type="text" class="form-control" name="qname" id="qname" placeholder="Enter Subject">-->
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Enter question File</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="qfile" name="qfile">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Time:</label>
            <div class="col-sm-10">
                No of Question :
                <input class="form-control" type="number" id="noofq" name="noofq">
                <!--<input class="form-control" type="time" id="qstart" name="qstart">-->


            </div>
        </div> <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Time:</label>
            <div class="col-sm-10">
                Start time:
                <input class="form-control" type="datetime-local" id="qstart" name="qstart">
                <!--<input class="form-control" type="time" id="qstart" name="qstart">-->


            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                End time:
                <input class="form-control" type="datetime-local" id="qEnd" name="qEnd">
                <!--<input class="form-control" type="time" id="qEnd" name="qEnd">-->

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="qup" name="qup" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>
​
</body>
</html>
​

