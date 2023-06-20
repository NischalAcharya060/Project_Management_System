<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project List |Project Management System </title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="https://acharyanischal.com.np" target="_blank" class="brand">
      <i class="bx bx-task"></i>
      <span class="logo" style="text-decoration: none;">Project Management System</span>
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
          <h1>Project</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">project</a>
            </li>
            <li><i class="bx bx-chevron-right"></i></li>
            <li>
              <a class="active" href="project.php">project list</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- project -->
      <div class="container">
        <form method="post" action="create.php">
          <div class="form-group">
            <label for="project_name">Project Name:</label>
            <input type="text" class="form-control" id="project_name" name="project_name">
          </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>

          <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
          </div>

          <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="text-center mt-4">
        <a href="project_view.php" class="btn btn-primary">View Projects</a>
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>