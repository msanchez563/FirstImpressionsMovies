<?php
session_start();
require_once '../Dao.php';
$dao = new Dao();
$email = test_input($_POST["email"]);
$first_name= htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$username = htmlspecialchars($_POST['user_name']);
$password1 = htmlspecialchars($_POST['password1']);
$password2 = htmlspecialchars($_POST['password2']);
$valid = true;
$messages = array();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function valid_email($str) {
	return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
if(empty($first_name)){
  $messages[] = "Please enter a first name.";
  $valid = false;
}
if(empty($last_name)){
  $messages[] = "Please enter a last name.";
  $valid = false;
}
if (empty($username)) {
  $messages[] = "Please enter a username to sign up.";
  $valid = false;
}
if (empty($email)) {
  $messages[] = "Please enter an email to sign up.";
  $valid = false;
}
if (empty($password1)) {
  $messages[] = "Please enter a password to sign up.";
  $valid = false;
}
if(empty($password2)){
  $messages[] = "Please re-enter password.";
  $valid = false;
}
if (!empty($email)) {
  $email = test_input($_POST["email"]);
  if(!valid_email($email)){
    $messages[] = "Invalid email format";
    $valid = false;
  }
}
if ($password1 != $password2) {
  $messages[] = "Passwords dont match";
  $valid = false;
}
if (!$valid) {
    $_SESSION['messages'] = $messages;
    $_SESSION['form_input'] = $_POST;
    header("Location: ../signin.php");
    exit();
}
//echo "CONGRATS YOU CREATE A USER";
// insert stuff into a user table in the database..
$salt = "a1325a52cf";
$hashpass = hash("sha256",$password1 + $salt);
$dao->createUser($email,$first_name,$last_name,$username,$hashpass);
$_SESSION['status'] = 'logged';
$_SESSION['user'] = $username;
$_SESSION['message'] = 'Successfully Created User';
header("Location: ../index.php");
exit;
