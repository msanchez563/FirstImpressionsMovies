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
            <form class = "search" action = "searchresult.php">
            Click To Leave Movie Review:
            <input id = "review" type = "submit" value = "Leave Review" /></form>
          </div>
        <div class = "aboutme">
          <h1>AboutMe</h1>
          <p>
            My name is Michael Sanchez and this is my about me/FAQ page. Theres
            not alot going on here but when I get it done you better believe
            that this is going to be good well thats pretty much all I have so
            have a good one.
          </p>
        </div>
        <div class = "footer">
          &copy; <a href = "aboutfaq.php">About Us</a> | <a href = "aboutfaq.php">FAQ</a>
    </body>
</html>
