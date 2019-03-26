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
            <form id = "sign" action = "signin.php"><input type = "submit" value = "Sign-In" /></form>
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
          <form class = "input" action = "index.php">
            <div id = "signin">
              User:<br /><input type = "text" name="username" /><br />
              Password:<br /><input type = "text" name = "password" /><br />
              <br /><input type = "submit" value = "Sign-In"/>
            </div>
            <div id = "signup">
              Name(First Last):<br /><input type = "text" name = "Name" /><br />
              User:<br /><input type = "text" name="username" /><br />
              Password:<br /><input type = "text" name = "password1" /><br />
              Retype Password:<br /><input type = "text" name = "password2" /><br />

            <br /><input type = "submit" value = "Sign-Up" />
            </div>
          </form>
        <div class = "footer">
          &copy; <a href = "aboutfaq.php">About Us</a> | <a href = "aboutfaq.php">FAQ</a>
    </body>
</html>
