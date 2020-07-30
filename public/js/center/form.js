(function () {
	'use strict';
    var app = angular.module('application', []);
	
	app.controller('ButtonCenterController', function ($scope){
		$scope.Upload = function(){
			$("#modal-uploadFile").modal('show');
        }
        $scope.confirmSave = function(){
			$("#modal-confirmSave").modal('show');
        }
        $scope.confirmCancel = function(){
			$("#modal-confirmCancel").modal('show');
        }
        $scope.confirmEdit = function(){
			$("#modal-confirmEdit").modal('show');
        }
        $scope.confirmDelete = function(){
			$("#modal-confirmDelete").modal('show');
        }
        $scope.askSave = function(){
			$("#modal-askSave").modal('show');
        }
        $scope.askCancel = function(){
			$("#modal-askCancel").modal('show');
        }
        $scope.askEdit = function(){
			$("#modal-askEdit").modal('show');
        }
        $scope.askDelete = function(){
			$("#modal-askDelete").modal('show');
        }
        $scope.failSave = function(){
			$("#modal-failSave").modal('show');
        }
        $scope.failCancel = function(){
			$("#modal-failCancel").modal('show');
        }
        $scope.failEdit = function(){
			$("#modal-failEdit").modal('show');
        }
        $scope.failDelete = function(){
			$("#modal-failDelete").modal('show');
        }
    });

})();
