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

// SQL query to delete data
$query = "DELETE FROM my_table WHERE id = $1";

// Data to be deleted
$data = array($_POST['id']);

// Execute the query
$result = pg_query_params($dbconn, $query, $data);

// Check if the query was successful
if ($result) {
    echo "Data deleted successfully.\n";
} else {
    echo "Error: Unable to delete data.\n";
}

// Close the database connection
pg_close($dbconn);
?>
