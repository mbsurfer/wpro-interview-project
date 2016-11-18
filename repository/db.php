<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "starwars";

// Create connection
$dbConn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($dbConn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}