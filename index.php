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
    if (isset($_SESSION['message'])) {
      echo "<div id = 'message'>" . $_SESSION['message'] . "</div>";
    }
    ?>
    <?php
    $id = 'sign';
    if(isset($_SESSION['message'])){
      $id = 'signmessage';
    }
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form id = '".$id."' action = 'Handlers/logout.php'><input type ='submit' class = 'button' value ='Logout' /></form>";
    } else {
      echo "<form id = '".$id."' action = 'signin.php'><input type = 'submit' class = 'button' value = 'Sign-In' /></form>";
    }
    ?>
  </div>
  <div class="dropdown">
    <form class="home" action="index.php"><input type="submit" class = "button" value="Home" /></form>
    <form class="reviews" action="recentreviews.php">
      Click To See Past Reviews:
      <input class = "button" type="submit" value="See Reviews" />
    </form>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form class = 'leavereviewindex' action = 'moviereview.php'>";
      echo "Click To Post Your Own Movie Review:";
      echo "<input class ='button' type = 'submit' value = 'Leave Review' />";
      echo "</form>";
    }
    ?>
  </div>
  <div class="movieimage"><img src="moviescreen.png" /></div>
  <div class="footer">
    &copy; <a href="aboutfaq.php">About Us</a> | <a href="aboutfaq.php">FAQ</a>
</body>

</html>