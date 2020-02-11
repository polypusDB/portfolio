<?php

$servername = "localhost"; // db5000288875.hosting-data.io
$username = "root"; // dbu297767
$password = ""; //1073582St.
$db = "portfolio"; //dbs282112

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>