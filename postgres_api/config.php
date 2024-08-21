<?php
$host = '127.0.0.1';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres';
$password = 'new'; // Update with your PostgreSQL password

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Create connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>