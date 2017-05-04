app.controller('MainController', function($scope, $http){

	$scope.game = { score: 0, growth: 0.2 };

	$scope.spokes = [
		{"name": "Extra Spoke", 		"cost": 10, 	"count":0, "growth": 0.2, 	"spoke": 'spoke1', "req": 0},
		{"name": "Advanced Spoke", 		"cost": 20, 	"count":0, "growth": 0.5, 	"spoke": 'spoke2', "req": 0.6},
		{"name": "Cool Spoke", 			"cost": 100, 	"count":0, "growth": 2, 	"spoke": 'spoke3', "req": 2.0},
		{"name": "Super Spoke", 		"cost": 500, 	"count":0, "growth": 8, 	"spoke": 'spoke4', "req": 8},
		{"name": "Super Ultra Spoke", 	"cost": 2000, 	"count":0, "growth": 14, 	"spoke": 'spoke5', "req": 24},
		{"name": "Ultra Mega Spoke", 	"cost": 10000, 	"count":0, "growth": 25, 	"spoke": 'spoke6', "req": 55},
	]

	function addScore(amount){
		$scope.game.score += amount;
	}

	function subtractScore(amount){
		$scope.game.score -= amount;
	}

	function addGrowth(amount){
		$scope.game.growth += amount;
	}

	function reqMet(spoke){
		return $scope.game.growth >= spoke.req;
	}

	function addSpoke(img){
		var deg = Math.floor(Math.random() * 360);
		var style = "-ms-transform: rotate(" + deg + " deg); -webkit-transform: rotate(" + deg + "deg); transform: rotate(" + deg + "deg);";
		var img = '<img class="spoke" src="img/' + img + '.png" style="' + style + '">';
		$('#virus-box').append(img);
	}

	$scope.clickVirus = function(){
		addScore(1);
	}

	$scope.buySpoke = function(spoke){
		if ($scope.game.score >= spoke.cost){
			subtractScore(spoke.cost);
			addGrowth(spoke.growth);
			spoke.count += 1;
			spoke.cost = Math.floor(spoke.cost * 1.3);
			addSpoke(spoke.spoke);
		}
	}

	$scope.getIcon = function(spoke){
		if (reqMet(spoke)){
			return spoke.spoke;
		}
		return 'question';
	}

	$scope.getName = function(spoke){
		if (reqMet(spoke)){
			return spoke.name;
		}
		return "???";
	}

	$scope.highlight = function(spoke){
		var str = "";
		if (reqMet(spoke)){
			str += "available "
			if ($scope.game.score >= spoke.cost){
				str += "highlight ";
			}
		}
		return str;
	}

	// Score growth
	setInterval(function(){
		$scope.$apply(function(){
			addScore($scope.game.growth/10);
		})
	}, 100);
});