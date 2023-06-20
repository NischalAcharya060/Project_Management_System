<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update project |Project Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the project details from the form data
            $id = $_POST['id'];
            $project_name = $_POST['project_name'];
            $description = $_POST['description'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            // Connect to the database
            $db = new mysqli('localhost', 'root', '', 'project_management_system');

            // Update the project details in the database
            $query = "UPDATE projects SET name='$project_name', description='$description', start_date='$start_date', end_date='$end_date' WHERE id='$id'";
            $result = $db->query($query);

            // Check if the query was successful
            if ($result) {
                echo "<div class='alert alert-success' role='alert'>Project details updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error updating project details: " . $db->error . "</div>";
            }

            // Close the database connection
            $db->close();
        } else {
            // Retrieve the project details from the database
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Connect to the database
                $db = new mysqli('localhost', 'root', '', 'project_management_system');

                // Retrieve the project details from the database
                $query = "SELECT * FROM projects WHERE id='$id'";
                $result = $db->query($query);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $project_name = $row['name'];
                    $description = $row['description'];
                    $start_date = $row['start_date'];
                    $end_date = $row['end_date'];

                    // Display the project details in a form
                    echo "<h1 class='mt-5'>Edit Project</h1>";
                    echo "<form method='post' action='update.php'>";
                    echo "<input type='hidden' name='id' value='$id'>";
                    echo "<div class='form-group'>";
                    echo "<label for='project_name'>Project Name:</label>";
                    echo "<input type='text' class='form-control' id='project_name' name='project_name' value='$project_name'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='description'>Description:</label>";
                    echo "<textarea class='form-control' id='description' name='description'>$description</textarea>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='start_date'>Start Date:</label>";
                    echo "<input type='date' class='form-control' id='start_date' name='start_date' value='$start_date'>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='end_date'>End Date:</label>";
                    echo "<input type='date' class='form-control' id='end_date' name='end_date' value='$end_date'>";
                    echo "</div>";
                    echo "<button type='submit' class='btn btn-primary'>Update</button>";
                    echo "</form>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Project not found.</div>";
                }
                $db->close();
            } else {
                echo "<div class='alert alert-danger' role='alert'>No project selected.</div>";
            }
        }
        ?>
    </div>
</body>

</html>