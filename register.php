<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Project-Management-System</title>
  <link rel="stylesheet" href="css/register.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

</head>

<body>
  <div class="header">
    <h2>Register</h2>
  </div>

  <form method="post" action="#">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username:</label>
      <input type="text" name="username" placeholder="enter your username" value="<?php echo $username; ?>" required>
    </div>
    <div class="input-group">
      <label>Email:</label>
      <input type="email" name="email" placeholder="enter your email" value="<?php echo $email; ?>" required>
    </div>
    <div class="input-group">
      <label>Password:</label>
      <input type="password" name="password_1" placeholder="enter your password" id="password1" required>
      <i class="bi bi-eye-slash" id="togglePassword1"></i>
    </div>
    <div class="input-group">
      <label>Confirm password:</label>
      <input type="password" name="password_2" placeholder="re-enter your password" id="password2" required>
      <i class="bi bi-eye-slash" id="togglePassword2"></i>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
  <!-- <script>
    const togglePassword = (toggleId, passwordId) => {
  const togglePassword = document.querySelector(toggleId);
  const password = document.querySelector(passwordId);

  togglePassword.addEventListener("click", function() {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    this.classList.toggle("bi-eye");
  });
};

togglePassword('#togglePassword1', '#password1');
togglePassword('#togglePassword2', '#password2');

const form = document.querySelector("form");
form.addEventListener('submit', function(e) {
  e.preventDefault();
});
  </script> -->

</body>

</html>