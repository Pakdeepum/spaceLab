(function () {
	'use strict';
    var app = angular.module('application', []);
	
	app.controller('QCconfigDataViewController', function ($scope){
		$scope.Add = function(){
			$("#modal-QCconfigAdd").modal('show');
        }
        $scope.InfoAdd = function(){
			$("#modal-QCconfig-infoAdd").modal('show');
        }
    });
})();