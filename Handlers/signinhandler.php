<?php
require_once '../Dao.php';
session_start();
$dao = new Dao();

$username = htmlspecialchars($_POST['usernameSI']);
$password = htmlspecialchars($_POST['passwordSI']);
$valid = true;
$messages = array();

if (empty($username)) {
  $messages[] = "Please enter a username to sign in.";
  $valid = false;
}
if (empty($password)) {
  $messages[] = "Please enter a password to sign in.";
  $valid = false;
}
$salt = "a1325a52cf";
$hashpass = hash("sha256",$password + $salt);
if ($dao->userExists($username, $hashpass) !== TRUE) {
  $messages[] = "Invalid password/username";
  $valid = false;
}
if (!$valid) {
  $_SESSION['messages'] = $messages;
  $_SESSION['form_input'] = $_POST;
  header("Location: ../signin.php");
  exit();
}

//echo "CONGRATS YOU CREATE A USER";
$_SESSION['status'] = 'logged';
$_SESSION['user'] = $username;
$_SESSION['message'] = 'Login Successful';
header("Location: ../index.php");
exit;
