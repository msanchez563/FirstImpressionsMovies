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
            <form id = "search" action = "searchresult.php"><select name = "Genre">
                <option>Horror</option>
                <option>Comedy</option>
                <option>Romance</option>
                <option>Thriller</option>
                <option>Foreign</option>
            </select>
            <select name = "Year">
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
                <option>2016</option>
                <option>2015</option>
            </select>
            <input type = "text" name = "Search" />
            <input type = "submit" value = "Search" /></form>
          </div>
        <div class = "movieimage"><img src="moviescreen.png"/></div>
        <div class = "footer">
          &copy; <a href = "aboutfaq.php">About Us</a> | <a href = "aboutfaq.php">FAQ</a>
    </body>
</html>
