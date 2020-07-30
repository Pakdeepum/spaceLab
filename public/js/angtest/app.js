(function () {
	'use strict';
    var app = angular.module('application', []);
	
	app.controller('alerttestController', function ($scope){
		$scope.clickMe = function(){
			$("#modal-QCinputAdd").modal('show');
		}
	});
	
})();
