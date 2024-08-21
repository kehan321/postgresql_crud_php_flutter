<?php
header('Content-Type: application/json');

// Database connection parameters
$host = '127.0.0.1'; // PostgreSQL host
$port = '5432';      // PostgreSQL port
$dbname = 'postgres'; // Database name
$user = 'postgres';   // PostgreSQL username
$password = 'new';    // PostgreSQL password

// Create a connection string
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Connect to the PostgreSQL database
$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    echo json_encode(['error' => 'Connection failed']);
    exit;
}

// Query to fetch data from my_table
$query = 'SELECT id, name, age FROM my_table'; // Ensure 'my_table' is the correct table name
$result = pg_query($dbconn, $query);

if (!$result) {
    echo json_encode(['error' => 'Query failed']);
    exit;
}

// Fetch all rows and encode as JSON
$data = [];
while ($row = pg_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

// Close the database connection
pg_close($dbconn);
?>
