<?php
session_start();
$email = $_POST['email'];
$name= $_POST['name'];
$username = $_POST['user_name'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$valid = true;
$messages = array();
if (empty($username)) {
  $messages[] = "Please enter a username.";
  $valid = false;
}
if (empty($email)) {
  $messages[] = "Please enter an email.";
  $valid = false;
}

$email = test_input($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $messages[] = "Invalid email format";
  }
if ($password1 != $password2) {
  $messages[] = "Passwords dont match";
  $valid = false;
}
if (!$valid) {
    $_SESSION['messages'] = $messages;
    $_SESSION['form_input'] = $_POST;
    header("Location: signin.php");
    exit();
}
//echo "CONGRATS YOU CREATE A USER";
require_once 'Dao.php';
$dao = new Dao();
// insert stuff into a user table in the database..
$dao->createUser($email,$name,$username,$password1);
$_SESSION['status'] = 'logged';
header("Location: index.php");
exit;
?>
