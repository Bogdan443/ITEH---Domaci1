<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>


<?php

include 'dbh.inc.php';
include "comments.inc.php";

$cid = $_POST['cid'];
$uid = $_POST['uid'];
$date = $_POST['date'];
$message = $_POST['message'];

echo "<form method='POST' action='".editComment($conn)."'>
<input type='hidden' name='cid' value='".$cid."'>
<input type='hidden' name='uid' value='".$uid."'>
<input type='hidden' name='date' value='".$date."'>
<textarea name='message'>".$message."</textarea>
<button type='submit' name='commentSubmit'>Edit</button>
</form>";


?>
    
</body>
</html>