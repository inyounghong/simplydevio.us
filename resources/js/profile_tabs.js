var web_safe_fonts = ["georgia", "palatino linotype", "book antiqua", "palatino", "times new roman", "times", "serif", "sans-serif", "cursive", "arial", "helvetica", "comic sans ms", "impact", "lucida sans unicode", "tahoma", "trebuchet ms", "verdana", "geneva", "courier new", "lucida console"];

// Font Family
function updateFontFamily(){
    var font = $('#buttonFontFamily').val();
    // If not a web-safe font
    if (web_safe_fonts.indexOf(font.toLowerCase()) == -1){

    	font = capitalize(font);
    	console.log(font);
        var font_name = font.replace(" ", "+");

        $("#imports").html("");
        $("#imports").append("<style>@import url(http://fonts.googleapis.com/css?family=" + font_name + ");</style>")
    }
}

function capitalize(string){
	return string.toLowerCase().replace( /\b\w/g, function (m) {
        return m.toUpperCase();
    });
}



$(document).ready( function(){

	// Toggle tabpages with tabs
	$(".tabby").click(function(){

		$index = $(".tabby").index($(this)) + 1;

		$(".tab_page").removeClass("selected");
		$("#page" + $index).addClass("selected");

		$(".tabby").removeClass("selected");
		$(this).addClass("selected");

	});

	// Toggle ctabpages with tabs
	$(".ctabby").click(function(){

		$index = $(".ctabby").index($(this)) + 1;

		$(".ctab_page").removeClass("selected");
		$("#cpage" + $index).addClass("selected");

		$(".ctabby").removeClass("selected");
		$(this).addClass("selected");

	});

});

function updateRangeLabels(){
	$('.range_label').each(function(){
        $(this).html($(this).prev().val());
    });
}
    