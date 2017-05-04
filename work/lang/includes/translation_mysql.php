<?php
	$request_type = filter_input(INPUT_POST, "requestType", FILTER_SANITIZE_STRING);
	if (!empty($request_type)){

		require_once "config.php";
		$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

		if ($mysqli->errno) {
			print($mysqli->error);
			die();
		}
		
			
		switch ( $request_type ) {

			case "add_translation":

				$word = sanitize_input("word");
				$translation = sanitize_input("translation");
				$language_id = sanitize_input("language_id");
				$text_id = sanitize_input("text_id");
				$gender = sanitize_input("gender");
				$part = sanitize_input("part");

				$translation_id = "";
				$word_id = "";

				// Insert into words
				$query = 'INSERT INTO words(word_id, word, gender, part) VALUES (NULL, "' . $word . '","' . $gender . '","' .$part.'")';
				$result = $mysqli->query($query); 
				
				// Select word_id
				$query = 'SELECT word_id FROM words WHERE word="' . $word . '"';
				$result = $mysqli->query($query); 
				while($row = $result->fetch_assoc()) {
					$word_id = $row["word_id"];
				}

				// Insert into de_en_translations
				$query = 'INSERT INTO de_en_translations(translation_id, word_id, translation) VALUES (NULL,' . $word_id .',"' . $translation .'")';
				echo $query;
				$result = $mysqli->query($query); 

				// Select translation_id
				$query = 'SELECT translation_id FROM de_en_translations WHERE word_id=' . $word_id;
				echo $query;
				$result = $mysqli->query($query); 
				while($row = $result->fetch_assoc()) {
					$translation_id = $row["translation_id"];
				}
				echo $translation_id;

				// Insert into translations
				$query = "INSERT INTO translations(translation_id, date_translated, text_id, user_id) VALUES ($translation_id,CURRENT_TIMESTAMP,$text_id,1)";
				echo $query;
				$result = $mysqli->query($query); 

				$mysqli->close();
				die();
				break;


			case "get_recent":

				/*$user_id = filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_STRING);

				// Select recents
				$query = 'SELECT * FROM translations INNER JOIN words ON (translations.word_id = words.word_id) WHERE user_id=' . $user_id . ' ORDER BY date_translated DESC LIMIT 10';
				
				$result = $mysqli->query($query); 

				$string = "";

				while($row = $result->fetch_assoc()) {
					$word = $row["word"];
					$translation = $row["translation"];

					$string .= "<div class='word'>$word</div>
								<div class='translation'>$translation</div>";


				}
				echo $string;

				$mysqli->close();
				die();*/
				break;

			case "wordIsInTable":

				$word = sanitize_input("word");
				$word_id = "";
				$gender = "";
				$part = "";
				$translation = "";

				$query = 'SELECT * FROM words INNER JOIN de_en_translations ON (words.word_id = de_en_translations.word_id) WHERE word="' . $word . '"';

				$result = $mysqli->query($query); 
				while($row = $result->fetch_assoc()) {
					$word_id = $row["word_id"];
					$gender = $row["gender"];
					$part = $row["part"];
					$translation = $row["translation"];
				}
				if (empty($word_id)){
					echo "";
				}
				else{
					$translation = str_replace(" ", "_", $translation);
					echo "$translation $gender $part $word_id";
				}
				
				$mysqli->close();
				die();
				break;

			// Gets last left off page
			case "getPageIndex":

				$text_id = sanitize_input("text_id");

				$query = "SELECT * FROM texts WHERE text_id=$text_id";
				
				$result = $mysqli->query($query); 
				while($row = $result->fetch_assoc()) {
					$index = $row["index"];
				}
				echo $index;

				$mysqli->close();
				die();
				break;
		}


	}

?>