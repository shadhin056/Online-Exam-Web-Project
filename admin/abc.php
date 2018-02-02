
<?php
$to = "shadhinemail@gmail.com";
$subject = "My subject";
$txt = "Hello world shadhin how are you!";
$headers = "From: shadhinemail@gmail.com" . "\r\n" .
"CC: shadhinemail@gmail.com";

mail($to,$subject,$txt,$headers);
?>