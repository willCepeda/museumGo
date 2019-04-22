<!DOCTYPE HTML>
<?php
	session_start();
	
	if(!empty($_SESSION['user'] ) && !empty($_SESSION['pass'] )){
	
		session_destroy();
	
	}

?>
<html>
	<head>
		<title>Museum GO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="index.html">Museum</a> GO &nbsp; &nbsp; <b style="color:#FFFFFF; text_align:center">-Usuario Desconectador Correctamente-</b></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Access</a>
								<ul>
									<li><a href="log_in.php">Log In</a></li>
									<li><a href="#">About Us</a></li>
								</ul>
							</li>
							<li><a href="sign_up.html" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2> Museum <b style="color:#FFFFFF">GO</b></h2>
					<p>Descubre un nuevo mundo através del arte contemporaneo, pinturas, obras de pintores y mucho más.</p>
					<ul class="actions special">
						<li><a href="sign_up.html" class="button primary">Sign Up</a></li>
						<li><a href="log_in.php" class="button">Log in</a></li>
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
							<h2>Introduciendonos al mundo del Arte
							<br />
							cientos de pintores dejan reflejada su huella en cada pincelada</h2>
							<p>Aprenderas cada pintura sus origenes y sus más de cien años de antiguedad<br />
							porque son tan visitadas y por su puesto admiradas por turistas de todo el mundo.</p>
						</header>
						<span class="image featured"><img src="images/pic011.jpg" alt="" /></span>
					</section>

					<section class="box special features">
						<div class="features-row">
							<section>
								<span class="icon major fa-bolt accent2"></span>
								<h3>Visita Museos</h3>
									</section>
							<section>
								<span class="icon major fa-area-chart accent3"></span>
								<h3>Conoce Obras de Arte</h3>
								</section>
						</div>
						<div class="features-row">
							<section>
								<span class="icon major fa-cloud accent4"></span>
								<h3>No hay limites</h3>
								</section>
							<section>
								<span class="icon major fa-lock accent5"></span>
								<h3>Tu Guía</h3>
								</section>
						</div>
					</section>

					<div class="row">
						<div class="col-6 col-12-narrower">

							<section class="box special">
								<span class="image featured"><img src="images/pic021.jpg" alt="" /></span>
								<h3>Museos a visitar</h3>
								
							</section>

						</div>
						<div class="col-6 col-12-narrower">

							<section class="box special">
								<span class="image featured"><img src="images/pic031.jpg" alt="" /></span>
								<h3>Pinturas destacadas</h3>
								
							</section>

						</div>
					</div>

				</section>

			<!-- CTA -->
				<section id="cta">

					<blockquote><h4>“El objetivo del arte es representar no la apariencia externa de las cosas, sino su significado interior.”</h4>
					<p>-Aristóteles.</p>
					</blockquote>
					<form>
					<h2 style="color:#FFFFFF"> Museum <b style="color:#FFFFFF">GO</b></h2>
					
					</form>

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>