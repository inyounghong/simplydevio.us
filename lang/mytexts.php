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

		<script>

			function confirmDelete(text_id){
				
			}

			$(document).ready(function(){

				// Clicking edit button
				$('.edit_text').click(function(event){
					event.stopPropagation();
					location.href= $(this).attr("href");
				});

				// Clicking edit button
				$('.delete_text').click(function(event){
					event.stopPropagation();
					var answer = confirm('Delete this text?');
					if (answer){
						location.href= $(this).attr("href");
					}
				});

				// Makes entire div clickable for reading
				$('.text_wrap').click(function(){
					$link = $(this).children().find('.read_link').attr("href");
					location.href=$link;
				});
			})
		</script>

	</head>
	<body>

		<?php include 'includes/nav.php' ?>
		<?php include 'includes/config.php' ?>

		<?php

			$user_id = 1;

			// Start mysql
			$mysqli = open_mysqli();

			

			// If there is a post action
			if(isset($_POST["action"])){

				$text_id = transformPOST($_POST["text_id"]);
				$content = transformPOST($_POST["content"]);

				// Get title
				if (empty(transformPOST($_POST["title"]))){
					$title = "untitled";
				}
				else{
					$title = transformPOST($_POST["title"]);
				}

				// Updating text
				if($_POST["action"] == "update_text"){

					$query = 'UPDATE texts SET content="'.$content.'" WHERE text_id=' . $text_id;
					$result = $mysqli->query($query);
				}

				else{
					// If a text needs to be uploaded

					// Get word count
					$words = explode(" " , $content );
					$word_count = count($words);

					$query = 'INSERT INTO texts(text_id, title, content, word_count, user_id, upload_date) VALUES (NULL,"' . $title . '","' . $content . '",' . $word_count . ',1, CURRENT_TIMESTAMP)';
					$result = $mysqli->query($query);
					//while($row = $result->fetch_assoc()) {
					//	$message = $row["message"];
				}
				
			}

			// There is a get action
			else if (isset($_GET["action"])) {
				
				$text_id = transformPOST($_GET["text_id"]);

				// There is a text to be deleted
				if($_GET["action"] == "delete_text"){

					$query = 'DELETE FROM texts WHERE text_id=' . $text_id;
					echo $query;
					$result = $mysqli->query($query);
				}
				
			}

			


		?>

		<?php
			$mysqli = open_mysqli();

			//$query = "SELECT * FROM conversations WHERE user1 = $u1 AND user2 = $u2";
			//$result = $mysqli->query($query);
			//while($row = $result->fetch_assoc()) {
			//	$message = $row["message"];
		?>

		<main class="container main">

			<div class="row">
				<!-- Start main col -->
				<div class="col-sm-8">
					<ul class="list-group">
					<?php 

						// Displaying all texts
						$query = 'SELECT * FROM texts WHERE user_id=' . $user_id;
						$result = $mysqli->query($query);
						while($row = $result->fetch_assoc()) {
							$text_id = $row["text_id"];
							$title = $row["title"];
							$content = clipText($row["content"]);
							$word_count = $row["word_count"];
							$upload_date = $row["upload_date"];

							echo "<li class='text_wrap list-group-item'>

									<h3>$title</h3>
									<div class='content'>$content ... <a class='read_link' href='read.php?text=$text_id' class='button'>Read More</a></div>
									<div class='word_count'>Word Count $word_count</div>
									<div class='upload_date'>Uploaded $upload_date</div>

									<div class='menu_options'>
										<button class='edit_text' href='upload_text.php?action=edit_text&text_id=$text_id'>Edit</button>
										<button class='delete_text' href='mytexts.php?action=delete_text&text_id=$text_id'>Delete</button>

									</div>
									
								</li>

								";
						}
					?>
					</ul>
				</div>
				<div class="col-sm-4">
				</div>
		</div>
		


	</body>