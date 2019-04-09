<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
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
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
      echo "<form class = 'leavereview' action = 'moviereview.php'>";
      echo "Click To Leave Movie Review:";
      echo "<input id = 'review' type = 'submit' value = 'Leave Review' />";
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
            <td>
            <td><?php echo htmlentities($comment['movie_title']); ?>
            <td>
            <td><?php echo htmlentities($comment['descript']); ?>
            <td>
          </tr>
        <?php } ?>
    </table>
  </div>
  <div class="footer">
    &copy; <a href="aboutfaq.php">About Us</a> | <a href="aboutfaq.php">FAQ</a>
</body>

</html>