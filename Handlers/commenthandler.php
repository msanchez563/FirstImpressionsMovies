<?php
require_once '../Dao.php';
session_start();
$dao = new Dao();

$username = $_SESSION['user'];
$movietitle = $_POST['movietitle'];
$descript = $_POST['descript'];
$messages = array();
$valid = true;
if (empty($user_name)) {
  $messages[] = "Username not found";
}
if (empty($movietitle)) {
  $messages[] = "Please enter the title to a movie";
  $valid = false;
}
if (empty($descript)) {
  $messages[] = "Please enter a review description for the movie";
  $valid = false;
}

if (!$valid) {
  $_SESSION['messages'] = $messages;
  $_SESSION['form_input'] = $_POST;
  header("Location: ../moviereview.php");
  exit();
}

$user_id = $dao->getUserId($username);
$dao->createComment($user_id['user_id'], $descript, $movietitle);

$_SESSION['message'] = "Movie Review Successfully Posted";
header("Location: ../index.php");
exit;
