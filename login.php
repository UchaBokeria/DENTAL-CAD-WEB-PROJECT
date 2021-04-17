<?php  session_start();   include_once "AutoLoader.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Dental Cad Web</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<body>
	<header id="home"class="section">
	<div class="header_main">
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"><a href="index.html"><img src="images/logo.png" style="max-width: 100%;"></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">

                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li><a href="#home">Home</a></li>
                                 <li><a href="#about">Chi Siamo</a></li>
                                 <li><a href="#service">Servizi</a></li>
                                 <li><a href="#gallery">Galleria</a></li>
                                 <li><a href="#contact">Contattaci</a></li>
																 <li><a href="login.php">Accedi</a></li>
																 <li><!-- <a href="register.php" target="_blank">Registrati</a> --></li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                 </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
				 <section >
	       	<div class="bannen_inner">
	             <div class="container">
	                 <div class="row marginii">
	                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
	                     	<div class="taital_main">

	                     	</div>

	                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
	                  <div class="img-box">
	                  </div>
	             </div>
	            </div>
				 <form class="box" action="login.php" method="post">
				 	<h1>Login</h1>
				 	<input type="text" name="username" placeholder="Username">
				 	<input type="password" name="password" placeholder="Password">
				 	<input type="submit" name="login" value="login">
					<p style='color:white'><?php if(isset($_GET["error"])) echo $_GET["error"]; ?></p>
				 </form>
</div>


</body>


</html>
<?php
	if(!isset($_POST["login"])){}
	else{
		$username = $_POST["username"];
		$password = $_POST["password"];

		$controller = new Contrl();
		$result = $controller->login($username,$password);
		if($result){
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;

			header("Location:user.php");

		}

		else
			header("Location:login.php?error=Username or Password is incorrect!");

	}



?>
