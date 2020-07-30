(function () {
	'use strict';
    var app = angular.module('application', []);
    

    app.controller('listmaster', function ($scope,$http){
        $http.get('/management/manageMenu/listgroup/').then(function(response){
            $scope.listgroup = response.data.data;
        });

        $('#selectMenu').change(function(){
            var id = $(this).val();
            $http.get('/management/manageMenu/listMenu/'+id).then(function(response){
                $scope.listMenu = response.data.data;
            });
            $scope.deleteMenu = function(idtag){
                $('#modal-askDelete').modal('toggle');
                $('#confirm').click(function(){
                    $http.get('/management/manageMenu/deletemenu/' + id + '/' + idtag).then(function(response){
                        window.location.reload();
                    });
                }); 
            }
            $scope.AddMenu = function(){
                $http.get('/management/manageMenu/listAddmenu/' + id ).then(function(response){
                    $scope.listAllMenu = response.data.data;
                    console.log($scope.listAllMenu);
                    
                });
                $('#modal-addMenu').modal('show');
                $('#Addconfirm').click(function(){
                    var allid = [];
                    $.each($('input:checked'),function(key,item){
                        allid.push($(item).val());
                    });
                    $.ajax({
                        type: "GET",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: $(this).data('url'),
                        cache: false,
                        data: {allmenu:allid,id:id},
                        success:function(msg){
                            if(msg=="success") {
                                window.location.reload();
                            }
                        }
                    });
                    console.log(allid,id);
                });
            }
            
        });

        

    });
    
})();