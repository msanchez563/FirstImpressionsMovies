<?php
session_start();
?>
<html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
  <link rel="stylesheet" href="pages.css">
  <link rel="shortcut icon" type="image/png" href="favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
  <script src = "messages.js"></script>
</head>
<header>
  <title>FirstImpressionsMovies</title>
</header>

<body>
  <div class="topbar">
    <span id="logo">FIM</span>
    <?php
    if (isset($_SESSION['message'])) {
      echo "<span id = 'message'>" . $_SESSION['message'] . "</span>";
    }
    unset($_SESSION['message']);
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
    &copy; <a href="aboutfaq.php">About Us</a>
</body>

</html>