<?php

$servername = "remotemysql.com";
$username = "jnTpFs4Xem";
$password = "eQbqLYNTCo";
$database = "jnTpFs4Xem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>