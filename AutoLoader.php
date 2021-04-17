<?php
  spl_autoload_register("classCatcher");

  function classCatcher($className) {
    $path = $className . ".php";


    if(!file_exists($path))
      echo " <br>Class #-> " .$className . " is incorrect!<br>";

    include $path;
  }
