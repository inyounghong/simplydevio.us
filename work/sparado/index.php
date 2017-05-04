<html>
<head>
	<title>Sparado</title>
	<meta name="viewport" content="initial-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- JS -->
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/happyfoxchat.js"></script>
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		
			<div class="navbar-header">
			  <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button> -->
			  <a class="navbar-image" href="#"><img src="img/logo2.png" width="120"></a>
			</div>

			<!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
			    <li><a href="#">Link</a></li>
			  </ul>
			</div> -->
		</div>
	</nav>

	<!-- Main Container -->
	<div class="container narrow">
		<div class="row">
			<div class="col-sm-5" id="phone">
				<img src="img/phone.jpg">
			</div>

			<div class="col-sm-7 copy">
				<h1>Welcome to Sparado!</h1>

				<p>Sparado is a brand new mobile savings app that rewards you for good financial behavior. With Sparado, the more money you save, the more debt you pay off and more you learn about personal finance, the more chances you have to win cash prizes. It's that simple!</p>

				<p>Sign up today to get the latest updates on Sparado, and become one of the first people to try out the new app and win.</p>

				<form action="" method="post" id="email-form">
					<input type="email" name="email" class="email" placeholder="Enter Email Address" required>
				    <input type="submit" value="Send" name="submit" class="button"></div>
				</form>

				<span class="msg"><?php include "php/mail_handler.php" ?></span>

			</div>
		</div>
	</div>

	<footer id="footer">
		&copy; Copyright Sparado Inc. All rights reserved Sparado Inc.
	</footer>

	

</body>
</html>