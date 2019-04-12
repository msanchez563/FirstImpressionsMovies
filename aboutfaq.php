<?php
session_start();
?>
<html>
    <head>
        <link rel ="stylesheet" href = "pages.css">
        <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    </head>
    <header>
        <title>FirstImpressionsMovies</title>
    </header>
    <body>
          <div class = "topbar">
            MFI
            <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] == 'logged'){
              echo "<form id = 'sign' action = 'Handlers/logout.php'><input type ='submit' value ='Logout' /></form>";
            }else{
              echo "<form id = 'sign' action = 'signin.php'><input type = 'submit' value = 'Sign-In' /></form>";
            }
            ?>
          </div>
          <div class = "dropdown">
            <form action = "index.php"><input type = "submit" value = "Home" /></form>
            <form class="reviews" action="recentreviews.php">
              Click To See Past Reviews:
              <input id="moviereviews" type="submit" value="See Reviews" />
            </form>
            <?php
              if (isset($_SESSION['status']) && $_SESSION['status'] == 'logged') {
                echo "<form class = 'leavereview' action = 'moviereview.php'>";
                echo "Click To Leave Movie Review: ";
                echo "<input id = 'review' type = 'submit' value = 'Leave Review' />";
                echo "</form>";
              }
            ?>
          </div>
        <div class = "aboutme">
          <h1>AboutUs</h1>
          <span id = "about">
            My name is Michael Sanchez and this is my website for CS401-Web Development.
            This website is rough but I tried hard on it so be nice. 
          </span>
        </div>
        <div class = "footer">
          &copy; <a href = "aboutfaq.php">About Us</a> | <a href = "aboutfaq.php">FAQ</a>
    </body>
</html>
