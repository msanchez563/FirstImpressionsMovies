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
         $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
    }

 public function getConnection () {
   return
     new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
         $this->pass);
 }

 public function newUser ($name,$user_name,$password) {
   $conn = $this->getConnection();
   $saveQuery =
       "INSERT INTO Users
       (name,user_name,password)
       VALUES
       (:name,:user_name,:password)";
   $q = $conn->prepare($saveQuery);
   $q->bindParam(":name", $name);
   $q->bindParam(":user_name",$user_name);
   $q->bindParam(":password",$password);
   $q->execute();
 }

 public function getComments () {
   $conn = $this->getConnection();
   return $conn->query("SELECT * FROM comment");
 }
} // end Dao
?>
