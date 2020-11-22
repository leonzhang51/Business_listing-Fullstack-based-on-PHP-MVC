<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/style.css">
    <title><?php echo $titre ?></title>
    <!-- Bootstrap -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome Icons -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- PE Icon 7 Stoke -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/fonts/pe-icon-7-stroke/css/helper.css" rel="stylesheet">
		<!-- PE Icon Social -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/fonts/pe-icon-social/css/pe-icon-social.css" rel="stylesheet">
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/fonts/pe-icon-social/css/helper.css" rel="stylesheet">
		<!-- Quicksand Dash -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/fonts/quicksand-dash/stylesheet.css" rel="stylesheet">
		<!-- Owl Carousel -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/owl.theme.default.css" rel="stylesheet">
		<!-- Sweet Alert -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/sweetalert.css" rel="stylesheet">
		<!-- Animate -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/animate.min.css" rel="stylesheet">
		<!-- Nivo Lightbox -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/scripts/Nivo-Lightbox/nivo-lightbox.css" rel="stylesheet">
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/scripts/Nivo-Lightbox/themes/default/default.css" rel="stylesheet">
		<!-- NoUISlider -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/jquery.nouislider.min.css" rel="stylesheet">
		<!-- Style.css -->
		<link href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/css/style.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div id="global">
    <header class="header fixed clearfix">
			<div class="left">
				<div class="logo"><a href="accueil"><img src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/images/testlogo.png" alt="sireta Logo" class="img-responsive" ></a></div> <!-- end .logo -->
				
			</div> <!-- end .left -->
			<div class="navigation clearfix">
				<nav class="main-nav">
					<ul class="list-unstyled">
						<li class="menu-item-has-children">
							<a href="accueil">Home</a>
							
						</li>
						
						
						<li class="menu-item-has-children">
							<a href="shop">Shop</a>
							<ul>
								<li><a href="shop">Shop</a></li>
								
								<li><a href="shoplist">Shop Cart</a></li>
							</ul>
						</li>
					</ul>
				</nav> <!-- end .main-nav -->
				<a href="" class="responsive-menu-open"><i class="fa fa-bars"></i></a>
			</div> <!-- end .navigation -->
			<div class="right">
				<a href="user" class="button border" style="color:black">Add Listing</a>
				<a href="" class="button login-open">Log In</a>
			</div> <!-- end .left -->
		</header> <!-- end .header -->
		<div class="responsive-menu">
			<a href="" class="responsive-menu-close"><i class="fa fa-times"></i></a>
			<nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
		</div> <!-- end .responsive-menu -->



<div class="login-wrapper">
			<div class="login">
				<form>
					<div class="form-group">
						<input type="text" placeholder="Username or Email Address *">
					</div> <!-- end .form-group -->
					<div class="form-group">
						<input type="text" placeholder="Password *">
					</div> <!-- end .form-group -->
					<div class="clearfix">
						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
						<a href="" class="lost-password">Lost your password ?</a>
					</div> <!-- end .clearfix -->
					<div class="button-wrapper"><button type="submit" class="button">Login</button></div>
					<div class="text-center">
						<p>Don't have an account ? <a href="" class="signup-open">Sign up</a></p>
						<div class="social">
							<p>Connect with Social Networks</p>
							<a href=""><img src="images/facebook.png" alt="facebook"></a>
							<a href=""><img src="images/twitter.png" alt="twitter"></a>
							<a href=""><img src="images/google-plus.png" alt="google plus"></a>
						</div> <!-- end .social -->
					</div>
				</form>
			</div> <!-- end .login -->
		</div> <!-- end .login-wrapper -->

		<div class="signup-wrapper">
			<div class="signup">
				<form>
					<div class="form-group">
						<input type="text" placeholder="Username">
					</div> <!-- end .form-group -->
					<div class="form-group">
						<input type="email" placeholder="Email Address">
					</div> <!-- end .form-group -->
					<div class="text-center">
						<p>A password will be e-mailed to you.</p>
					</div> <!-- end .text-center -->
					<div class="button-wrapper"><button type="submit" class="button">Register</button></div>
					<div class="text-center">
						<p>Already have an account? <a href="" class="login-open">Log in</a></p>
						<div class="social">
							<p>Connect with Social Networks</p>
							<a href=""><img src="images/facebook.png" alt="facebook"></a>
							<a href=""><img src="images/twitter.png" alt="twitter"></a>
							<a href=""><img src="images/google-plus.png" alt="google plus"></a>
						</div> <!-- end .social -->
					</div>
				</form>
			</div> <!-- end .signup -->
		</div> <!-- end .signup-wrapper -->
        <div id="contenu">
            <?php echo $contenu ?> <!-- contenu d'une vue spécifique -->
        </div>
        <footer class="footer">
			<div class="top">
				<div class="left">
					<div class="logo"><a href="index.html"><img src="images/testlogoblue.png" alt="Sireta" class="img-responsive"></a></div> <!-- end .logo -->
				</div> <!-- end .left -->
				<div class="social-icons">
					<a href=""><i class="pe-so-facebook"></i></a>
					<a href=""><i class="pe-so-twitter"></i></a>
					<a href=""><i class="pe-so-vimeo"></i></a>
					<a href=""><i class="pe-so-tripadvisor"></i></a>
					<a href=""><i class="pe-so-instagram"></i></a>
					<a href=""><i class="pe-so-google-plus"></i></a>
				</div>
				<div class="right">Made by: <a target="_blank" href="http://www.sireta.ca">Sireta IT Studio +1 (514)622-7609</a></div> <!-- end .left -->
			</div> <!-- end .top -->
			<div class="bottom">Copyright &copy; 2019.Sireta All rights reserved.</div>
		</footer> <!-- end .footer -->


        <!-- jQuery -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/jquery-3.1.0.min.js"></script>
		<!-- Bootstrap -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/bootstrap.min.js"></script>
		<!---<script src="http://ditu.google.cn/maps/api/js?key=AIzaSyAy-PboZ3O_A25CcJ9eoiSrKokTnWyAmt8"></script>--->
		<!-- rich marker -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/richmarker.js"></script>
		<!-- Owl Carousel -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/owl.carousel.min.js"></script>
		<!-- Countdown -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/countdown.js"></script>
		<!-- Sweet Alert -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/sweetalert.min.js"></script>
		<!-- Nivo Lightbox -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/scripts/Nivo-Lightbox/nivo-lightbox.min.js"></script>
		<!-- NoUISlider -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/jquery.nouislider.all.min.js"></script>
		<!-- Scripts.js -->
		<script src="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/js/scripts.js"></script>

    </div>
</body>
</html>