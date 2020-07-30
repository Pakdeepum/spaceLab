(function () {
	'use strict';
    var app = angular.module('application', []);
    
    app.controller('MsgController',function($scope){
        $scope.clickMe= function(){
            alert("Helo");
        };

        $scope.valtxt1 = "500";
        $scope.dataname = "aaaaaaaaaaaaaaaaaaa";
    });


    app.controller('MsgController',function($scope){
        $scope.clickMe= function(){
            alert("Helo");
        };

        $scope.valtxt1 = "500";
        $scope.dataname = "aaaaaaaaaaaaaaaaaaa";
    });

    
    app.controller('dataarrayController', function($scope){
        var listname = [1,2,3,4,5];
        var surname ="Mr.Aloha";
        var lastname = "wowwwwwwww";
        $scope.fullname = function(){
            return surname+""+lastname;
        }
        $scope.list = listname;
        $scope.clickEdok = function(){
            $("#modal-QCinputAdd").modal('show');
        }
    });

})();
