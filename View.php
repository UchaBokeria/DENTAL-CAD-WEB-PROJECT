<?php
  class View extends Model{
    public function displayUploads(){
      $sql = "SELECT * FROM files;";
      return $this->get($sql);

    }
  }
