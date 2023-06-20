<?php
// Retrieve the project details from the form data
$project_name = $_POST['project_name'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'project_management_system');

// Insert the project details into the database
$query = "INSERT INTO projects (name, description, start_date, end_date) VALUES ('$project_name', '$description', '$start_date', '$end_date')";
$result = $db->query($query);

// Check if the query was successful
if ($result) {
    echo "Project details saved successfully.";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

// Close the database connection
$db->close();
