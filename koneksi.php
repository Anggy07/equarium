<?php

$host = "localhost";
$user = "root";
$pass = "toor";
$db   = "blog";

$conn = mysqli_connect($host, $user, $pass);
mysqli_select_db($conn, $db);
