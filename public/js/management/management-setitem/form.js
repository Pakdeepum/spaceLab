(function () {
	'use strict';
    var app = angular.module('application', []);
    
    app.controller('listitem',function($scope,$http){
        $scope.listitem = [] ;
        $scope.groupnow;
        $http.get('/QC/Qc-listgroupitem').then(function(response){
            $scope.listgroup = response.data.data;
        });

        $scope.ClickAddItem = function(enteredValue){
            for(var i=0; i < $scope.listitem.length; i++) {
                
                if ($scope.listitem[i].id_lab_item == enteredValue)
                {                    
                    $scope.allitem.push({
                        id_lab_item : $scope.listitem[i].id_lab_item,
                        id_lab_item_sub_group : 0,
                        lab_item_code:$scope.listitem[i].lab_item_code,
                        lab_item_name:$scope.listitem[i].lab_item_name,
                        lab_items_unit:$scope.listitem[i].lab_items_unit,
                    }); 
                    $scope.listitem.splice(i,1);    
                } 
            }   
        }

        $scope.SaveData = function(){
            var dataitemall = $scope.allitem;
            var groupitem = $("#selectitem").val();
            var url = $("#btn-saveItem").data('url');
            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                cache: false,
                data: {dataitemall:dataitemall,groupitem:groupitem},
                success:function(msg){
                    if(msg=="successs"){
                        //window.location.reload();
                        $scope.iditem = $("#selectitem").val();
                        $scope.groupnow = $scope.iditem;
                        $http.get('/management/config/item').then(function(response){
                            $scope.listitem = response.data.data;
                        });
            
                        $http.get('/QC/Qc-selected/'+$scope.iditem).then(function(response){
                            $scope.allitem = response.data.data;
                        });
                    }
                },
                error : function(error){
                    console.log(error)
                }
            });
        }

        $scope.ClickDelItem = function(enteredValue){

            for(var i=0; i < $scope.allitem.length; i++) {
                if ($scope.allitem[i].id_lab_item == enteredValue)
                {
                    if ($scope.allitem[i].id_lab_item_sub_group == 0)
                    {
                        $scope.allitem.splice(i,1); 
                    } else {
                        $http.get('/management/config/deleteItem/'+enteredValue).then(function(response){
                            
                        });
                        $scope.allitem.splice(i,1); 
                    }
                       
                } 
            }

            $http.get('/management/config/item').then(function(response){
                $scope.listitem = response.data.data;
                for(var i=0; i < $scope.listitem.length; i++) {
                    for(var j=0; j < $scope.allitem.length; j++) {
                        if ($scope.allitem[j].id_lab_item == $scope.listitem[i].id_lab_item)
                        {
                            $scope.listitem.splice(i,1);    
                        }
                    }
                }  
            });
        }

        $("#selectitem").change(function(){
            $scope.iditem = $(this).val();
            $scope.groupnow = $scope.iditem;
            $http.get('/management/config/item').then(function(response){
                $scope.listitem = response.data.data;
            });

            $http.get('/QC/Qc-selected/'+$scope.iditem).then(function(response){
                $scope.allitem = response.data.data;
            });
        });        
    });
})();


