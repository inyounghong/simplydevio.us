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
			<h2>Organization Sign-Up</h2>
			<p>Sign-up below to add your organization to the list of <a href="../students/directory.php">volunteer opportunities</a>.</p>

			<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if(!empty($_POST['organization_name']) && !empty($_POST['entry']))
				{
					include('../../mysql_connect.php');

					$organization_name = mysql_real_escape_string(trim(strip_tags($_POST['organization_name'])), $dbc);
					$entry = mysql_real_escape_string(trim(strip_tags($_POST['entry'])), $dbc);

					$query = "INSERT INTO entries (name, entry, date_entered) VALUES ('$organization_name', '$entry', NOW())";
					$r = mysql_query($query, $dbc);

					if (mysql_affected_rows($dbc) == 1)
					{
						print '<p>Your entry has been added to the Organization Database.</p>';
					}
					else
					{
						print '<p class="error">Could not add the entry</p>.' . mysql_error($dbc) . $query ;
					}
					
				}
				else
				{
					print '<p class="error">Please enter all of the required information.</p>';
				}

			}

			include ('signup_form.php');
			?>

		</main>
		<?php include '../footer.html' ?>
	</body>
</html>
