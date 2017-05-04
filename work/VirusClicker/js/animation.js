$(document).ready(function(){
	$('#virus-box').mousedown(function(){
		$(this).css("opacity", "0.8");
		$('.click-me').fadeOut();
	});
	$('#virus-box').mouseup(function(){
		$(this).css("opacity", "1");
	});

});