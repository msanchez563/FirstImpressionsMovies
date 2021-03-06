<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
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
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form id = 'sign' action = 'Handlers/logout.php'><input type ='submit' class = 'button' value ='Logout' /></form>";
    } else {
      echo "<form id = 'sign' action = 'signin.php'><input type = 'submit' class = 'button' value = 'Sign-In' /></form>";
    }
    ?>
  </div>
  <div class="dropdown">
  <form class="home" action="index.php"><input type="submit" class = "button" value="Home" /></form>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form class = 'leavereview' action = 'moviereview.php'>";
      echo "Click To Post Your Own Movie Review:";
      echo "<input class ='button' type = 'submit' value = 'Leave Review' />";
      echo "</form>";
    }
    ?>
  </div>
  <div class="last10reviews">
    <h1>Last 10 Reviews</h1>
    <table>
        <tr>
          <th>Reviewer UserName</th>
          <th>Movie Title</th>
          <th>ReviewDescription</th>
        </tr>
        <?php
        $comments = $dao->getLast10Comments();
        foreach ($comments as $comment) {
          ?>
          <tr>
            <td><?php $username = $dao->getUserById($comment['creator_user_id']);
             echo htmlentities($username['user_name']); ?>
            </td>
            <td><?php echo htmlentities($comment['movie_title']); ?></td>
            <td><?php echo htmlentities($comment['descript']); ?></td>
          </tr>
        <?php } ?>
    </table>
  </div>
  <div class="footer">
    &copy; <a href="aboutfaq.php">About Us</a>
</body>

</html>