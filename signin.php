<?php
session_start();
?>
<html>

<head>
  <link rel="stylesheet" href="pages.css">
  <link rel="shortcut icon" type="image/png" href="favicon.png" />
</head>
<header>
  <title>FirstImpressionsMovies</title>
</header>

<body>
  <div class="topbar">
    MFI
  </div>
  <div class="dropdown">
    <form action="index.php"><input type="submit" value="Home" /></form>
  </div>
  <form method="POST" class="sign-in" action="Handlers/signinhandler.php">
    <div><label for="usernameSI">User:</label><input type="text" name="usernameSI" /></div>
    <div><label for="passwordSI">Password:</label><input type="password" name="passwordSI" /></div>
    <br /><input type="submit" value="Sign-In" />
  </form>
  <form method="POST" class="sign-up" action="Handlers/signuphandler.php">
    <div><label for="first_name">First Name:</label><input value="<?php echo isset($_SESSION['form_input']['first_name']) ? $_SESSION['form_input']['first_name'] : ''; ?>" type="text" name="first_name" /></div>
    <div><label for="last_name">Last Name:</label><input value="<?php echo isset($_SESSION['form_input']['last_name']) ? $_SESSION['form_input']['last_name'] : ''; ?>" type="text" name="last_name" /></div>
    <div><label for="email">Email:</label><input value="<?php echo isset($_SESSION['form_input']['email']) ? $_SESSION['form_input']['email'] : ''; ?>" type="text" name="email" /></div>
    <div><label for="user_name">User:</label><input value="<?php echo isset($_SESSION['form_input']['user_name']) ? $_SESSION['form_input']['user_name'] : ''; ?>" type="text" name="user_name" /></div>
    <div><label for="password1">Password:</label><input type="password" name="password1" /></div>
    <div><label for="password2">Retype Password:</label><input type="password" name="password2" /></div>

    <br /><input type="submit" value="Sign-Up" />
  </form>
  <?php
  if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $message) {
      echo $message;
    }
  }
  unset($_SESSION['messages']);
  unset($_SESSION['form_input']);
  ?>
  <div class="footer">
    &copy; <a href="aboutfaq.php">About Us</a> | <a href="aboutfaq.php">FAQ</a>
</body>

</html>