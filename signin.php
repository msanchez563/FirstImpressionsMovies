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
              echo "<form id = 'sign' action = 'logout.php'><input type ='submit' value ='Logout' /></form>";
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
          <form method = "POST" class = "sign-in" action = "signinhandler.php">
              User:<br /><input type = "text" name="usernameSI" /><br />
              Password:<br /><input type = "password" name = "passwordSI" /><br />
              <br /><input type = "submit" value = "Sign-In"/>
          </form>
          <form method = "POST" class = "sign-up" action = "signuphandler.php">
              <div><label for="name">Name(First Last):</label><input value="<?php echo isset($_SESSION['form_input']['name']) ? $_SESSION['form_input']['name'] : ''; ?>" type = "text" name = "name" /></div>
              <div><label for="email">Email:</label><input value="<?php echo isset($_SESSION['form_input']['email']) ? $_SESSION['form_input']['email'] : ''; ?>" type = "text" name = "email" /></div>
              <div><label for="user_name">User:</label><input value="<?php echo isset($_SESSION['form_input']['username']) ? $_SESSION['form_input']['username'] : ''; ?>" type = "text" name="user_name" /></div>
              <div><label for="password1">Password:</label><input type = "password" name = "password1" /></div>
              <div><label for="password2">Retype Password:</label><input type = "password" name = "password2" /></div>

            <br /><input type = "submit" value = "Sign-Up" />
          </form>
          <?php
            if (isset($_SESSION['messages'])) {
              foreach($_SESSION['messages'] as $message) {
                echo "<div class='message bad'>{$message}</div>";
              }
            }
            unset($_SESSION['message']);
            unset($_SESSION['form_input']);
          ?>
        <div class = "footer">
          &copy; <a href = "aboutfaq.php">About Us</a> | <a href = "aboutfaq.php">FAQ</a>
    </body>
</html>
