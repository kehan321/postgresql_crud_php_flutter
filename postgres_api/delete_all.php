<?php
// Database connection parameters
$host = "localhost";
$port = "5432"; // Default port for PostgreSQL
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

// SQL query to delete all records
$query = "DELETE FROM my_table";

// Execute the query
$result = pg_query($dbconn, $query);

// Check if the query was successful
if ($result) {
    echo "All records deleted successfully.\n";
} else {
    echo "Error: Unable to delete records.\n";
}

// Close the database connection
pg_close($dbconn);
?>
