<!DOCTYPE html>

<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
		<meta charset="UTF-8">
		<title>Tracy Volunteer Connection</title>
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
	</head>

	<body>
		<?php include '../nav.html' ?>
		<main>
			<h2>Student Sign-Up</h2>

			<p>Sign-up below to receive email notifications of new volunteer opportunities.</p>
			<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['phone']))
				{
				}
				else
				{
					print '<p class="error">Please enter all of the required information.</p>';
				}
			}

			include 'student_form.php';

			?>
		</main>
		<?php include '../footer.html' ?>
	</body>
</html>
