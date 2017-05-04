<?php
	if(!isset($_GET["text"])) header('Location: mytexts.php');
?>

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
		<script src="js/translate.js"></script>


		<style>
			#edit_text{
				display: none;
			}

			#hidden_load, #pons{
				display: none;
			}
		</style>
	</head>
	<body>
		
		<div class="cont main">
			<?php include 'includes/nav.php' ?>
			<?php include 'includes/config.php' ?>

			<?php
				$mysqli = open_mysqli();

				$text_id = transformGET($_GET["text"]);

				$query = "SELECT * FROM texts WHERE text_id=$text_id";
				$result = $mysqli->query($query);
				while($row = $result->fetch_assoc()) {
					$title = $row["title"];
					$content = $row["content"];
				}

				// If a text needs to be edited
				if (isset($_POST["content"])) {
					
					// Get content
					$content = transformPOST($_POST["content"]);

					// Get word count
					$words = explode(" " , $content );
					$word_count = count($words);

					$query = 'UPDATE texts SET content="' . $content .'",word_count=' . $word_count .' WHERE text_id=' . $text_id;
					$result = $mysqli->query($query);

				}


			?>
			<div id="page_left" class="pages">&lt;</div>
			<div id="left">
				
				
				<div id="reading_wrapper">

					<h1 class="title"><?php echo $title ?></h1>
					<div id="queryResultContainer"></div>
					<div id="reading_box">

						<div class="text"></div>
					</div>
				</div>

				

			</div>
			<div id="page_right" class="pages">&gt;</div>

		</div>

		

		<div id="sidebar">
			<div class="tab">Edit Text</div>
			<div class="panel" id="edit_text">
				<form action="read.php?text=<?php echo $text_id ?>" method="POST">
					<textarea name="content" id="text_input"><?php echo $content; ?></textarea>
					<input type="hidden" id="text_id" value="<?php echo $text_id ?>">
					<input type="hidden" id="index" value="">
					<input type="submit" id="submit" value="Update">
				</form>
			</div>

			<div class="tab">Additional Information</div>
			<div class="panel" id="pons">
				<div id="hidden_load"></div>
				<div id="display_load"></div>
			</div>

			<div class="tab">Recent Translations</div>
			<div class="panel" id="recent_translations">
				
			</div>

			<div class="tab">Most Common Translations</div>
			<div class="panel">
				
			</div>


		


	</body>