<?php

$conn = mysqli_connect('localhost', 'root', '', 'commentssection');

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
?>