(function(){
	var app = angular.module('belgotaku', ['ngRoute']);

	app.config(['$routeProvider',function($routeProvider) {
		$routeProvider
			.when('/subjects', {
				templateUrl : '/templates/subjects.html',
				controller : 'SubjectsController'
			})

			.when('/messages',{
				templateUrl : '/templates/messages.html',
				controller : 'MessagesController'
			})

			.when('/badges', {
				templateUrl : '/templates/badges.html',
				controller : 'BadgesController'
			});
	}]);

	app.filter('unsafe', function($sce) { return $sce.trustAsHtml; });

	app.controller('SubjectsController', ['$scope', '$http', function($scope, $http, $sce){
		$http.get('profile/subjects').success(function($data){
			console.log($data);
			$scope.subjects = $data;
		});
	}]);

	app.controller('MessagesController', ['$scope', '$http', function($scope, $http){
		$http.get('profile/messages').success(function($data){
			console.log($data);
			$scope.messages = $data;
		})
	}]);

	app.controller('BadgesController', ['$scope', '$http', function($scope, $http){
		$http.get('profile/badges').success(function($data){
			$scope.badges = $data;
		});
	}])
}());