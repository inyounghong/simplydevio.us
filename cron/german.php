<?php

$TRANS_PER_EMAIL = 3;
$set = 0;
$i = 0;
$message = "";

$url = "http://tatoeba.org/eng/sentences/search?query=&from=deu&to=eng&orphans=no&unapproved=no&user=&tags=&has_audio=&trans_filter=limit&trans_to=eng&trans_link=&trans_user=&trans_orphan=&trans_unapproved=&trans_has_audio=&sort=random";
$output = file_get_contents($url); 
// Parse output
$sentence_set = explode("sentences_set", $output,8);

// Loop until 3 legit sentences are found
while ($set < $TRANS_PER_EMAIL && $i < 7){
	$sentence = $sentence_set[$i];
	$sentence_array = explode("sentence directTranslation", $sentence);
	// Array must be at least length 2 (1 sentence, 1 translation)
	if (sizeof($sentence_array) >= 2){
		$message .= parseSentence($first, $sentence_array);
		$set++;
	}
	$i++;
}

function parseSentence($first, $sentence_array){
	// Loop through all translations, add to body
	$body = "";
	for ($i = 0; $i < sizeof($sentence_array); $i++){
		$transs = explode('class="sentenceContent">', $sentence_array[$i]);
		$translation = explode('</div>', $transs[1]);
		$sent = explode('">', $translation[0]);
		// First element in array is original sentence
		if ($i == 0){
			$original = "<b>" . $sent[1] . "</b>";
		} 
		else{
			$body .= "<p>" . $sent[1] . "</p>";
		}
	}
	$mes = $original . $body;
	echo $mes;
	return $mes;
}

// Send mail
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Translator Buddy <translate@simplydevio.us>' . "\r\n";

$subject = "Daily Deutsch";
mail("ih235@cornell.edu", $subject, '<html><body>' .$message . '</body></html>', $headers);

?>