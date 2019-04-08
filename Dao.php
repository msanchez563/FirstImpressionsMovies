<?php
require_once 'KLogger.php';
// Dao.php
class Dao {

private $host = "us-cdbr-iron-east-03.cleardb.net";
private $db = "heroku_fac28c953799373";
private $user = "b15f88c6829de6";
private $pass = "b814df9b";

protected $logger;

public function __construct() {
         $this->logger = new KLogger( "Handlers/log.txt" , KLogger::DEBUG );
}

public function getConnection () {
   return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
}

public function userExists($user_name,$password){
  try {
      $conn = $this->getConnection();
      $query = $conn->prepare("SELECT COUNT(*) FROM Users WHERE user_name = :user_name AND password = :password;");
      $query->bindParam(':user_name', $user_name);
      $query->bindParam(':password', $password);
      $query->execute();
      $results = $query->fetch(PDO::FETCH_ASSOC);
      $result = $results["COUNT(*)"];
      if ($result) {
          $this->logger->LogDebug(__FUNCTION__ . "(): User was found.");
          return TRUE;
      } else {
          $this->logger->LogDebug(__FUNCTION__ . "(): User unable to be found.");
          return FALSE;
      }
  } catch (Exception $e) {
      $this->logger->LogError(__FUNCTION__ . "(): Unable to check if user exists");
      $this->logger->LogError(__FUNCTION__ . "(): " . $e->getMessage());
      return NULL;
  }
}

public function emailExists($email){
     $conn = $this->getConnection();
     $q= $conn->prepare("SELECT COUNT(*) FROM Users WHERE email = :email;");
     $q->bindParam(':email', $email);
     $q->execute();
     $results = $q->fetch(PDO::FETCH_ASSOC);
     $result = $results["count(*)"];
     if ($result) {
         $this->logger->LogDebug(__FUNCTION__ . ": User was found.");
         return TRUE;
     } else {
         $this->logger->LogDebug(__FUNCTION__ . ": User unable to be found.");
         return FALSE;
     }
}

public function usernameExists($user_name){
     $conn = $this->getConnection();
     $query = "SELECT COUNT(*) FROM Users WHERE user_name = :user_name;";
     $q = $conn->prepare($query);
     $q->bindParam(':user_name', $user_name);
     $q->execute();
     $results = $q->fetch(PDO::FETCH_ASSOC);
     $result = $results["count(*)"];
     if ($result) {
         $this->logger->LogDebug(__FUNCTION__ . ": User was found.");
         return TRUE;
     } else {
         $this->logger->LogDebug(__FUNCTION__ . ": User unable to be found.");
         return FALSE;
     }
}

public function getUserId($user_name) {
  try {
      $conn = $this->getConnection();
      $query = $conn->prepare("SELECT user_id FROM Users WHERE user_name = :user_name;");
      $query->bindParam(":user_name", $user_name);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute();
      $userId = $query->fetch();
      $this->logger->LogDebug(basename(__FILE__) . ":" . __FUNCTION__ . ": Get user by user_name successful");
      return $userId;
  } catch (Exception $e) {
      $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): Unable to get user by username");
      $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): " . $e->getMessage());
      return NULL;
  }
}

public function getUserById($user_id) {
  try {
      $conn = $this->getConnection();
      $query = $conn->prepare("SELECT user_name FROM Users WHERE user_id = :user_id;");
      $query->bindParam(":user_id", $user_id);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute();
      $userName = $query->fetch();
      $this->logger->LogDebug(basename(__FILE__) . ":" . __FUNCTION__ . ": Get user_name by user_id successful");
      return $userName;
  } catch (Exception $e) {
      $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): Unable to get user by user_id");
      $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): " . $e->getMessage());
      return NULL;
  }
}

public function createUser ($email,$first_name,$last_name,$user_name,$password) {
   try{
    $emailexists = $this->emailExists($email);
    $usernameexists = $this->usernameExists($user_name);
    if(!$exists && !$usernameexists){
       $conn = $this->getConnection();
       $q = $conn->prepare("INSERT INTO Users (email, first_name,last_name, user_name, password) VALUES (:email, :first_name, :last_name, :user_name, :password);");
       $q->bindParam(":email",$email);
       $q->bindParam(":first_name", $first_name);
       $q->bindParam(":last_name", $last_name);
       $q->bindParam(":user_name",$user_name);
       $q->bindParam(":password",$password);
       $status = $q->execute() ? "SUCCESSFUL" : "FAILURE";
       $this->logger->LogDebug(basename(__FILE__) . ":" . __FUNCTION__ . "(): Create user " . $status);
       return $this->SUCCESS;
    } else {
      $this->logger->LogWarn(basename(__FILE__) . ":" . __FUNCTION__ . "(): User exists already");
      return $this->FAILURE;
    }
   } catch (Exception $e){
      $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): Unable to create user");
      $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): " . $e->getMessage());
      return $this->FAILURE;
   }
 }

public function getLast10Comments () {
  try{
    $conn = $this->getConnection();
    $query = $conn->prepare("SELECT * FROM Comments ORDER BY create_date desc LIMIT 10;");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $tencomments = $query->fetchAll();
    $this->logger->LogDebug(basename(__FILE__) . ":" . __FUNCTION__ . ": Last 10 Comments Retrieved Successfully.");
    return $tencomments;
  }catch (Exception $e){
    $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): Unable to get Last 10 Comments.");
    $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): " . $e->getMessage());
    return NULL;
  }
}

public function createComment($creator_user_id,$descript,$movie_title){
  try{
    $conn = $this->getConnection();
    $q = $conn->prepare("INSERT INTO Comments (creator_user_id,descript,movie_title) VALUES (:creator_user_id,:descript,:movie_title);");
    $q->bindParam(":creator_user_id",$creator_user_id);
    $q->bindParam(":descript",$descript);
    $q->bindParam(":movie_title",$movie_title);
    $q->execute();
    $this->logger->LogDebug(basename(__FILE__) . ":" . __FUNCTION__ . "(): Created comment successfully");
    return $this->SUCCESS;
  }catch(Exception $e){
    $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): Unable to create comment");
    $this->logger->LogError(basename(__FILE__) . ":" . __FUNCTION__ . "(): " . $e->getMessage());
    return $this->FAILURE;
  }
  return $this->FAILURE;
 }
} // end Dao
