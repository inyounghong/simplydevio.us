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

		?>

		<main class="container main">

			<div class="row">
				<!-- Start main col -->
				<div class="col-sm-8">
					<ul class="list-group">
					<?php 

						// Displaying most searched words
						$query = 'SELECT * FROM texts WHERE user_id=' . $user_id;
						$result = $mysqli->query($query);

						while($row = $result->fetch_assoc()) {
							$text_id = $row["text_id"];
							

							echo "<li class='list-group-item'>

									
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