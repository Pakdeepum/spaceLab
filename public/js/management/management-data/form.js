
(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);
    var editname="";
    // modal list data PositionMasterData      
    app.controller('listmaster', function ($scope,$http,$rootScope){       

        $scope.IDlistData = function(id){
            setTimeout(() => {
                $rootScope.id_table_button = id;
                $scope.select_id = id;
            }, 0);            
            $("#btnadd_Master").prop('disabled',false);    
            $http.get('/management/manageData/listMasterDetail/'+id).then(function(response){
                $scope.listsubtable = response.data.data;
            });
            
            // subtable
            $http.get('/management/manageData/listSubMaster/'+id).then(function(response){
                $scope.listsubtableData = response.data.data;
                var temp = [];
                temp = angular.fromJson($scope.listsubtableData);
                $rootScope.listsubtableDataArray = temp;
            });           
        }
        
        function getDataTable(_id){
            setTimeout(() => {
                $rootScope.id_table_button = _id;
                $rootScope.listsubtableDataArray = [];
                $scope.$apply()
            }, 0);            
            $("#btnadd_Master").prop('disabled',false);    
            $http.get('/management/manageData/listMasterDetail/'+_id).then(function(response){
                $scope.listsubtable = response.data.data;
            });
            
            // subtable
            $http.get('/management/manageData/listSubMaster/'+_id).then(function(response){
                $scope.listsubtableData = response.data.data;
                var temp = [];
                temp = angular.fromJson($scope.listsubtableData);
                $rootScope.listsubtableDataArray = temp;
            }); 
        }

         //click soft delete subdata
         $scope.softDeleteId = function(idsoft){
            $("#modal-askDelete").modal('show');
            $("#confirm").click(function(){
                $http.get('/management/manageData/softdeletesub/'+$rootScope.id_table_button+'/'+idsoft).then(function(response){
                    //window.location.reload();
                    $rootScope.id_table_button 
                });
                getDataTable($rootScope.id_table_button);
                $("#modal-askDelete").modal('hide');
            });
        }

        // process Edit
        $scope.showmodalEdit = function(idEdit){
            setTimeout(() => {
                $scope.listdataEdit = [];
              }, 0);
            $http.get('/management/manageData/listDataEdit/'+$rootScope.id_table_button+'/'+idEdit).then(function(response){
                $scope.listdataEdit = response.data.data;
                $scope.id_table = $scope.id_table_button
                $scope.id_table_edit = idEdit
                $("#modal-editmaster").modal('show').end();
            });           
        }                 
        
        $scope.showmodalAdd = function(){
        var id_table = $('input[name="id_table_button"]').val();
        $scope.id_table_temp_add = id_table;
        setTimeout(() => {
            $scope.listdataAdd = [];
          }, 0);
        $http.get('/management/manageData/AdddataMaster/'+id_table).then(function(response){
            $scope.listdataAdd = response.data.data;
         });
         $("#modal-addmaster").modal('show').end();
        }
            // add master table
            $http.get('/management/manageData/listMaster').then(function(response){
                $scope.posts = response.data.data;
            }
        );
    }); 
    
    app.controller('listmasterModal', function ($scope,$http,$rootScope){  
        function onSelect(id){
            setTimeout(() => {
                $rootScope.id_table_button = id;
                $rootScope.listsubtableDataArray = [];
                $scope.$apply()
            }, 0);           
            $("#btnadd_Master").prop('disabled',false);    
            $http.get('/management/manageData/listMasterDetail/'+id).then(function(response){
                $scope.listsubtable = response.data.data;
            });
            
            // subtable
            $http.get('/management/manageData/listSubMaster/'+id).then(function(response){
                $scope.listsubtableData = response.data.data;
                var temp = [];
                temp = angular.fromJson($scope.listsubtableData);
                $rootScope.listsubtableDataArray = temp;
            });
        }
        $("#Addconfirm").on('click',function(){
            var id_table = $('input[name="id_table_button"]').val();
            var array_temp = [];
            var array_temp_value = [];
            var myJSON = [];
            var myJSON2 = [];
            $('input[name="results_add[]"]').each(function(){
                array_temp.push($(this).val());
              });
    
            $('input[name="id_field_add[]"]').each(function(){
                array_temp_value.push($(this).val());
            });
            $scope.id_table_temp =id_table;
            myJSON = JSON.stringify(array_temp);
            myJSON2 = JSON.stringify(array_temp_value);

            var data = {"mysjon":myJSON,"mysjon2":myJSON2,"scope1":$scope.id_table_temp}
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $(this).data('url'),
                cache: false,
                data: {data},
                success:function(msg){
                    $("#modal-addmaster").modal('hide')
                    onSelect(id_table);
                },
                error : function(error){
                    console.log(error)
                }                    
            });
        });

        $("#Ediconfirm").click(function(){
                var array_temp = [];
                var array_temp_value = [];
                var myJSON = "";
                var myJSON2 = "";
                $('input[name="results[]"]').each(function(){
                    array_temp.push($(this).val());
                  });

                $('input[name="id_field[]"]').each(function(){
                    array_temp_value.push($(this).val());
                });
                var id_table =$('input[name="id_table"]').val();
                var id_table_edit =$('input[name="id_table_edit"]').val();
                $scope.id_table_temp =id_table;
                $scope.id_table_edit_temp =id_table_edit;
                myJSON = JSON.stringify(array_temp);
                myJSON2 = JSON.stringify(array_temp_value);
                var data = {"mysjon":myJSON,"mysjon2":myJSON2,"scope1":$scope.id_table_temp,"scope2":$scope.id_table_edit_temp}
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: $(this).data('url'),
                    cache: false,
                    data: {data},
                    success:function(msg){
                         $("#modal-editmaster").modal('hide')
                        onSelect(id_table);
                    },
                    error: function(err){
                        console.log(err)
                    }
                });
            });
        });
})();