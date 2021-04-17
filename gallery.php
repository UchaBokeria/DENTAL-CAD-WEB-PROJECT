<?php
  if(!isset($_SESSION))
    session_start();
  ob_start();
  include_once "AutoLoader.php";

  $controller = new Contrl();
  $login = $controller->login($_SESSION["username"],$_SESSION["password"]);
  if(!isset($_SESSION["username"]) || !isset($_SESSION["password"]))
  if($login == false)
    header("Location:login.php?error=Please login!");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gallery</title>
    <style>
      body{
        margin:2%;
      }
      a{
        letter-spacing: 1px;
        text-decoration: none;
        color:rgba(231,73,73,1);
        font-family: fantasy;
      }
      .removeAll{
        position: fixed;
        bottom:5vh;
        left:10vw;
      }
      .box{
        float:left;
        margin:2% 2%;
        width: 20%;
        height: 50vh;
        display:flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        border-radius: 10px;
        background: #eee;
        border: 1px solid rgba(83,83,83,1);
      }
      .box p{
        font-size:1.3vw;
      }
      .box b{
        font-size:1.4vw;
      }
      button{
        color:rgba(231,73,73,1);
        font-family: fantasy;
        letter-spacing: 3px;
        cursor:pointer;
        border:0;
        outline:0;
        background:#eee;
        border-radius: 4px;
      }
    </style>
  </head>
  <body>
    <form class="" action="gallery.php" method="post">
      <button type="submit" name="logout"><h3>Logout</h3></button>
      <h3><a href="user.php">Upload more</a></h3>
      <?php
        $view = new View();
        $result = $view->displayUploads();
        foreach ($result as  $value) {
          echo "<div class='box'>
                  <input type='checkbox' name='select'>
                  <p><b>Full Name: </b>" . $value["fullName"] . " </p>
                  <p><b>Patient Name: </b>" . $value["patientName"] . " </p>
                  <p><b>category: </b>" . $value["service"] . " </p>
                  <a href='/" . $value["fileDir"] . "' download >Download the File </a>

                </div>";
          // echo "<br> " . $value["fullName"] . " -> ". $value["patientName"] . " -> ". $value["fileDir"] . " -> " . $value["service"] . " -> ". $value["Byuser"];
        }
      ?>
      <!-- <button class="removeAll" type="submit" name="delSelected">Clear</button> -->
    </form>
  </body>
</html>

<?php
  if(isset($_POST["logout"])){
    session_destroy();
    header("Location:user.php");
  }
  ob_flush();
?>
