<?php
session_start();
?>
<html>

<head>
  <link rel="stylesheet" href="pages.css">
  <link rel="shortcut icon" type="image/png" href="favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
  <script src="messages.js"></script>
</head>
<header>
  <title>FirstImpressionsMovies</title>
</header>

<body>
  <div class="topbar">
    <span id="logo">FIM</span>
    <?php
    if (isset($_SESSION['badmessage'])) {
      echo "<div id = 'badmessage'>" . $_SESSION['badmessage'] . "</div>";
    }
    unset($_SESSION['badmessage']);
    ?>
  </div>
  <div class="dropdown">
    <form class='home' action="index.php"><input type="submit" class="button" value="Home" /></form>
  </div>
  <form method="POST" class="sign-in" action="Handlers/signinhandler.php">
    <div><label for="usernameSI">User:</label><input type="text" id="usernameSI" name="usernameSI" /></div>
    <div><label for="passwordSI">Password:</label><input type="password" id="passwordSI" name="passwordSI" /></div>
    <br /><input type="submit" value="Sign-In" />
  </form>
  <form method="POST" class="sign-up" action="Handlers/signuphandler.php">
    <div><label for="first_name">First Name:</label><input value="<?php echo isset($_SESSION['form_input']['first_name']) ? $_SESSION['form_input']['first_name'] : ''; ?>" type="text" id="first_name" name="first_name" /></div>
    <div><label for="last_name">Last Name:</label><input value="<?php echo isset($_SESSION['form_input']['last_name']) ? $_SESSION['form_input']['last_name'] : ''; ?>" type="text" id="last_name" name="last_name" /></div>
    <div><label for="email">Email:</label><input value="<?php echo isset($_SESSION['form_input']['email']) ? $_SESSION['form_input']['email'] : ''; ?>" type="text" id="email" name="email" /></div>
    <div><label for="user_name">User:</label><input value="<?php echo isset($_SESSION['form_input']['user_name']) ? $_SESSION['form_input']['user_name'] : ''; ?>" type="text" id="user_name" name="user_name" /></div>
    <div><label for="password1">Password:</label><input type="password" id="password1" name="password1" /></div>
    <div><label for="password2">Retype Password:</label><input type="password" id="password2" name="password2" /></div>

    <br /><input type="submit" value="Sign-Up" />
  </form>
  <?php
  if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $message) {
      echo "<div class='errormessages'>{$message}</div>";
    }
  }
  unset($_SESSION['messages']);
  unset($_SESSION['form_input']);
  ?>
  <div class="footer">
    &copy; <a href="aboutfaq.php">About Us</a>
</body>

</html>