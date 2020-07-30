(function () {
	'use strict';
    var app = angular.module('application', []);
	app.controller('UserController', function ($scope,$http){
  
		$scope.Add = function(){
            $("#modal-management-user-addUser").modal('show');
            $("select").change(function(){
                if($("#Department").val() != 0 && $("#Position").val() != 0 && $("#Prefix").val() != 0 && $("#Groupuser").val() != 0){
                    $("#adduser").prop('disabled',false);
                }else{
                    $("#adduser").prop('disabled',true);
                }
            });
            //Reload Img
            $('#imageinput').on('change', function(e) {
                var fileInput=this;
                if(fileInput.files[0]) {
                    var reader=new FileReader();
                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }) 
        }
        $scope.EditUser = function(data){
            $http.get('/management/manageUser/edituser/'+ data).then(function(response){
            $scope.datauserEdit = response.data.data;
            $("input[name='iduser']").val(data);
            $("input[name='username']").val($scope.datauserEdit[0].username);
            $("input[name='fname']").val($scope.datauserEdit[0].fname);
            $("input[name='lastname']").val($scope.datauserEdit[0].lastname);
            $("#SelectPrefix option[value="+$scope.datauserEdit[0].id_prefix_name+"]").attr('selected','selected');
            $("#SelectPosition option[value="+$scope.datauserEdit[0].position+"]").attr('selected','selected');
            $("#SelectDepartment option[value="+$scope.datauserEdit[0].user_department+"]").attr('selected','selected');
            $("input[name='hospital_name']").val($scope.datauserEdit[0].hospital_name);
            $("input[name='id_hospital']").val($scope.datauserEdit[0].id_hospital);
            $("#SelectGroupuser option[value="+$scope.datauserEdit[0].id_group_user+"]").attr('selected','selected');
                
            // list image user
            var strpath = '/storage/img/users/' + $scope.datauserEdit[0].user_pic_url;
            $("input[name='ofile']").val($scope.datauserEdit[0].user_pic_url);
            document.getElementById("imgmodal").src = strpath;
            });

            $("#modal-management-user-editUser").modal('show');
            //Reload Img
            $('#imagemodal').on('change', function(e) { 
                var fileInput=this;
                if(fileInput.files[0]) {
                    var reader=new FileReader();
                    reader.onload = function(e) {
                        $('#imgmodal').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });
        }

        $scope.DelUser = function(data){
            $scope.subid = data;
            $("#modal-askDelete").modal('show');
        }
        $("#confirm").click(function(){
            $http.get('/management/manageUser/deleteuser/'+ $scope.subid ).then(function(response){
                window.location.reload();
            });    
        });        
    });

    app.controller('LabOrderSearchBarController', function ($scope){
		$scope.SearchHospital = function(){
			$("#modal-hospital").modal('show');
        }
    });
    
    app.controller('SelectHospitalController', function ($scope,$http){
        $http.get('/main/getHospital').then(function(response){
            $scope.AllDataHospital = response.data.hospital;
        });

        $scope.Choose = function(id){
            $http.get('/main/DataHospitalLabOrder/'+id).then(function(response){
                var temp = [];
                $scope.posts = response.data.data;
                temp = angular.fromJson($scope.posts);
                $scope.array  = temp;
                $('input[name="hospital_name"]').val($scope.array[0].hospital_name);
                $('input[name="id_hospital"]').val($scope.array[0].id_hospital);

            }); 
        }    
    });
    // modal list data PrefixMaster
	app.controller('ListOptionUserController', function ($scope,$http){
        $http.get('/management/PrefixMasterData').then(function(response){
            $scope.prefixname = response.data.data;
        });  
    });
    // modal list data PositionMaster 
    app.controller('ListOptionPositionController', function ($scope,$http){
        $http.get('/management/PositionMasterData').then(function(response){
            $scope.position = response.data.data;
        });
    });
    // modal list data DepartmentMaster
    app.controller('ListOptionDepartmentController', function ($scope,$http){
        $http.get('/management/DepartmentMasterData').then(function(response){
            $scope.department = response.data.data;
        });
    });
    // modal list data GroupUserMaster
    app.controller('ListOptionGroupUserController', function ($scope,$http){
        $http.get('/management/GroupUserMasterData').then(function(response){
            $scope.groupuser = response.data.data;
        });
    });    
    // list User form load
    app.controller('listuser', function ($scope,$http){
        $http.get('/management/listuser').then(function(response){
            $scope.posts = response.data.datauser;
			console.log('users',$scope.posts);
        });   
    });
})();

