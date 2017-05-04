<!DOCTYPE html> 
<html>
	<head>
		<meta charset="utf-8" />
		<title>Language Translator</title>
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- Boot -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<link href="css/style.css" rel="stylesheet" />

		<script src="https://code.jquery.com/jquery.js"></script>


	</head>
	<body>

		<main class="container main">

			<?php include 'includes/config.php' ?>
			<?php
				$user_id = 1;

				// Initializing
				$content = "";
				$title = "";
				$action = "";

				// There is a get action
				if (isset($_GET["action"])) {

					$text_id = transformGET($_GET["text_id"]);

					// Editing text
					if ($_GET["action"] == "edit_text"){
						$mysqli = open_mysqli();

						$query = "SELECT content, title FROM texts WHERE text_id=$text_id";
						$result = $mysqli->query($query);
						while($row = $result->fetch_assoc()) {
							$title = $row["title"];
							$content = $row["content"];
						}

						// Set action for posting
						$action = "update_text";
					}
				}
			?>

			<form action="mytexts.php" method="POST">
				<input name="title" placeholder="Title" value="<?php echo $title ?>">
				<textarea name="content" placeholder="Your Text"><?php echo $content ?></textarea>
				<input type="hidden" name="action" value="<?php echo $action ?>">
				<input type="hidden" name="text_id" value="<?php echo $text_id ?>">
				<input type="submit" class="button">
			</form>

			<?php
				$mysqli = open_mysqli();

				//$query = "SELECT * FROM conversations WHERE user1 = $u1 AND user2 = $u2";
				//$result = $mysqli->query($query);
				//while($row = $result->fetch_assoc()) {
				//	$message = $row["message"];
			?>

		</main>
		


	</body>