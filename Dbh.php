<?php
  class Dbh{
    //89.46.109.50:21

    // private $DBhost = "89.46.111.108";
    // private $DBuser = "sql1517345";
    // private $DBpwd = "Rolandmdx50!";
    // private $DBname = "sql1517345_2";
    // _____ gives me error phpSQLSTATE[HY000] [2002] _____

    private $DBhost = "localhost";
    private $DBuser = "udkedhjd_dev";
    private $DBpwd = 'as@$asfaskjpjAFaks2';
    private $DBname = "udkedhjd_maindb";


    // private $DBhost = "localhost";
    // private $DBuser = "root";
    // private $DBpwd = "";
    // private $DBname = "pizzilab";
    // ______ for localhost __________


    public function connect(){
      $conn = null;
      try {
        $conn = new PDO("mysql:host=".$this->DBhost.";dbname=".$this->DBname,$this->DBuser,$this->DBpwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo "<br> Connection error in Database.php" . $e->getMessage();
      }
      return $conn;
    }

  }
  // $object = new Dbh();
  // $object->connect();
