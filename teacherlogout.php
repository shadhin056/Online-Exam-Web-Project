<?php
session_start();
if (isset($_SESSION['temail'])) {
    session_destroy();
    echo "<br> you are logged out successufuly!";
}
echo "<br/><a href='index.php'>login</a>";
?>