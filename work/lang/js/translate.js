function readyForClick(){
	$(".text").unbind("click");

	$(".text").click( function(){
		if(!$(this).hasClass("clicked")){

			$(this).addClass("clicked");
			var text = $(this).text();

			// Start translation
			translate(clean(text), $(this));

		}
		else{
			$(this).children().toggle();
		}
	});
}

// Shortcut function for console.log
function l(text){
	console.log(text);
}

var words_per_page = 20;

// Takes given array of words and displays/formats one page
function displayPageText(array, index){
	// Clear reading_box
	$("#reading_box").html("");
	var max = array.length;

	for (var i = 0; i < words_per_page && (i+index < max); i++){
		var word = array[i + index];
		$("#reading_box").append('<div class="text">' +  word + '</div>');
	}

	// Also want to store the index in a hidden input
	$("#index").val(index);

	readyForClick();
}



// Executing of code begins
$(document).ready(function(){


	// Process text into array
	var text = $("#text_input").val();
	var array = text.split(" ");

	// Getting and formatting the text
	packageText( function(data){ // returns index

		var index = parseInt(data);

		displayPageText(array, index);
		
		
	});

	// Get recent translations
	getRecent();

	$("#submit").click(function(){
		packageText();
	});

	$(".tab").click(function(){
		$(this).next().slideToggle(100);
	})

	$("#page_right").click(function(){
		// Grab current index value
		var index = parseInt($("#index").val());

		if (index + words_per_page < array.length ){
			displayPageText(array, index + parseInt(words_per_page));
		}
	});

	$("#page_left").click(function(){
		// Grab current index value
		var index = parseInt($("#index").val());
		if (index > 0){
			displayPageText(array, index - parseInt(words_per_page));
		}
	});
});

// Replaces special characters before translating
function clean(text){
	text = text.replace(",", "").replace(".", "").replace("?", "").replace('"', "").replace(':', "");
	return text;
}


// Puts input text into #reading_box
function packageText(callback){
	var text_id = $("#text_id").val();
	var json = {requestType: 'getPageIndex', text_id: text_id};

	ajaxRequest = $.ajax({
		url: 'includes/translation_mysql.php',
		method: 'POST',
		data: json,
		dataType: 'text',
		error: function(error) {
			console.log(error);
		},
		success: callback
	});
}


function yandexCall(text, el, callback){
	l("starting yandex call");
	// Make AJAX call to translate API
	var APIkey = 'trnsl.1.1.20150613T055546Z.e427180336dd7a33.8c5577f75ca831698eb10dac240a7bfa66bc4620';
	var url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?key=' + APIkey + '&lang=de-en&text=' + encodeURIComponent(text) ;

	$.ajax({
		url: url,
		method: 'GET',
		error: function(error) {
			console.log(error);
		},
		success: callback
	});
}

// Main translating function
function translate(text, el){
	l("Translating: " + text);

	// Length needs to be short
	if (text.length > 40){
		el.append('<div class="trans">Word is too long!</div>');

	}
	else{
		var translation = "";
		var text_id = $("#text_id").val();

		// Check whether word is in table	
		var json = {requestType: 'wordIsInTable', word: text};

		ajaxRequest = $.ajax({
			url: 'includes/translation_mysql.php',
			method: 'POST',
			data: json,
			dataType: 'text',
			error: function(error) {
				console.log(error);
			}
		});
	
		// Success of checking whether word is in table
		ajaxRequest.success( function(data) {

			l(data);

			// If this does not exist in table
			if(data == ""){
				l("word needs to be added");
				
				yandexCall(text, el, function(data){
					translation = data.text[0];
					l("translation" + translation);
					$(".check").removeClass("check");
		  			el.append('<div class="trans check">' + translation + '</div>');
				});

				// Get gender and part of speech
				var pons_url = 'http://en.pons.com/translate?q=' + encodeURIComponent(text) + '&l=deen&in=de&lf=de';

				ajaxRequest = $.ajax({
					url: pons_url,
					method: 'GET',
					error: function(error) {
						console.log(error);
					}
				});

				ajaxRequest.success( function(data) {

					var array = getGender(data);
					var part = array[0]
					var gender = array[1];
					
					setGender(part, gender);

					// Optional - Get additional information
					if($("#pons").is(':visible')){
						// Load html into DOM
						setPageIntoHTML(data);
						scrapePons();
					}
					var i = 0;

					if (translation == ""){
						l("failed");
					}
					else{
						// Make AJAX call to add translation to database
						var json = {requestType: 'add_translation', word: text, translation: translation, language_id: 1, text_id: text_id, part: part, gender: gender};
						l(json);

						addWordToDatabase(json);
					}
					

					
				});
			}
			else{

				var split = data.split(" ");
				var trans = split[0].replace("_", " "); // Remove underscores

				// Add translation and style
				$(".check").removeClass("check");
				el.append('<div class="trans check">' + trans + '</div>');
				setGender(split[2], split[1]);

				var word_id = split[3];

				// Add word to translation logs
				var json = {requestType: 'add_log', word_id: word_id, translation: translation, text_id: text_id, user_id: 1};
				
				addTranslationToLog(json);
			}
		});
		
		
	}
		


}

// Adds a translation request to the logs
function addTranslationToLog(json){
	
	ajaxRequest = $.ajax({
		url: 'includes/translation_mysql.php',
		method: 'POST',
		data: json,
		dataType: 'text',
		error: function(error) {
			console.log(error);
		}
	});

	// Success of insertion, pull most recent translations
	ajaxRequest.success( function(data) {
		l(data);
	});

}

// Adds a translated word to database using given json for AJAX
function addWordToDatabase(json){
	
	ajaxRequest = $.ajax({
		url: 'includes/translation_mysql.php',
		method: 'POST',
		data: json,
		dataType: 'text',
		error: function(error) {
			console.log(error);
		}
	});

	// Success of insertion, pull most recent translations
	ajaxRequest.success( function(data) {
		l(data);
		getRecent();
	});

}

// Makes ajax call for getting most recent translations
function getRecent(){
	var json = {requestType: 'get_recent', user_id: 1};

	ajaxRequest = $.ajax({
		url: 'includes/translation_mysql.php',
		method: 'POST',
		data: json,
		dataType: 'text',
		error: function(error) {
			console.log(error);
		}
	});

	ajaxRequest.success( function(data) {
		$("#recent_translations").html(data);
	});
}

// Adds page data from pons to #hidden_load
function setPageIntoHTML(data){
	var array = data.split('<div class="results">');
	var text = array[1].split('<div class="forum_hits', 1);
	text = text[0];

	// Clear displays
	$("#hidden_load").text("");
	$("#hidden_load").html(text + '</div>');
}

// Get gender from data and set
function getGender(data){
	var array = data.split('wordclass">');

	try{
		var two = array[1].split('acronym title="');
		var part = two[1].slice(0,4);
		var gender = two[2].slice(0,1);
	}
	catch(e){
		var part = "";
		var gender = "";
	}
	return [part, gender];
}

// Sets gender and part of speech classes
function setGender(part, gender){

	if (part == "noun"){
		if (gender == "m"){
			$(".trans.check").removeClass("check").addClass("noun").addClass("m");
		}
		else if (gender == "f"){
			$(".trans.check").removeClass("check").addClass("noun").addClass("f");
		}
		else{
			$(".trans.check").removeClass("check").addClass("noun").addClass("nt");
		}
	}
}

// Scrape pons given page source
function scrapePons(){
	
	$("#display_load").text("");

	var a = 0;
	$(".translations").each(function(){
		if(a < 3){
			var title = $(this).children("h3").text();
			$("#display_load").append('<div class="title">' + title + '</div>');

			var i = 0;
			$(this).children("dl").each(function(){
				if(i < 3){
					var orig = $(this).children("dt").text();
					var trans = $(this).children("dd").find(".target").text();
					$("#display_load").append('<div class="orig">' + orig + '</div>');
					$("#display_load").append('<div class="trans">' + trans + '</div>');
					i++;
				}
			});
			a++;
		}
	});

}
