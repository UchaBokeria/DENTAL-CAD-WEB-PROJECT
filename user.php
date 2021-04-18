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
<html lang="en">
  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Apply for job by Colorlib</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
  </head>
  <body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">

                      <form class="Logout" action="user.php" method="post">
                        <a style="font-size:1.5vw;color:white;cursor:pointer;text-decoration:none;"
                                href="gallery.php">Gallery</a>
                        <br><br>
                        <button style="font-size:1.5vw;color:white;cursor:pointer;"
                                type="submit" name="logout">Logout</button>
                                <br><br>
                      <h2 class="title">Invia File
                      </form>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="user.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Nome e Cognome</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="fullName" placeholder="Nome e Cognome" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Paziente</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="name" name="patientName" placeholder="Nome del Paziente" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Servizio</div>
                            <div class="select">
                               <select name="service" id="format">
                                  <option selected disabled>Scegli Servizio</option>
                                  <option value="monolitica">Corona Monolitica</option>
                                  <option value="stratificata">Corona Stratificata</option>
                                  <option value="impianto">Corona Sul Impianto</option>
                                  <option value="provvisorio">Provvisorio</option>
                                  <option value="struttura">Prova Struttura</option>
                               </select>
                            </div>
                            <div style='color:rgba(236,58,58,1)'> <?php if(isset($_GET["error"])) echo $_GET["error"]; ?> </div>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Carica File</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="uploadFile[]" id="file" multiple="multiple" required>
                                    <label class="label--file" for="file">Scegli File</label>
                                    <span class="input-file__info">nessun file scelto.</span>
                                </div>
                                <div class="label--desc">carica file. Max file size 50 MB</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit" name="upload">Invia File</button>
                            <div style='color:green;font-family:bold;font-size:1.7vw;margin-top:5%;'>
                              <?php if(isset($_GET["message"])) echo $_GET["message"] ?>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php
  if(isset($_POST["logout"])){
    session_destroy();
    header("Location:user.php");
  }
  if(!isset($_POST["upload"])){}
  else{
    if(!isset($_POST["service"]))
      header("Location:user.php?error=Please select the service type");

    $Controller = new Contrl();
    $fullName = $_POST["fullName"];
    $patientName = $_POST["patientName"];
    $category = $_POST["service"];
    $user = "admin";

    $uploadError = 0;
    $fileSizeLimit = 1000000;

    $files = array_filter($_FILES['uploadFile']['name']); 
    $total_count = count($_FILES['uploadFile']['name']);
    $message = "";

    for($i = 0 ; $i < $total_count ; $i++ ) {
      $tmpFilePath = $_FILES['uploadFile']['tmp_name'][$i];
      $extension = strtolower(pathinfo($files[$i],PATHINFO_EXTENSION));

      $doneMsg = "The file ". htmlspecialchars(basename($files[$i]));
      if($extension != "stl" && $extension != "dcm" && $extension != "rar" && $extension != "zip") {
        $extensonError = " went wrong! ".$extension." is not allowed only STL,DCM,ZIP,RAR files.<br>";
        $uploadError = 1;
      }
      if ($tmpFilePath != "" && $uploadError != 1){
        //Setup our new file path
        $newFilePath = "./uploads/" . $_FILES['uploadFile']['name'][$i];
        //File is uploaded to temp dir
        if(!move_uploaded_file($tmpFilePath, $newFilePath)) {
          $message .= "<br>sorry unexpected error #5101:".$tmpFilePath. $newFilePath.":</br>";
        }
        else{
          // $object = array($fullName,$patientName,$newFilePath,$category,$user);
          // $result = $Controller->fileUpload($object);
          $message .= $result ? $doneMsg . " has been uploaded.<br>" : $doneMsg . " went wrong #5031 error. <br>" ;
        }
      }
      else{
        $message .= $doneMsg . " failed.<br>" . $extensonError;
      }
      $uploadError = 0;
    }
    header("Location:user.php?message=".$message);
  }
  ob_flush();

?>
