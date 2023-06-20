<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'project_management_system');

// Retrieve the project details from the database
$query = "SELECT * FROM projects";
$result = $db->query($query);

// Check if there are any projects
if ($result->num_rows > 0) {
    // Loop through each project and add it to the $projects array
    $projects = array();
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
} else {
    // If there are no projects, set $projects to an empty array
    $projects = array();
}

// Close the database connection
$db->close();
?>

<html>

<head>
    <title>Project List |Project Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Project List</h1>
        <a href="project.php" class="btn btn-primary">Add New Project</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project) : ?>
                    <tr>
                        <td><?php echo $project['name']; ?></td>
                        <td><?php echo $project['description']; ?></td>
                        <td><?php echo $project['start_date']; ?></td>
                        <td><?php echo $project['end_date']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $project['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $project['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>