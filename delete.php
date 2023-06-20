<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'project_management_system');

// Retrieve the project ID from the query string
$id = $_GET['id'];

// Delete the project from the database
$query = "DELETE FROM projects WHERE id = $id";
$result = $db->query($query);

// Check if the query was successful
if ($result) {
    echo "Project deleted successfully.";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

// Close the database connection
$db->close();
