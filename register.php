<?php
	include_once "AutoLoader.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Dental Cad Web - Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>

	<!-- main -->
	 <!-- header inner -->
	 <header id="home"class="section">
 	<div class="header_main">
          <!-- header inner -->

                   <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                      <div class="menu-area">

                            <nav class="main-menu">
                               <ul class="menu-area-main">
                                  <li><a href="index.html">Home</a></li>
                                  <li><a href="index.html">Chi Siamo</a></li>
                                  <li><a href="index.html">Servizi</a></li>
                                  <li><a href="index.html">Galleria</a></li>
                                  <li><a href="index.html">Contattaci</a></li>
 																 <li><a href="login.php">Accedi</a></li>
                               </ul>
                            </nav>
                         </div>
                      </div>
                  </div>
                </div>
             </div>
          </div>

	<div class="main-w3layouts wrapper">
		<h1>Registrati</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="register.php" method="post">
					<input class="text" type="text" name="username" placeholder="Username" required>
					<input class="text email" type="email" name="mail" placeholder="Email" required>
					<input class="text" type="password" name="password" placeholder="Password" required>
					<input class="text w3lpass" type="password" name="re_password" placeholder="Conferma Password" required>
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>Accetto i termini e le condizioni</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="REGISTRATI" name="sign_up">
				</form>
				<p>Hai Gia un Account? <a href="login.php"> Accedi adesso!</a></p>
			</div>
		</div>

		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>
<?php
	if(!isset($_POST["sign_up"])){}
	elseif ($_POST["password"] != $_POST["re_password"])
		echo "<div class='Pop-up'>Repeat password correctly</div>";

	else{
		$email = $_POST["mail"];
		$username = $_POST["username"];
		$password = $_POST["password"];


		$controller = new Contrl();
		$controller->signup($email,$username,$password);

	}











?>
