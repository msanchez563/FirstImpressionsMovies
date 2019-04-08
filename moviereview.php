<?php
session_start();
$movie_title = $_GET['Search'];
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
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form id = 'sign' action = 'Handlers/logout.php'><input type ='submit' value ='Logout' /></form>";
    } else {
      echo "<form id = 'sign' action = 'signin.php'><input type = 'submit' value = 'Sign-In' /></form>";
    }
    ?>
  </div>
  <div class="dropdown">
    <form action="index.php"><input type="submit" value="Home" /></form>
  </div>
  <div class="results">
    <form method="POST" action="Handlers/commenthandler.php">
      <div><label for="movie">Movie Title:</label><br><input id="movie" type="text" name="movietitle" /></div><br>
      <div><label for="reviewtext">Review: </label><br><textarea id="reviewtext" maxlength="512" name="descript" value="Place Movie Review Here"></textarea></div>
      <input type="submit" value="Leave Review" />
    </form>
  </div>
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
  </div>
</body>

</html>