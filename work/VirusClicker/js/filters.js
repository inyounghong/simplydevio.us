app.filter('floor', function(){
	return function(score){
		return Math.floor(score);
	};
});

app.filter('floorDecimal', function(){
	return function(growth){
		return Math.floor(growth * 10) / 10;
	}
})