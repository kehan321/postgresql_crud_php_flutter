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

// Get the input data from the POST request
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];

// SQL query to update data
$query = "UPDATE my_table SET name = $1, age = $2 WHERE id = $3";

// Data to be updated
$data = array($name, $age, $id);

// Execute the query
$result = pg_query_params($dbconn, $query, $data);

// Check if the query was successful
if ($result) {
    echo "Data updated successfully.\n";
} else {
    echo "Error: Unable to update data.\n";
}

// Close the database connection
pg_close($dbconn);
?>
