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
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form id = 'sign' action = 'Handlers/logout.php'><input type ='button' class = 'button' value ='Logout' /></form>";
    } else {
      echo "<form id = 'sign' action = 'signin.php'><input type = 'submit' class = 'button' value = 'Sign-In' /></form>";
    }
    ?>
  </div>
  <div class="dropdown">
    <form action="index.php"><input type="submit" class = "button" value="Home" /></form>
    <form class="reviews" action="recentreviews.php">
      Click To See Past Reviews:
      <input id="moviereviews" class = "button" type="submit" value="See Reviews" />
    </form>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form class = 'leavereview' action = 'moviereview.php'>";
      echo "Click To Leave Movie Review: ";
      echo "<input id = 'review' class = 'button' type = 'submit' value = 'Leave Review' />";
      echo "</form>";
    }
    ?>
  </div>
  <div class="movieimage"><img src="moviescreen.png" /></div>
  <div class="footer">
    &copy; <a href="aboutfaq.php">About Us</a> | <a href="aboutfaq.php">FAQ</a>
</body>

</html>