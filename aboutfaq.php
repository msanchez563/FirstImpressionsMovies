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
    <span id="logo">FIM</span>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form id = 'sign' action = 'Handlers/logout.php'><input type ='button' class = 'button' value ='Logout' /></form>";
    } else {
      echo "<form id = 'sign' action = 'signin.php'><input type = 'submit' class = 'button' value = 'Sign-In' /></form>";
    }
    ?>
  </div>
  <div class="dropdown">
    <form class="home" action="index.php"><input type="submit" class="button" value="Home" /></form>
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
  <div class="aboutme">
    <h1>AboutUs</h1>
    <span id="about">
      My name is Michael Sanchez and this is my website for CS401-Web Development.
      This website is rough but I tried hard on it so be nice. I wanted to have a website
      where people can put their knee jerk thoughts on a movie that they had watched for 
      the very first time. 
    </span>
  </div>
  <div class="footer">
    &copy; <a href="aboutfaq.php">About Us</a>
</body>

</html>