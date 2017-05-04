app.controller('MainController', function($scope, $routeParams, $http){

	// Initialize to Web Development filter
	$scope.filters = {}
	

	$scope.init = function(id){
		$scope.filters.main = id;
	}

	// Get filter data
	$http.get("js/filters.js").success(function(data) {
     	$scope.mainFilters = data;
    });

	// Get project data
    $http.get("js/projects.js").success(function(data) {
     	$scope.projects = data;
    });

	$scope.getDescription = function(){
		return $scope.mainFilters[$scope.filters.main].description
	}

	$scope.filter_name = function(){
		return $scope.mainFilters[$scope.filters.main].name
	}

	function isActive(tag){
		return (tag == $scope.filters.tags)
	}

	function removeTags(){
		$scope.filters.tags = '';
	}

	$scope.setTag = function(tag){
		if (isActive(tag)){
			removeTags();
		} else {
			$scope.filters.tags = tag;
		}
	}

	$scope.setFilter = function(filter){
		$scope.filters.main = filter.id;
	}

	$scope.deleteTag = function(){
		removeTags();
	}

	$scope.active = function(tag){
		if (isActive(tag)){
			return "active";
		}
	}

	$scope.getImg = function(filter){
		if ($scope.filters.main == filter.id){
			return filter.imgActive;
		}
		return filter.img;
	}

	$scope.getURL = function(project){
		if (project.url){
			return project.url;
		}
		return 	"./#/project/" + project.id;
	}

	$scope.activeFilter = function(filter){
		if ($scope.filters.main == filter.id){
			return "active";
		}
	}

	if($routeParams.id){
		$scope.projectId = $routeParams.id;
	}

});