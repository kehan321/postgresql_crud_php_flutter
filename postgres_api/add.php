<?php
// Database connection parameters
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "new";

// Create a connection string
$connectionString = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Connect to the PostgreSQL database
$dbconn = pg_connect($connectionString);

// Check if the connection was successful
if (!$dbconn) {
    echo "Error: Unable to connect to the database.\n";
    exit;
}

// SQL query to insert data
$query = "INSERT INTO my_table (name, age) VALUES ($1, $2)";

// Data to be inserted
$data = array($_POST['name'], $_POST['age']);

// Execute the query
$result = pg_query_params($dbconn, $query, $data);

// Check if the query was successful
if ($result) {
    echo "Data inserted successfully.\n";
} else {
    echo "Error: Unable to insert data.\n";
}

// Close the database connection
pg_close($dbconn);
?>
