(function () {
	'use strict';
    var app = angular.module('application', []);
        
    // modal list data Paint
	app.controller('listdata', function ($scope,$http){
        /*var datapname = $("#pname").text();
        $http({
            method : "GET",
            url : "/login/listSession/"+datapname+""
        }).then(function mySuccess(response) {
            $scope.myWelcome = response.data;
        }, function myError(response) {
            $scope.myWelcome = response.statusText;
        });  */      
    });
})();

var dashboard = {
    init:function(){
        dashboard.bindEvent();
    },

    bindEvent:function(){
        $('#btn-show').click(function(){dashboard.showdata();});
    },

    showdata:function(){
        window.location.reload();
    }
};

$(function(){
    dashboard.init();
});