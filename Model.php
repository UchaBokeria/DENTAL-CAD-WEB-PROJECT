<?php
  class Model extends Dbh{
    protected function get($sql){
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    protected function set($sql,$params){
      $stmt = $this->connect()->prepare($sql);
      $length = count($params);

      for ($i=0,$bindInd=0; $i < $length; $i++) {
        $bindInd++;
        $stmt->bindParam($bindInd, $params[$i]);
      }
      $stmt->execute();
    }

    protected function check($sql,$param){
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindValue(1, $param);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }
  }
