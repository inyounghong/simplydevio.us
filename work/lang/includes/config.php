<?php // ** MySQL connection settings ** //
	
	// database host
	define('DB_HOST', 'localhost');
	// database name
	define('DB_NAME', 'translator');
	// Your MySQL / Course Server username
	define('DB_USER', 'root');
	// ...and password
	define('DB_PASSWORD', 'jaeger');


	function open_mysqli() {
		require_once 'config.php';
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if ($mysqli->connect_errno) {
	    	die("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
		}
		return $mysqli;
	}

	/* Transforms the POST input to remove tags and trim it. */
	function transformPOST($s) {
		return trim(stripslashes(strip_tags($s)));	
	}

	/** Transforms the GET value by decoding it, stripping tags,and trimming it.
	  */
	function transformGET($s) {
		return trim(stripslashes(strip_tags(urldecode($s))));
	}

	// Sanitizing for after ajax
	function sanitize_input($str){
		return filter_input(INPUT_POST, $str, FILTER_SANITIZE_STRING);
	}

	// Returns: Shortened string
	function clipText($str){

		$desired_length = 250; // Set min length

		// Check whether string needs to be shortened
		if (strlen($str) <= $desired_length){
			return $str;
		}
		else{
			$index = $desired_length; 
			// Check until next white space
			while (strlen(trim($str[$index])) != 0){
				$index++;
			}
			return substr($str, 0, $index);
		}
		

	}


?>
