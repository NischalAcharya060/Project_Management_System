<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management System</title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  </link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" integrity="sha512-jcAER9aR7UnlZruH34dLRSaFQQBWLcp7PVuMBWTCsV7iCnY9ARvWeT8fWPH1Qb/YkMaZf6UcaD6U7z6UfME2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-FizJO+HnNYD8rNwfvGvGeYIWLyfNjMNskow29pP9Rl7kAaq1mHdDZYIgFmBv7JYbPktmV7TUbTDP9oA7jNU0ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="https://acharyanischal.com.np" target="_blank" class="brand">
      <i class="bx bx-task"></i>
      <span class="logo">Project Management System</span>
    </a>
    <ul class="side-menu top">
      <li class="active">
        <a href="index.php">
          <i class="bx bxs-dashboard"></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="project.php">
          <i class="bx bxs-shopping-bag-alt"></i>
          <span class="text">Projects</span>
        </a>
      </li>
      <li>
        <a href="project_view.php">
          <i class="bx bxs-shopping-bag-alt"></i>
          <span class="text">View-Projects </span>
        </a>
      </li>
      <ul class="side-menu">
        <li>
          <a href="index.php?logout='1'" class="logout">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
  </section>

  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <i class="bx bx-menu"></i>
      <a href="#" class="nav-link"></a>
      <form action="#">
        <div class="form-input">
          <input type="search" placeholder="Search..." />
          <button type="submit" class="search-btn">
            <i class="bx bx-search"></i>
          </button>
        </div>
      </form>
      <input type="checkbox" id="switch-mode" hidden />
      <label for="switch-mode" class="switch-mode"></label>
      <a href="#" class="notification">
        <i class="bx bxs-bell"></i>
        <span class="num">99</span>
      </a>
      <a href="#" class="profile">
        <img src="img/admin.png" />
      </a>
      <?php if (isset($_SESSION['username'])) : ?>
        <span style="color: var(--txt2);">Welcome, <strong><?php echo $_SESSION['username']; ?></strong></span>
        <a href="index.php?logout='1'" style="color: var(--txt);" class="btn">logout</a>
      <?php endif ?>
      </div>
    </nav>

    <!-- MAIN -->
    <main>
      <div class="head-title">
        <div class="left">
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Dashboard</a>
            </li>
            <li><i class="bx bx-chevron-right"></i></li>
            <li>
              <a class="active" href="index.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- get value of users and new projects from database -->
      <?php
      $db = mysqli_connect('localhost', 'root', '', 'project_management_system');
      $query = "SELECT COUNT(id) AS total_users FROM users";
      $result = mysqli_query($db, $query);
      $data = mysqli_fetch_assoc($result);
      $total_users = $data['total_users'];
      ?>
      <?php
      $db = mysqli_connect('localhost', 'root', '', 'project_management_system');
      $query = "SELECT COUNT(id) AS new_projects FROM projects";
      $result = mysqli_query($db, $query);
      $data = mysqli_fetch_assoc($result);
      $new_projects = $data['new_projects'];
      ?>
      <ul class="box-info">
        <li>
          <i class="bx bxs-calendar-check"></i>
          <span class="text">
            <h3><?php echo $new_projects; ?></h3>
            <p>New Projects</p>
          </span>
        </li>
        <li>
          <i class="bx bxs-group"></i>
          <span class="text">
            <h3><?php echo $total_users; ?></h3>
            <p>Total Users</p>
          </span>
        </li>
        <li>
          <i class="bx bxs-add-to-queue"></i>
          <span class="text">
            <h3>2</h3>
            <p>Task</p>
          </span>
        </li>
      </ul>

      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Recent Projects</h3>
            <i class="bx bx-search"></i>
            <i class="bx bx-filter"></i>
          </div>
          <table class="table">
            <!-- <thead>
              <tr>
                <th>Project Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
              </tr>
            </thead> -->
            <!-- <tbody>
              <tr>
                <td>
                  <img src="img/user.png" />
                  <p>Sample Project</p>
                </td>
                <td>01-10-2021</td>
                <td>01-20-2022</td>
                <td><span class="status completed">Completed</span></td>
              </tr>
              <tr>
                <td>
                  <img src="img/user.png" />
                  <p>Bus Management System</p>
                </td>
                <td>01-10-2021</td>
                <td>pending</td>
                <td><span class="status pending">Pending</span></td>
              </tr>
              <tr>
                <td>
                  <img src="img/user.png" />
                  <p>Project Management System</p>
                </td>
                <td>01-10-2021</td>
                <td>processing</td>
                <td><span class="status process">Process</span></td>
              </tr>
            </tbody> -->
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($projects as $project) : ?>
                <tr>
                  <td><?php echo $project['name']; ?></td>
                  <td><?php echo $project['description']; ?></td>
                  <td><?php echo $project['start_date']; ?></td>
                  <td><?php echo $project['end_date']; ?></td>
          </table>
          </tr>
        <?php endforeach; ?>
        </tbody>
        </div>
        <div class="todo">
          <div class="head">
            <h3>To-Do</h3>
            <i class="bx bx-plus"></i>
            <i class="bx bx-filter"></i>
          </div>
          <ul class="todo-list">
            <li class="completed">
              <p>Todo List</p>
              <i class="bx bx-dots-vertical-rounded"></i>
            </li>
            <li class="not-completed">
              <p>Todo List</p>
              <i class="bx bx-dots-vertical-rounded"></i>
            </li>
          </ul>
        </div>
      </div>
    </main>
  </section>
  <script>
    if (!sessionStorage.getItem('alertShown')) {
      swal("Login Successful", "You have successfully logged in to the Project Management System Dashboard. Welcome back!", "success", {
        button: "OK",
      });
      sessionStorage.setItem('alertShown', true);
    }
  </script>
  <script src="js/index.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>