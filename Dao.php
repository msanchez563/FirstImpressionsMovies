<?php
require_once 'KLogger.php';
// Dao.php
class Dao {

 private $host = "us-cdbr-iron-east-03.cleardb.net";
 private $db = "heroku_fac28c953799373";
 private $user = "b15f88c6829de6";
 private $pass = "b814df9b";

 protected $logger;
 private $message;

 public function __construct() {
         $this->logger = new KLogger( "log.txt" , KLogger::DEBUG );
    }

 public function getConnection () {
   return
     new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
         $this->pass);
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

 public function createUser ($email,$name,$user_name,$password) {
   $emailexists = $this->emailExists($email);
   $usernameexists = $this->usernameExists($user_name);
   if(!$exists && !$usernameexists){
     $conn = $this->getConnection();
     $query ="INSERT INTO Users(email, name, user_name, password) VALUES (:email, :name, :user_name, :password);";
     $q = $conn->prepare($query);
     $q->bindParam(":email",$email);
     $q->bindParam(":name", $name);
     $q->bindParam(":user_name",$user_name);
     $q->bindParam(":password",$password);
     $q->execute();

     if ($status) {
       $this->logger->LogDebug(__FUNCTION__ . ": Get user successful");
       return $this->SUCCESS;
    }
   }
   return $this->FAILURE;
 }

 public function getMessage(){
   return $this->message;
 }

 public function getComments () {
   $conn = $this->getConnection();
   return $conn->query("SELECT * FROM Comments");
 }
} // end Dao
?>
