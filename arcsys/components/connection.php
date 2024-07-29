<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "crayfish";
$dbname = "crayfish_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    die("Failed to Connect to Database");
}

// echo "Connected to Database Successfully";
