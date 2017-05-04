<!DOCTYPE html>

<!-- 
Credits:
Banner from http://eirian-stock.deviantart.com/art/BG-Autumn-114637771
Web Icons from Batch. http://adamwhitcroft.com/batch/
Background texture from http://subtlepatterns.com/exclusive-paper/
 -->

<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
		<meta charset="UTF-8">
		<title>Tracy Volunteer Connection</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>

	<body>
		<header>
			<div class="title_box">
				<h1>Tracy Volunteer Connection</h1>
				<div class="tagline">Connecting students with local volunteer organizations.</div>
			</div> 
		</header>
		<?php include 'nav.html' ?>
		<main>
			<div class="image"><img src="images/link.png" alt="About Us"></div>
			<h2>About Us</h2>
			<p>The <strong>Tracy Volunteer Connection</strong> project is about bringing together students who are looking for volunteer hours with local non-profits and volunteer organizations that are looking for some helping hands.</p>
			

			<div class="columns">
				<div class="col">
					<div class="image"><img src="images/user-4.png" alt="Students"></div>
					<h2>Students</h2>
					<p>Interested in getting <strong>community service hours</strong> or useful <strong>working experience</strong>? Looking to become more involved with the <strong>local Tracy community?</strong></p>
					<br>
					<a href="students/signup.php" class="button">Sign Up</a>
				</div>
			

				<div class="col">
					<div class="image"><img src="images/store.png" alt="Organizations"></div>
					<h2>Organizations</h2>

					<p>Looking for <strong>more volunteers</strong> to help with your non-profit or volunteer organization? Sign-up to add your organization to our directory.</p>
					<br>
					<a href="organizations/signup.php" class="button">Sign Up</a>
				</div>
			</div>

		</main>
		<?php include 'footer.html' ?>
	</body>
</html>
