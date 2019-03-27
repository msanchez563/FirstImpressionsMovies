<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

 private $host = "us-cdbr-iron-east-03.cleardb.net";
 private $db = "heroku_fac28c953799373";
 private $user = "b15f88c6829de6";
 private $pass = "b814df9b";

 public function getConnection () {
   return
     new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
         $this->pass);
 }

 public function saveComment ($comment) {
   $conn = $this->getConnection();
   $saveQuery =
       "INSERT INTO comment
       (comment)
       VALUES
       (:comment)";
   $q = $conn->prepare($saveQuery);
   $q->bindParam(":comment", $comment);
   $q->execute();
 }

 public function getComments () {
   $conn = $this->getConnection();
   return $conn->query("SELECT * FROM comment");
 }
} // end Dao
?>
mysql://b15f88c6829de6:b814df9b@us-cdbr-iron-east-03.cleardb.net/heroku_fac28c953799373?reconnect=true
